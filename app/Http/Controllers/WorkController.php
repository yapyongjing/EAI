<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WorkFormRequest;
use App\Models\Work;
use App\Models\Main_Work;
use App\Models\Aspect_Impact;

//known as work 
class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchQuery = $request->input('search');

        if (empty($searchQuery)) {
            $lists = Aspect_Impact::with('workAspect')
                ->orderBy('work_id', 'asc')
                ->simplePaginate(8);
        } else {
            // Filter forms based on the search query
            $lists = Aspect_Impact::with('workAspect')
                ->whereHas('workAspect', function ($query) use ($searchQuery) {
                    $query->where('work_name', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('condition', 'LIKE', '%' . $searchQuery . '%');
                })
                ->orWhere('aspect_name', 'LIKE', '%' . $searchQuery . '%')
                ->orWhere('impact_name', 'LIKE', '%' . $searchQuery . '%')
                ->orWhere('requirement_name', 'LIKE', '%' . $searchQuery . '%')
                ->orderBy('work_id', 'asc')
                ->simplePaginate(8);
        }

        return view('list.index', [
            'lists' => $lists,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $options = Main_Work::all();

        return view('list.create',[
            'options' => $options,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkFormRequest $request)
    {
        $data = $request-> validated();

        //
        $info = new Work();

        $info->work_name = $data['work_name'];//get input from create.php
        $info->condition = $data['con'];
        $info->mainWork_id = $data['fkey'];
    
        $info->save();

        return redirect()->route('list.index')->with('flash_message', 'Work Activity Added!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // import the aspect impact id from index function so that while editing aspect impact ,the system can know which id
    // ai_id: index-> index.blade -> edit -> edit.blade -> update -> update.blade -> 
    //-> aspect impact controller -> edit -> edit.blade -> update -> update.blade -> index -> end
    public function edit($work_id,$ai_id)
    {
        
        $work = Work::where('id', $work_id)->firstOrFail();
        
        $options = Main_Work::all(); 

        return view('list.edit', [
            'work_id' => $work_id,
            'ai_id' => $ai_id,
            'work'=>$work, 
            'options' => $options
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WorkFormRequest $request, Work $work_id,$ai_id)
    {
        $input = $request->validated();

        $work_id->work_name = $input['work_name'];
        $work_id->condition = $input['con'];
        $work_id->mainWork_id = $input['fkey'];
        $work_id->update();

        $aspectImpact = $work_id->aspects->where('id', $ai_id)->first();

        if ($aspectImpact) {
            return redirect()->route('aspect_impact.edit', ['work_id' => $work_id,'ai_id' => $aspectImpact]);
        }
    }
    
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $list)
    {
        // Work::destroy($list);

        // return redirect()->route('list.index')->with('flash_message', 'Work Activity deleted!');
    }
}