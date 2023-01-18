<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WorkFormRequest;
use App\Models\Work;
use App\Models\MainWork;
use App\Models\AspectImpact;

//known as work 
class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = AspectImpact::with('workAspect')->orderBy('id','asc')->get();

        return view('list.index', compact(var_name: 'lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $options = MainWork::all();

        return view('list.create',compact(var_name:'options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkFormRequest $request)
    {
        $data = $request-> validated();

        //
        $info = new Work();

        $info->work_name = $data['work_name'];//get input from create.php
        $info->condition = $data['con'];
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
        $options = MainWork::all();
        return view('list.edit',compact('work','options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WorkFormRequest $request, $id)
    {

        $work = Work::find($id);
        $input = $request->validated();

        $work->work_name = $input['work_name'];
        $work->condition = $input['con'];
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

        return redirect('list')->with('flash_message', 'Work Activity deleted!');
    }
}