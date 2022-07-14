<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmployeeMail;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee=Employee::orderBy('id','DESC')->paginate(10);
        return view('employee.index',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $this->validate($request,[
            'first_name'=>'string|required',
            'last_name'=>'string|required',
            
            'email'=>'email',
            
        ]);
        $data=$request->all();
        $status=Employee::create($data);
        if($status){
            Mail::to($data['email'])->cc('dokanvendor@gmail.com')->send(new EmployeeMail($data));
            return redirect()->route('employee.index')->with('success','Successfully created Employee');
        }
        else{
            return back()->with('error','Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee=Employee::find($id);
        if($employee){
            return view('employee.edit',compact('employee'));
        }
        else{
            return back()->with('error','Data Not Found!!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
        $employee=Employee::find($id);
        if($id){
        $this->validate($request,[
            'first_name'=>'string|required',
            'last_name'=>'string|required',
            
            'email'=>'email',
            
        ]);
        $data=$request->all();
        $status=$employee->update($data);
        if($status){
            
            return redirect()->route('employee.index')->with('success','Successfully Update Employee');
        }
        else{
            return back()->with('error','Something went wrong');
        }
    }
    else{
        return back()->with('error','Data Not Found!!');
    }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee=Employee::find($id);
        if($employee){
            $status=$employee->delete();
            if($status){
                return redirect()->route('employee.index')->with('success','Employee Deleted Successfully');
            }
            else{
                return back()->with('error','Something Wrong');
            }
            
        }
        else{
            return back()->with('error','Data Not Found!!');
        }
    }
}
