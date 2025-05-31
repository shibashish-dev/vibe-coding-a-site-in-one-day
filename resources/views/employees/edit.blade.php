@php
    $ic_number = old('ic_number', $employee->ic_number ?? '');
    $section = old('section', $employee->section ?? '');
    $name = old('name', $employee->employee_name ?? '');
@endphp

<x-layouts.app>
    <div class="container mx-auto">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Employee</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('employee.update', $employee->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <flux:input
                                    label="IC Number"
                                    name="ic_number"
                                    value="{{ $ic_number }}"
                                    required
                                    autofocus
                                />
                                @error('ic_number')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <flux:input
                                    label="Section"
                                    name="section"
                                    value="{{ $section }}"
                                    required
                                />
                                @error('section')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <flux:input
                                    label="Employee Name"
                                    name="employee_name"
                                    value="{{ $name }}"
                                    required
                                />
                                @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center gap-3 mt-6">
                                <flux:button type="submit" color="primary">Update</flux:button>

                                <a href="{{ route('employee.index') }}">
                                    <flux:button type="button" color="neutral">Cancel</flux:button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
