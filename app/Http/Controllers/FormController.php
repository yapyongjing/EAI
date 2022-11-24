<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ListFormRequest;
use App\Models\Main_Work;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('form.index', [
            'form' => Main_Work::all()
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = Main_Work::all();
        return view('form.create',compact(var_name: 'form'));
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
        $aspect = new Main_Work();

        $aspect->opr_unit_name = $data['name'];//get input from create.php
        $aspect->location_name =  $data['location'];
        $aspect->date =  $data['date'];

        $aspect->save();

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
