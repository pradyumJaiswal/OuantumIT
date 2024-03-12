<?php

namespace App\Http\Controllers;
use App\Http\Requests\EmployeRequest;
use Illuminate\Http\Request;
use App\Models\employee;
class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = employee::latest()->paginate(2);
        return view("employee.employee_record", compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("employee.add_Employee");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeRequest $request)
    {
        $profileName = time().'.'.$request->profile->extension();
        $profilePath = $request->profile->storeAs('', $profileName, 'private');
        $Employee = new Employee;
        $Employee->F_name = $request->input('fName');
        $Employee->L_name = $request->input('lName');
        $Employee->Company = $request->input('Company');
        $Employee->Email = $request->input('Email');
        $Employee->Phone = $request->input('Phone');
        $Employee->Profile = $profilePath;
        $Employee->save();
        return redirect('Employee')->with('status', 'Employee Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $my_Emp = employee::find($id);
        return view('employee.view_employee', compact('my_Emp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $my_Emp = employee::find($id);
        return view('employee.update_employee', compact('my_Emp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeRequest $request, $id)
    {

        $my_Emp = employee::find($id);
        $my_Emp->F_name = $request->input('fName');
        $my_Emp->L_name = $request->input('lName');
        $my_Emp->Company =$request->input('Company');
        $my_Emp->Email = $request->input('Email');
        $my_Emp->Phone = $request->input('Phone');
        $my_Emp->save();
        return redirect('Employee')->with('status','Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = employee::find($id);
        $employee->delete();
        return redirect('Employee')->with('status','Employee deleted Successfully');

    }
}
