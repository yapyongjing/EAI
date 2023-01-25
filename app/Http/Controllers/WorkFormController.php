<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OprForm;
use App\Models\WorkForm;
use App\Models\Main_Work;
use App\Models\Work;
use App\Http\Requests\EaiWorkFormRequest;

class WorkFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $opr = OprForm::find($id);
        $works = $opr->works();
       
        return view('form.works.index', compact('works','opr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $opr = OprForm::find($id);
        $options = Main_Work::all();
        $works = Work::all();

        return view('form.works.create', compact('id','options','works','opr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EaiWorkFormRequest $request,$id)
    {
        
        $data = $request-> validated();

        //
        $info = new WorkForm();

        $info->work_name = $data['work_name'];//get input from create.php
        $info->condition = $data['con'];
        $info->opr_form_id = $data['fkey'];
    
        $info->save();

        return redirect()->route('form.works.index',$id)-> with('flash_message','Work Activity Added');
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
        $options = Main_Work::all();
        $works = Work::all();
        $opr = OprForm::with('works')->get()->find($id);
        $workforms = WorkForm::find($id);

        return view('form.works.edit',compact('id','options','works','opr','workforms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EaiWorkFormRequest $request,$id)
    {
        $data = $request-> validated();

        //
        $info = WorkForm::find($id);

        $info->work_name = $data['work_name'];//get input from create.php
        $info->condition = $data['con'];
        $info->opr_form_id = $data['fkey'];
    
        $info->update();

        return redirect()->route('form.works.index',$id)-> with('flash_message','Work Activity Edit');
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
