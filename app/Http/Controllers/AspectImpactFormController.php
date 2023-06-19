<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OprForm;
use App\Models\WorkForm;
use App\Models\AspectImpactForm;
use App\Http\Requests\AspectImpactFormRequest;
use App\Models\Work;
use App\Models\Aspect_Impact;


class AspectImpactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id,$work_id)
    {
        $query = $request->input('search');
        
        if (empty($query)) {
            $work = WorkForm::find($work_id);
        } else {
            // Filter forms based on the search query
            $work = workForm::with(['aspects' => function ($searchQuery) use ($query) {
                $searchQuery->where('aspect_name', 'LIKE', '%' . $query . '%')
                            ->orWhere('impact_name', 'LIKE', '%' . $query . '%')
                            ->orWhere('requirement_name', 'LIKE', '%' . $query . '%');
            }])->find($work_id);
        }


        $aspects = $work->aspects;
        $ratings = $work->ratings;
        $risks = $work->risks;

        return view('form.works.aspect_impacts.index', compact('id','work','aspects','ratings','risks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id,$work_id)
    {
        $work = WorkForm::find($work_id);
        $options = Work::all();
        $aspects = Aspect_Impact::all();
        $rqms = $aspects->unique('requirement_name');

        return view('form.works.aspect_impacts.create', compact('work','options','aspects','rqms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AspectImpactFormRequest $request, $id, $work_id)
    {
        $data = $request-> validated();

        //
        $info = new AspectImpactForm();

        $impact = implode(',', $data['impact']);

        $info->aspect_name =  $data['aspect'];
        $info->impact_name =  $impact;
        $info->requirement_name = $data['rqm'];
        $info->work_form_id = $data['fkey'];
    
        $info->save();

        return redirect()->route('oprForm.work.aspectImpact.index',[$id,$work_id])-> with('flash_message','Aspect Impact Added');
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
    public function edit($id,$work_id,$ai_id,)
    {
        $options = Work::all();
        $aspects = Aspect_Impact::all();
        $rqms = $aspects->unique('requirement_name');
        $opr = OprForm::with('works')->findOrFail($id);
        $workform = WorkForm::with('aspects')->findOrFail($work_id);
        $aiform = AspectImpactForm::findOrFail($ai_id);

        return view('form.works.aspect_impacts.edit',[
            'options' => $options,
            'aspects' => $aspects,
            'rqms' => $rqms,
            'opr' => $opr,
            'workform' => $workform,
            'aiform' => $aiform,
            'impacts' => explode(',',$aiform->impact_name)
        ]);
        // compact('options', 'aspects','opr','workform', 'aiform'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AspectImpactFormRequest $request, $id, $work_id, $ai_id)
    {
        $input = $request-> validated();
        
        $info = AspectImpactForm::where('work_form_id', $work_id)->findOrFail($ai_id);
        
        $impact = implode(',', $input['impact']);

        $info->aspect_name =  $input['aspect'];
        $info->impact_name =  $impact;
        $info->requirement_name = $input['rqm'];
        $info->work_form_id = $input['fkey'];

        $info->update();

        return redirect()->route('oprForm.work.aspectImpact.index',[$id,$work_id])-> with('flash_message','Work Activity Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(OprForm $id,WorkForm $work_id, AspectImpactForm $ai_id)
    {
        $ai_id->delete();

        return redirect()->route('oprForm.work.aspectImpact.index',[$id,$work_id])-> with('flash_message','Work Activity deleted!');
    }

    // public function printPdf($id,$work_id,$ai_id)
    // {
    //     //OprForm
    //         //MainWorkForm
    //             //WorkForm
    //                 //AspectImpactForm
    //                     //ImportanceRating
    //                     //RiskControl
    //     $form = AspectImpactForm::with([
    //         'workForm.oprForm',
    //         'ratings',
    //         'risks'
    //     ])
    //         ->find($ai_id);

    //     $logoUrl = public_path('logo.png');

    //     $pdf = new Dompdf();
        
    //     $pdf = PDF::loadView('form.pdf',['form' => $form, 'logoUrl' => $logoUrl]);

    //     $pdf->setPaper('letter', 'landscape');
        
    //     return $pdf->stream('form.pdf');
    // }
}
