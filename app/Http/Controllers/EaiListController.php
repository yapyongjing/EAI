<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EaiListFormRequest;
use App\Models\Work;
use App\Models\Main_Work;
use App\Models\Aspect_Impact;

//work
class EaiListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Aspect_Impact::with('works_aspect')->get();

        return view('list.index', compact(var_name: 'lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $options = Main_Work::all();

        return view('list.create',compact(var_name:'options'));
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
        $info = new Work();

        $info->Work = $data['work_name'];//get input from create.php
        $info->Con = $data['con'];
        $info->mainWork_id = $data['fkey'];
    
        $info->save();

        return redirect()->route('aspect_impact.create');
        
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