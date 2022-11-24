<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EaiListFormRequest;
use App\Models\Work;

class EaiListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('list.index', [
            'list' => Work::all()
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('list.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EaiListFormRequest $request)
    {
        $data = $request-> validated();

        //
        $aspect = new Work();

        $impact = implode(', ', $data['impact']);
        $condition = implode(', ', $data['con']);

        $aspect->Work = $data['work_name'];//get input from create.php
        $aspect->Con = $condition;
        $aspect->Aspect =  $data['aspect'];
        $aspect->Impact =  $impact;

        $aspect->save();

        return redirect()->route('list.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        return view('list.show',[
            'list' => $work
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
    public function update(Request $request, $id)
    {
        //
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