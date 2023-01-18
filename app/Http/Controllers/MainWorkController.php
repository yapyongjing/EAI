<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LocationFormRequest;
use App\Models\MainWork;
use App\Models\OperatingUnit;

//also known as location
class MainWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = MainWork::with('opr')->orderBy('opr_id','asc')->get();

        return view('location.index', compact(var_name: 'locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $oprs = OperatingUnit::all();
        
        return view('location.create',compact(var_name: 'oprs'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationFormRequest $request)
    {
        $data = $request-> validated();

        //
        $info = new MainWork();

        // return $this->hasMany('App\Models\MainWork', 'foreign_key');


        $info->location_name =  $data['location'];//get input from create.php
        $info->opr_id = $data['name'];

        $info->save();

        return redirect()->route('location.index')-> with('flash_message','Location Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MainWork $data)
    {
        //
        return view('location.show',[
            'location' => $data
        ]);
    }

    /**
     * Show the location for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location= MainWork::find($id);
        $oprs = OperatingUnit::all();
        
        return view('location.edit',compact('location', 'oprs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocationFormRequest $request,$id)
    {
        $info = MainWork::find($id);
        $data = $request-> validated();

        $info->opr_unit_name = $data['name'];
        $info->location_name =  $data['location'];

        $info->update();

        return redirect()->route('location.index')->with('flash_message', 'Location Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MainWork::destroy($id);

        return redirect('location')->with('flash_message', 'Location deleted!');
    }
}