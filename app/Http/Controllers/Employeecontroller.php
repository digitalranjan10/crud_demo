<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;


class Employeecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emps = Employee::all();
        return view('empfolder.employeepage',compact('emps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empfolder.employeepage');
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
          'name' => 'required',
          'profile' => 'required',
          'address' => 'required',
          'city' => 'required',
        ]);
       
        $emps = new Employee;

        $emps->name = $request->input('name');
        $emps->profile = $request->input('profile');
        $emps->address = $request->input('address');
        $emps->city = $request->input('city');

        $emps->save();

        return redirect('empfolder')->with('sucess','Data Inserted');

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
        $emps = Employee::find($id);
        return view('empfolder.empeditpage',compact('emps','id'));
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
        $this->validate($request,[
         'name' =>'required',
         'profile' =>'required',
         'address' =>'required',
         'city' =>'required',
        ]);
        $emps = Employee::find($id);

        $emps->name = $request->input('name');
        $emps->profile = $request->input('profile');
        $emps->address = $request->input('address');
        $emps->city = $request->input('city');

        $emps->save();

        return redirect('empfolder')->with('sucess','Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emps = Employee::find($id);
        $emps->delete();

        return redirect('empfolder')->with('sucess', 'Data Deleted');
    }
}
