<?php

namespace App\Http\Controllers;

use App\Imports\EmployeesImport;
use App\Models\Employee;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $query = Employee::query();

        // Search by employee code or name
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('ic_number', 'like', "%{$search}%")
                    ->orWhere('employee_name', 'like', "%{$search}%")
                    ->orWhere('section', 'like', "%{$search}%");
            });
        }

        $employees = $query->paginate(15)->appends($request->query());

        return view('employees.index', compact('employees'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new EmployeesImport, $request->file('file'));
        return redirect()->back()->with('success', 'Employees imported successfully.');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->back()->with('success', 'Employee deleted successfully.');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'ic_number' => 'required',
            'section' => 'required',
            'employee_name' => 'required',
        ]);
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return redirect()->route('employee.index')->with('success', 'Employee updated successfully.');
    }

}
