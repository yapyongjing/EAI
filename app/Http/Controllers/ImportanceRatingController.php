<?php

namespace App\Http\Controllers;
use App\Models\WorkForm;
use App\Models\AspectImpactForm;
use App\Models\Rating;

use Illuminate\Http\Request;

class ImportanceRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id,$work_id,$ai_id)
    {
        $workform = WorkForm::with('aspects')->findOrFail($work_id);
        $aspectform = AspectImpactForm::findOrFail($ai_id);

        return view('form.works.aspect_impacts.ratings.index',compact('workform','aspectform'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id, $work_id,$ai_id)
    {
        $aspectform = AspectImpactForm::findOrFail($ai_id);
        $info = new Rating;

        $info->option1 = $request->input('option1');
        $info->option2 = $request->input('option2');
        $info->option3 = $request->input('option3');
        $info->option4 = $request->input('option4');
        $info->option5 = $request->input('option5');
        $info->risk = $request->input('result');
        $info->aspect_impact_form_id = $aspectform->id;

        $info->save();

        return redirect()->route('oprForm.work.aspectImpact.index', [$id,$work_id])-> with('flash_message','Rating Submitted');
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
    public function edit($id,$work_id,$ai_id)
    {

        $workform = WorkForm::with('aspects')->findOrFail($work_id);
        $aspectform = AspectImpactForm::findOrFail($ai_id);
        $rating = $aspectform->rating;

        return view('form.works.aspect_impacts.ratings.edit',[
            'workform' => $workform,
            'aspectform' => $aspectform,
            'rating' => $rating,
        ]);
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
