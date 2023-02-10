<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
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
        $clients = DB::select('select * from clients');
        $employees = DB::select('select * from employees where category_id = 1');
        return view('clients.index',['clients'=>$clients,'employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = DB::select('select * from employees where active = 0 and category_id = 1');
        return view('clients.create',['employees'=>$employees]);
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
            'weight'=>'required',
            'height'=>'required',
            'age'=>'required',
        ]);
        
        Client::create([
            'name'=>$request->name,
            'telephone'=>$request->telephone,
            'weight'=>$request->weight,
            'height'=>$request->height,
            'age'=>$request->age,
            'employee_id'=>$request->employ,
        ]);

        $employees = DB::select('select * from employees where active = 0 and category_id = 1');
        return view('clients.create',['employees'=>$employees]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $employees = DB::select('select * from employees where active = 0 and category_id = 1');
        $client = DB::select('select * from clients where id =?',[$id]);
        return view('clients.show',['client'=>$client[0],'employees'=>$employees]);
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
            'weight'=>'required',
            'height'=>'required',
            'age'=>'required',
        ]);

        DB::update('update clients set name=?,telephone=?,weight=?,height=?,age=?,employee_id=?, active=? where id ='.$id,
        [$request->name,$request->telephone,$request->weight,$request->height,$request->age,$request->employ,$request->active]);

        $clients = DB::select('select * from clients');
        return view('clients.index',['clients'=>$clients]);
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
