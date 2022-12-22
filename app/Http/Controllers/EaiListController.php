<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EaiListFormRequest;
use App\Models\Work;
use App\Models\Main_Work;
use App\Models\Aspect_Impact;

//known as work 
class EaiListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Aspect_Impact::with('workAspect')->get();

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

        return redirect()->route('aspect_impact.create');//go to aspect_impact create page
        
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
        $work = Work::find($id);
        $options = Main_Work::all();
        return view('list.edit',compact('work','options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EaiListFormRequest $request, $id)
    {

        $work = Work::find($id);
        $input = $request->validated();

        $work->Work = $input['work_name'];
        $work->Con = $input['con'];
        $work->mainWork_id = $input['fkey'];
        $work->update();

        return redirect()->route('aspect_impact.edit',$id);//go to aspect_impact edit page
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Work::destroy($id);

        return redirect('list')->with('flash_message', 'Work deleted!');
    }
}