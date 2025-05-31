<?php

namespace App\Http\Controllers;

use App\Imports\AttendanceImport;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class AttendanceController extends Controller
{

    public function index(Request $request)
    {
        // $query = Attendance::query();

        $query = Attendance::query()
            ->leftJoin('employees', 'attendances.employee_code', '=', 'employees.ic_number')
            ->select(
                'attendances.*',
                'employees.section as employee_section'
            );

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('attendances.employee_code', 'like', "%{$search}%")
                    ->orWhere('attendances.employee_name', 'like', "%{$search}%")
                    ->orWhere('employees.section', 'like', "%{$search}%");
            });
        }

        // Default to current month if no month filter is selected
        if ($request->filled('month')) {
            $query->whereMonth('date', $request->month);
        }

        // Sorting
        $sortField = $request->input('sort_by');
        $sortDirection = $request->input('sort_order', 'asc');

        if ($sortField) {
            // Sanitize sort field and direction
            if (!in_array($sortField, ['employee_code', 'employee_name', 'date', 'entry_time', 'exit_time'])) {
                $sortField = 'date';
            }
            if (!in_array($sortDirection, ['asc', 'desc'])) {
                $sortDirection = 'asc';
            }
            $query->orderBy($sortField, $sortDirection);
        } else {
            // Default ordering: date ASC, then employee_code ASC
            $query->orderBy('date', 'asc')->orderBy('employee_code', 'asc');
        }

        $attendances = $query->paginate(15)->appends($request->query());
        return view('attendance.index', compact('attendances'));
    }


    public function show(Request $request)
    {
        $query = Attendance::query()
            ->leftJoin('employees', 'attendances.employee_code', '=', 'employees.ic_number')
            ->select(
                'attendances.*',
                'employees.section as employee_section'
            );

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('attendances.employee_code', 'like', "%{$search}%")
                    ->orWhere('attendances.employee_name', 'like', "%{$search}%")
                    ->orWhere('employees.section', 'like', "%{$search}%");
            });
        }

        // Default to current month if no month filter is selected
        if ($request->filled('month')) {
            $query->whereMonth('date', $request->month);
        }

        // Sorting
        $sortField = $request->input('sort_by');
        $sortDirection = $request->input('sort_order', 'asc');

        if ($sortField) {
            // Sanitize sort field and direction
            if (!in_array($sortField, ['employee_code', 'employee_name', 'date', 'entry_time', 'exit_time'])) {
                $sortField = 'date';
            }
            if (!in_array($sortDirection, ['asc', 'desc'])) {
                $sortDirection = 'asc';
            }
            $query->orderBy($sortField, $sortDirection);
        } else {
            // Default ordering: date ASC, then employee_code ASC
            $query->orderBy('date', 'asc')->orderBy('employee_code', 'asc');
        }

        $attendances = $query->paginate(15)->appends($request->query());

        return view('attendance.show', compact('attendances'));
    }


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);
        ini_set('max_execution_time', 300); // 5 minutes

        Excel::import(new AttendanceImport, $request->file('file'));

        return redirect()->back()->with('success', 'Attendance imported successfully.');
    }

}
