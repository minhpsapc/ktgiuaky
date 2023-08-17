<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Employee::latest()->paginate(7);

        return view('index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          =>  'required',
            'address'         =>  'required',
            'salary'         =>  'required'
        ]);

        $employee = new Employee;

        $employee->name = $request->name;
        $employee->address = $request->address;
        $employee->salary = $request->salary;

        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employees Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name'      =>  'required',
            'address'     =>  'required',
            'salary'     =>  'required',
        ]);

        $employee = Employee::find($request->hidden_id);

        $employee->name = $request->name;
        $employee->address = $request->address;
        $employee->salary = $request->salary;


        

        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employees Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employees Data deleted successfully');
    }
}
