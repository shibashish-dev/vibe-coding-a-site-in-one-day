<?php

namespace App\Imports;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class AttendanceImport implements ToModel, WithHeadingRow
{
    public function headingRow(): int
    {
        return 2; // Assuming headers are in the second row
    }

    public function model(array $row)
    {
        // Normalize column names
        $normalized = $this->normalizeColumns($row);

        // Skip empty rows
        if (empty($normalized['employee_code']) || empty($normalized['date'])) {
            Log::info('Skipping empty row', ['row' => $normalized]);
            return null;
        }

        // Parse date and time
        try {
            $dateTime = Carbon::parse($normalized['date']);
            $date = $dateTime->toDateString();
            $time = $dateTime->toTimeString();
        } catch (\Exception $e) {
            Log::warning('Failed to parse date', ['row' => $normalized, 'error' => $e->getMessage()]);
            return null;
        }

        // Format employee code
        $employeeCode = $this->formatEmployeeCode($normalized['employee_code']);
        if (!$employeeCode) {
            Log::warning('Invalid employee code', ['row' => $normalized]);
            return null;
        }

        $employeeName = $normalized['item_description'] ?? null;
        $event = Str::lower($normalized['event_description'] ?? '');

        // Handle entry or exit events
        if (Str::contains($event, 'entry')) {
            return $this->handleEntryEvent($employeeCode, $employeeName, $date, $time);
        } elseif (Str::contains($event, 'exit')) {
            return $this->handleExitEvent($employeeCode, $employeeName, $date, $time);
        } else {
            Log::info("Unknown event type", ['event' => $event, 'row' => $normalized]);
            return null;
        }
    }

    private function normalizeColumns(array $row): array
    {
        return collect($row)->mapWithKeys(function ($value, $key) {
            return [Str::of($key)->lower()->replace(' ', '_')->__toString() => $value];
        })->toArray();
    }

    private function formatEmployeeCode($code): ?string
    {
        if (empty($code)) {
            return null;
        }

        $numericCode = preg_replace('/\D/', '', $code);

        // If code is long enough (more than 3 digits), remove first 3 digits
        if (strlen($numericCode) > 3) {
            return substr($numericCode, 3);
        }

        return $numericCode;
    }

    private function handleEntryEvent($employeeCode, $employeeName, $date, $time)
    {
        // Remove duplicate entries within 1 minute
        $recentEntry = Attendance::where('employee_code', $employeeCode)
            ->where('date', $date)
            ->whereNotNull('entry_time')
            ->whereNull('exit_time')
            ->whereBetween('entry_time', [
                Carbon::parse($time)->subMinute()->toTimeString(),
                Carbon::parse($time)->addMinute()->toTimeString()
            ])
            ->first();

        if ($recentEntry) {
            Log::info("Skipping duplicate entry for employee {$employeeCode} on {$date} at {$time}", [
                'existing_entry_time' => $recentEntry->entry_time
            ]);
            return null;
        }

        // Create new attendance record for entry
        $attendance = new Attendance([
            'employee_code' => $employeeCode,
            'employee_name' => $employeeName,
            'date' => $date,
            'entry_time' => $time,
            'exit_time' => null,
        ]);

        Log::info("Stored entry for employee {$employeeCode} on {$date} at {$time}");
        return $attendance;
    }

    private function handleExitEvent($employeeCode, $employeeName, $date, $time)
    {
        // Remove duplicate exits within 1 minute
        $recentExit = Attendance::where('employee_code', $employeeCode)
            ->where(function ($query) use ($date) {
                $query->where('date', $date)
                    ->orWhere('date', Carbon::parse($date)->subDay()->toDateString());
            })
            ->whereNotNull('exit_time')
            ->whereBetween('exit_time', [
                Carbon::parse($time)->subMinute()->toTimeString(),
                Carbon::parse($time)->addMinute()->toTimeString()
            ])
            ->first();

        if ($recentExit) {
            Log::info("Skipping duplicate exit for employee {$employeeCode} on {$date} at {$time}", [
                'existing_exit_time' => $recentExit->exit_time
            ]);
            return null;
        }

        // Find matching entry
        $sameDayOpenEntry = Attendance::where('employee_code', $employeeCode)
            ->where('date', $date)
            ->whereNotNull('entry_time')
            ->whereNull('exit_time')
            ->where('entry_time', '<', $time)
            ->orderBy('entry_time', 'desc')
            ->first();

        if ($sameDayOpenEntry) {
            $sameDayOpenEntry->exit_time = $time;
            $sameDayOpenEntry->save();
            Log::info("Matched exit for employee {$employeeCode} on {$date} at {$time} with entry at {$sameDayOpenEntry->entry_time}");
            return null;
        }

        // Handle overnight shifts
        $previousDate = Carbon::parse($date)->subDay()->toDateString();
        $previousDayOpenEntry = Attendance::where('employee_code', $employeeCode)
            ->where('date', $previousDate)
            ->whereNotNull('entry_time')
            ->whereNull('exit_time')
            ->where('entry_time', '>=', '18:00:00')
            ->orderBy('entry_time', 'desc')
            ->first();

        if ($previousDayOpenEntry) {
            $previousDayOpenEntry->exit_time = $time;
            $previousDayOpenEntry->save();
            Log::info("Matched overnight exit for employee {$employeeCode} on {$date} at {$time} with entry at {$previousDayOpenEntry->entry_time}");
            return null;
        }

        Log::warning("No matching entry found for exit: employee {$employeeCode} on {$date} at {$time}");
        return null;
    }
}
