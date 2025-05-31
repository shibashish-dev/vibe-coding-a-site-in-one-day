<x-layouts.app>


    @php
        function sort_link($label, $column)
        {
            $currentSortBy = request('sort_by');
            $currentSortOrder = request('sort_order', 'desc');

            $newSortOrder = ($currentSortBy === $column && $currentSortOrder === 'asc') ? 'desc' : 'asc';
            $icon = '';
            if ($currentSortBy === $column) {
                $icon = $currentSortOrder === 'asc' ? '↑' : '↓';
            }

            $query = array_merge(request()->query(), ['sort_by' => $column, 'sort_order' => $newSortOrder]);

            return '<a href="' . route('attendance.index', $query) . '" class="hover:underline flex items-center gap-1">' . $label . ' <span>' . $icon . '</span></a>';
        }
    @endphp



    <div class="p-6">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
            <h2 class="text-2xl font-semibold text-zinc-800 dark:text-zinc-100">Attendance Records</h2>

            <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                <!-- Upload Excel Button -->
                <div id="upload-form" class="relative">
                    <form action="{{ route('attendance.import') }}" method="POST" enctype="multipart/form-data"
                        class="flex items-center">
                        @csrf
                        <label class="cursor-pointer w-full">
                            <flux:button size="sm" color="secondary" type="button"
                                class="w-full sm:w-auto flex items-center justify-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                Upload Excel
                            </flux:button>
                            <input type="file" name="file" required
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                onchange="this.form.submit()" />
                        </label>
                    </form>
                </div>




                <form method="GET" action="{{ route('attendance.index') }}"
                    class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto items-center">
                    {{-- Search Input --}}
                    <div class="relative w-full sm:w-64">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search by code or name"
                            class="pl-9 pr-3 py-2 w-full border rounded-md text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white transition-colors" />
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>

                    {{-- Month Dropdown --}}
                    <select name="month" onchange="this.form.submit()"
                        class="py-2 px-3 border rounded-md text-sm dark:bg-zinc-800 dark:border-zinc-700 dark:text-white">
                        <option value="">All Months</option>
                        @foreach(range(1, 12) as $m)
                            <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::create()->month($m)->format('F') }}
                            </option>
                        @endforeach
                    </select>

                    {{-- Submit Search Button --}}
                    <flux:button size="sm" color="secondary" type="submit"
                        class="flex items-center justify-center gap-1">
                        Search
                    </flux:button>

                    @if(request('search') || request('month'))
                        <a href="{{ route('attendance.index') }}">
                            <flux:button size="sm" color="danger" type="button"
                                class="flex items-center justify-center gap-1">
                                Clear
                            </flux:button>
                        </a>
                    @endif
                </form>

            </div>
        </div>

        <!-- Attendance Table -->
        <div class="overflow-x-auto rounded shadow border dark:border-zinc-700">
            <table class="w-full min-w-[700px] table-auto border-collapse" id="attendanceTable">
                <thead class="bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-300 text-left">
                    <tr class="border-b border-zinc-200 dark:border-zinc-700">
                        <th class="px-4 py-3">{!! sort_link('Employee Code', 'employee_code') !!}</th>
                        <th class="px-4 py-3">{!! sort_link('Section', 'employee_section') !!}</th>
                        <th class="px-4 py-3">{!! sort_link('Employee Name', 'employee_name') !!}</th>
                        <th class="px-4 py-3">{!! sort_link('Date', 'date') !!}</th>
                        <th class="px-4 py-3">{!! sort_link('Entry Time', 'entry_time') !!}</th>
                        <th class="px-4 py-3">{!! sort_link('Exit Time', 'exit_time') !!}</th>
                    </tr>
                </thead>

                <tbody class="text-zinc-700 dark:text-zinc-200">
                    @forelse ($attendances as $attendance)
                        <tr class="border-b border-zinc-200 dark:border-zinc-700">
                            <td class="px-4 py-2">{{ $attendance->employee_code }}</td>
                            <td class="px-4 py-2">{{ $attendance->employee_section ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $attendance->employee_name }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($attendance->date)->format('d-m-Y') }}</td>
                            <td class="px-4 py-2">{{ $attendance->entry_time }}</td>
                            <td class="px-4 py-2">{{ $attendance->exit_time }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-4 text-center text-zinc-500">No attendance records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $attendances->appends(['search' => request('search')])->links() }}
        </div>
    </div>

</x-layouts.app>

