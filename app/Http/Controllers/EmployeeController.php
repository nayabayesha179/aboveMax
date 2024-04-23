<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Employee::with('companies')->get();
        return view('contents.employee.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $companies = Company::all();
        return view('contents.employee.index', compact('companies'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $insertData = $request->all();

        $data = Employee::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_id' => $request->company_id,
        ]);
        return redirect()->route('employee.index')->with('message', 'Data Sent');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
        $data = Employee::with('companies')->find($employee->id);
        $companies = Company::all();
        return view('contents.employee.index', compact('data', 'companies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
        $insertData = $request->all();

        // Update company data
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->company_id = $request->company_id;

        $employee->update();
        return redirect()->route('employee.index')->with('info', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $data = Employee::find($id)->delete();
        return response()->json(['success' => 'data Deleted successfully']);
    }
}
