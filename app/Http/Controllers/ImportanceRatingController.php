<?php

namespace App\Http\Controllers;
use App\Models\OprForm;
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
        // $workform = WorkForm::with('aspects')->findOrFail($work_id);

        return view('form.works.aspect_impacts.ratings.index',[
            'id' => $id,
            'work_id' => $work_id,
            'ai_id' => $ai_id,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($work_id,$ai_id)
    {
        // $workform = WorkForm::with('aspects')->findOrFail($work_id);
        // // $aspectform = AspectImpactForm::findOrFail($ai_id);

        // return view('form.works.aspect_impacts.ratings.create',[
        //     'workform' => $workform,
        //     'ai_id' => $ai_id,
        //     ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id, $work_id,$ai_id)
    {
        // $aspectform = AspectImpactForm::findOrFail($ai_id);
        $info = new Rating();

        $info->option1 = $request->input('option1');
        $info->option2 = $request->input('option2');
        $info->option3 = $request->input('option3');
        $info->option4 = $request->input('option4');
        $info->option5 = $request->input('option5');
        $info->risk = $request->input('result');
        $info->aspect_impact_form_id = $ai_id;

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
    public function edit($id,$work_id,$ai_id,$rating_id)
    {

        // $workform = WorkForm::findOrFail($work_id);
        $aspectform = AspectImpactForm::with(['ratings'])->findOrFail($ai_id);
        $ratings = $aspectform->ratings;
    
        return view('form.works.aspect_impacts.ratings.edit',[
            'id' => $id,
            'work_id' => $work_id,
            'ai_id' => $ai_id,
            'rating_id' => $rating_id,
            'aspectform' => $aspectform,
            'ratings' => $ratings,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $work_id,$ai_id,$rating_id)
    {
        // $aspectform = AspectImpactForm::findOrFail($ai_id);
        $info = Rating::where('aspect_impact_form_id', $ai_id)->findOrFail($rating_id);

        $info->option1 = $request->input('option1');
        $info->option2 = $request->input('option2');
        $info->option3 = $request->input('option3');
        $info->option4 = $request->input('option4');
        $info->option5 = $request->input('option5');
        $info->risk = $request->input('result');
        $info->aspect_impact_form_id = $ai_id;

        $info->update();

        return redirect()->route('oprForm.work.aspectImpact.index', [$id,$work_id])-> with('flash_message','Rating Edited');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(OprForm $id,WorkForm $work_id, Rating $rating_id)
    {
        // $rating_id->delete();

        // return redirect()->route('oprForm.work.aspectImpact.index',[$id,$work_id])-> with('flash_message','Work Activity deleted!');
    }
}
