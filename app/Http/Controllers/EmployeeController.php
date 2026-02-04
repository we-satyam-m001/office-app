<?php

namespace App\Http\Controllers;



use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return Employee::all();
    }

    public function store(Request $request)
    {
         $request->validate([
        'email'  => 'required|email|unique:employees,email',
        'mobile' => 'required|unique:employees,mobile',
    ]);

        Employee::create($request->only([
            'name','email','address','mobile'
        ]));

        return response()->json('Employee created');
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $employee->update($request->only([
            'name','email','address','mobile'
        ]));

        return response()->json('Employee updated');
    }

    public function destroy($id)
    {
        Employee::destroy($id);
        return response()->json('Employee deleted');
    }
}
