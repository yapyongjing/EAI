<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AspectImpactFormRequest;
use App\Models\Work;
use App\Models\Aspect_Impact;

//aspect impact
class AspectImpactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $works = Work::all();
        return view('aspect_impact.create',compact(var_name: 'works'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AspectImpactFormRequest $request)
    {
        $data = $request-> validated();

        //
        $info = new Aspect_Impact();

        $impact = implode(',', $data['impact']);

        //get input from create.php
        $info->aspect_name =  $data['aspect'];
        $info->impact_name =  $impact;
        $info->requirement_name = $data['rqm'];
        $info->work_id = $data['fkey'];

        $info->save();

        return redirect()->route('list.index')->with('flash_message', 'Work Activity Added!'); //then return back to list view
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
        $aspects = Aspect_Impact::find($id);
        $works = Work::all();
        
        return view('aspect_impact.edit',[
            'works' => $works,
            'aspects' => $aspects,
            'impacts' => explode(',',$aspects->impact_name)
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AspectImpactFormRequest $request, $id)
    {
        $aspect = Aspect_Impact::find($id);
        $input = $request->validated();

        $impact = implode(',', $input['impact']);

        $aspect->aspect_name =  $input['aspect'];
        $aspect->impact_name =  $impact;
        $aspect->requirement_name = $input['rqm'];
        $aspect->work_id = $input['fkey'];
        $aspect->update();

        return redirect()->route('list.index')->with('flash_message', 'Successfully Updated!');

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
