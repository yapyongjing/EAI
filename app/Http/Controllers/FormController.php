<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ListFormRequest;
use App\Models\OperatingUnit;
use App\Models\MainWork;
use App\Models\Work;
use App\Models\AspectImpact;
use App\Models\Form;

//main work/location
class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form::all();

        return view('form.index', compact(var_name: 'forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $oprs = OperatingUnit::all();
        $locations = MainWork::all();
        $works = Work::all();
        $aspects = AspectImpact::all();
        
        return view('form.create',compact('oprs','locations','works','aspects'));
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
        $info = new Form();

        // return $this->hasMany('App\Models\MainWork', 'foreign_key');
        $info->operating_name =  $data['opr_name'];
        $info->location_name =  $data['location_name'];//get input from create.php
        $info->date =  $data['date'];
        $info->work_name = $data['work_name'];
        $info->condition =  $data['con'];
        $info->aspect_name =  $data['aspect'];
        $info->impact_name =  implode(',', $data['impact']);
        $info->requirement_name =  $data['rqm'];

        $info->save();

        return redirect()->route('form.index')->with('flash_message', 'Form Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Form $data)
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
        $forms = Form::find($id);
        $oprs = OperatingUnit::all();
        $locations = MainWork::all();
        $works = Work::all();
        $aspects = AspectImpact::all();
        return view('form.edit',[
            'forms' => $forms,
            'oprs' => $oprs,
            'locations' => $locations,
            'works'=> $works,
            'aspects' => $aspects,
            'impacts' => explode(',',$forms->impact_name)
        ])->with('flash_message', 'Successfully Updated!');
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
        $info = Form::find($id);
        $data = $request-> validated();

        //
        
        $info->operating_name =  $data['opr_name'];
        $info->location_name =  $data['location_name'];//get input from create.php
        $info->date =  $data['date'];
        $info->work_name = $data['work_name'];
        $info->condition =  $data['con'];
        $info->aspect_name =  $data['aspect'];
        $info->impact_name =  implode(',', $data['impact']);
        $info->requirement_name =  $data['rqm'];
        $info->update();

        return redirect()->route('form.index')->with('flash_message', 'Form Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Form::destroy($id);

        return redirect('form')->with('flash_message', 'Form deleted!');
    }
}
