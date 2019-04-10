<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Employee;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

        return view("employee.list");
    }

    public function getList(Request $request){
        $employee = Employee::orderBy('updated_at', 'desc')->get();

        return Datatables::of($employee)->make();
    }

    public function store(Request $request){
        $employee = new Employee;
        $employee->name = $request->employeeName;
        $employee->phone = $request->employeePhone;
        $employee->address = $request->employeeAddress;
        $employee->save();

        return redirect('/employee')->with('success', 'Success adding new Employee');
    }

    public function update(Request $request){
        $employee = Employee::find($request->employeeId);
        $employee->name = $request->employeeName;
        $employee->save();

        return redirect('/employee')->with('success', 'Success update Employee');
    }

    public function destroy(Request $request){
        $employee = Employee::find($request->employeeId);
        $employee->delete();

        return redirect('/employee')->with('success', 'Success remove Employee');
    }
}
