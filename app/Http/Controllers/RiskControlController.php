<?php

namespace App\Http\Controllers;
use App\Models\PersonInCharge;
use App\Models\RiskControl;
use App\Models\User;

use Illuminate\Http\Request;

class RiskControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id,$work_id,$ai_id)
    {
        // $workform = WorkForm::with('aspects')->findOrFail($work_id);
        // $aspectform = AspectImpactForm::findOrFail($ai_id);
        $pics = PersonInCharge::all();
        $users = User::all();

        return view('form.works.aspect_impacts.risk.index',compact('pics','users','id','work_id','ai_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id, $work_id,$ai_id)
    {
        
        $info = new RiskControl;

        $info->existing_control_measures = $request->input('ECM');
        $info->action_plan = $request->input('risk');
        $info->person_in_charge = $request->input('pic');
        $info->time_frame = $request->input('time');
        $info->status = $request->input('status');
        $info->aspect_impact_form_id = $ai_id;

        $info->save();

        return redirect()->route('oprForm.work.aspectImpact.index', [$id,$work_id])-> with('flash_message','Risk Control Submitted');
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
    public function edit($id,$work_id,$ai_id,$risk_id)
    {
        $users = User::all();
        $risk = RiskControl::findOrFail($risk_id);
    
        return view('form.works.aspect_impacts.risk.edit',[
            'id' => $id,
            'work_id' => $work_id,
            'ai_id' => $ai_id,
            'risk_id' => $risk_id,
            'risk' => $risk,
            'users' => $users,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$work_id,$ai_id,$risk_id)
    {
        $info = RiskControl::where('aspect_impact_form_id', $ai_id)->findOrFail($risk_id);

        $info->existing_control_measures = $request->input('ECM');
        $info->action_plan = $request->input('risk');
        $info->person_in_charge = $request->input('pic');
        $info->time_frame = $request->input('time');
        $info->status = $request->input('status');
        $info->aspect_impact_form_id = $ai_id;

        $info->update();

        return redirect()->route('oprForm.work.aspectImpact.index', [$id,$work_id])-> with('flash_message','Risk Control Edited');
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
