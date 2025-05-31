<x-layouts.app>
    <div class="p-6">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
            <h2 class="text-2xl font-semibold text-zinc-800 dark:text-zinc-100">Employees</h2>

            <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                <!-- Upload Excel Button -->
                <form action="{{ route('employee.import') }}" method="POST" enctype="multipart/form-data"
                    class="relative">
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

                <!-- Search Form -->
                <form method="GET" action="{{ route('employee.index') }}"
                    class="flex gap-2 items-center w-full sm:w-auto">
                    <div class="relative w-full sm:w-64">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search by name or IC number"
                            class="pl-9 pr-3 py-2 w-full border rounded-md text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white transition-colors" />
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>

                    <flux:button size="sm" color="secondary" type="submit" class="flex items-center gap-1">
                        Search
                    </flux:button>

                    @if(request('search'))
                        <a href="{{ route('employee.index') }}">
                            <flux:button size="sm" color="danger" type="button" class="flex items-center gap-1">
                                Clear
                            </flux:button>
                        </a>
                    @endif
                </form>
            </div>
        </div>

        <!-- Employee Table -->
        <div class="overflow-x-auto rounded shadow border dark:border-zinc-700">
            <table class="w-full min-w-[500px] table-auto border-collapse">
                <thead class="bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-300 text-left">
                    <tr class="border-b border-zinc-200 dark:border-zinc-700">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">IC Number</th>
                        <th class="px-4 py-3">Section</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-zinc-700 dark:text-zinc-200">
                    @forelse ($employees as $employee)
                        <tr class="border-b border-zinc-200 dark:border-zinc-700">
                            <td class="px-4 py-2">{{ $employee->id }}</td>
                            <td class="px-4 py-2">{{ $employee->ic_number }}</td>
                            <td class="px-4 py-2">{{ $employee->section }}</td>
                            <td class="px-4 py-2">{{ $employee->employee_name }}</td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('employee.edit', $employee->id) }}">Edit</a>
                                    <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this employee?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-4 text-center text-zinc-500">No employees found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $employees->appends(['search' => request('search')])->links() }}
        </div>
    </div>
</x-layouts.app>
