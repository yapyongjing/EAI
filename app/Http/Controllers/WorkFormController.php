<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OprForm;
use App\Models\WorkForm;
use App\Models\Main_Work;
use App\Models\Work;
use App\Http\Requests\EaiWorkFormRequest;
//view = refer to the file name
//redirect = refer to the name we difines in web.php

class WorkFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $query = $request->input('search');
        
        if (empty($query)) {
            $opr = OprForm::with('works')->find($id);
        } else {
            // Filter forms based on the search query
            $opr = OprForm::with(['works' => function ($searchQuery) use ($query) {
                $searchQuery->where('work_name', 'LIKE', '%' . $query . '%')
                            ->orWhere('condition', 'LIKE', '%' . $query . '%');
            }])->find($id);
        }
        $works = $opr->works;

        return view('form.works.index', compact('opr', 'works'));
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
     * @param  int                       $id Opr Id.
     * @return \Illuminate\Http\Response
     */
    public function store(EaiWorkFormRequest $request, $id)
    {
        
        $data = $request-> validated();

        //
        $info = new WorkForm();

        $info->work_name = $data['work_name'];//get input from create.php
        $info->condition = $data['con'];
        $info->opr_form_id = $data['fkey'];
    
        $info->save();

        return redirect()->route('oprForm.work.index', $id)-> with('flash_message','Work Activity Added');
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
     * @param  int  $work_id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $work_id)
    {
        $options = Main_Work::all();
        $works = Work::all();
        $opr = OprForm::with('works')->findOrFail($id);
        $workform = WorkForm::find($work_id);

        return view('form.works.edit', [
            'options' => $options,
            'works' => $works,
            'opr' => $opr,
            'workform' => $workform,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EaiWorkFormRequest $request,$id,$work_id)
    {
        $data = $request-> validated();
        
        $info = WorkForm::where('opr_form_id', $id)->findOrFail($work_id);
        

        $info->work_name = $data['work_name'];
        $info->condition = $data['con'];
        $info->opr_form_id = $data['fkey'];
    
        $info->update();

        return redirect()->route('oprForm.work.index',$id)-> with('flash_message','Work Activity Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(OprForm $id,WorkForm $work_id)
    {
        $work_id->delete();

        return redirect()->route('oprForm.work.index',$id)->with('flash_message', 'Work Activity deleted!');
    }
}
