<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ListFormRequest;
use App\Models\Main_Work;
use App\Models\Operating_Unit;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Main_Work::with('opr')->get();

        return view('form.index', compact(var_name: 'forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $opr = Operating_Unit::all();
        
        return view('form.create',compact(var_name: 'opr'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ListFormRequest $request)
    {
        $data = $request-> validated();

        //
        $info = new Main_Work();

        // return $this->hasMany('App\Models\Main_Work', 'foreign_key');


        $info->location_name =  $data['location'];//get input from create.php
        $info->opr_id = $data['name'];
        $info->date =  $data['date'];

        $info->save();

        return redirect()->route('form.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Main_Work $data)
    {
        //
        return view('form.show',[
            'form' => $data
        ]);
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
    public function update(ListFormRequest $request)
    {
        $data = $request-> validated();

        //
        $aspect = new Main_Work();

        $aspect->opr_unit_name = $data['name'];
        $aspect->location_name =  $data['location'];
        $aspect->date =  $data['date'];

        $aspect->save();

        
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
