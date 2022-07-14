<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $company=Company::orderBy('id','DESC')->paginate(10);;
        return view('company.index',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('company.add');
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
            'name'=>'string|required',
            'email'=>'required|email',
            'logo' => 'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'website' => 'url',
        ]);
        
       
        $data=$request->all();
       
        $path = $request->file('logo')->store('public/images');
        $data['logo']=$path;
        $status=Company::create($data);
        if($status){
            return redirect()->route('company.index')->with('success','Successfully created company');
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
        $company=Company::find($id);
        if($company){
            return view('company.edit',compact('company'));
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
        $company=Company::find($id);
        if($id){
        $this->validate($request,[
            'name'=>'string|required',
            'email'=>'required|email',
            'logo' => 'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'website' => 'url',
        ]);
        
       
        $data=$request->all();
        if ($image = $request->file('logo')) {
        $path = $request->file('logo')->store('public/images');
        $data['logo']=$path;
        }
        else{
            unset($data['logo']);
        }
        $status=$company->update($data);
        if($status){
            return redirect()->route('company.index')->with('success','Successfully created company');
        }
        else{
            return back()->with('error','Something went wrong');
        }
    }
    else{
        return back()->with('error','Something went wrong');
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
        $company=Company::find($id);
        if($company){
            $status=$company->delete();
            if($status){
                return redirect()->route('employee.index')->with('success','Company Deleted Successfully');
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
