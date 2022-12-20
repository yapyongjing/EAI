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
        $aspects = Work::all();
        return view('aspect_impact.create',compact(var_name: 'aspects'));
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
        $info->Aspect =  $data['aspect'];
        $info->Impact =  $impact;
        $info->work_id = $data['fkey'];

        $info->save();

        return redirect()->route('list.index');
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
