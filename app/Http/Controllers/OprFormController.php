<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ListFormRequest;
use App\Models\Main_Work;
use App\Models\Operating_Unit;
use App\Models\OprForm;

//main work/location
class OprFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = OprForm::all();

        return view('form.index', compact(var_name: 'forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $oprs = Operating_Unit::all();
        $locations = Main_Work::all();
        
        return view('form.create', compact('oprs','locations'));
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
        $info = new OprForm();

        // return $this->hasMany('App\Models\MainWork', 'foreign_key');
        $info->operating_name =  $data['opr_name'];
        $info->location_name =  $data['location_name'];
        $info->date =  $data['date'];
        // $info->work_name = $data['work_name'];
        // $info->condition =  $data['con'];
        // $info->aspect_name =  $data['aspect'];
        // $info->impact_name =  implode(',', $data['impact']);
        // $info->requirement_name =  $data['rqm'];

        $info->save();

        return redirect()->route('oprForm.index')->with('flash_message', 'Form Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(OprForm $data)
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
        $oprs = Operating_Unit::all();
        $locations = Main_Work::all();
        $form = OprForm::find($id);
        // $works = Work::all();
        // $aspects = AspectImpact::all();
        return view('form.edit',[
            'form' => $form,
            'oprs' => $oprs,
            'locations' => $locations,
            // 'works'=> $works,
            // 'aspects' => $aspects,
            // 'impacts' => explode(',',$forms->impact_name)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ListFormRequest $request,$id)
    {
        $data = $request-> validated();
        
        $info = OprForm::find($id);
        
        $info->operating_name =  $data['opr_name'];
        $info->location_name =  $data['location_name'];//get input from create.php
        $info->date =  $data['date'];
        // $info->work_name = $data['work_name'];
        // $info->condition =  $data['con'];
        // $info->aspect_name =  $data['aspect'];
        // $info->impact_name =  implode(',', $data['impact']);
        // $info->requirement_name =  $data['rqm'];
        $info->update();

        return redirect()->route('oprForm.index')->with('flash_message', 'Form Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OprForm::destroy($id);

        return redirect()->route('oprForm.index')->with('flash_message', 'Form deleted!');
    }
}
