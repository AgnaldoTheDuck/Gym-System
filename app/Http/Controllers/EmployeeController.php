<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = DB::select('select * from employees');
        return view('employees.index',['employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::select('select * from categories');
        return view('employees.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'telephone'=>'required',
            'email'=>'required',
        ]);
        
        Employee::create([
            'name'=>$request->name,
            'telephone'=>$request->telephone,
            'email'=>$request->email,
            'category_id'=>$request->categoryid,
        ]);

        $categories = DB::select('select * from categories');
        return view('employees.create',['categories'=>$categories]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = DB::select('select * from employees where id =  ?',[$id]);
        $categories = DB::select('select * from categories');
        return view('employees.show',['employee'=>$employee[0],'categories'=>$categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $request->validate([
            'name'=>'required',
            'telephone'=>'required',
            'email'=>'required',
        ]);

        DB::update('update employees set name=?,telephone=?,email=?,category_id=? where id ='.$id,
        [$request->name,$request->telephone,$request->email,$request->categoryid]);

        $employees = DB::select('select * from employees');
        return view('employees.index',['employees'=>$employees]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
