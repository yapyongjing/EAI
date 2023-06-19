<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LocationFormRequest;
use App\Models\Main_Work;
use App\Models\Operating_Unit;

//also known as location
class MainWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->input('search');
        
        if (empty($query)) {
            $locations = Main_Work::with('opr')
            ->orderBy('opr_id','asc')
            ->simplepaginate(10);
        } else {
            // Filter forms based on the search query
            $locations = Main_work::Where('location_name', 'LIKE', '%' . $query . '%')
                ->orderBy('opr_id', 'ASC')
                ->simplepaginate(10);
        }

        return view('location.index', compact(var_name: 'locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $oprs = Operating_Unit::all();
        
        return view('location.create',compact(var_name: 'oprs'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationFormRequest $request)
    {
        $data = $request-> validated();

        $info = new Main_Work();

        $info->location_name =  $data['location'];//get input from create.php
        $info->opr_id = $data['name'];

        $info->save();

        return redirect()->route('location.index')-> with('flash_message','Location Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Main_Work $data)
    {
        //
        return view('location.show',[
            'location' => $data
        ]);
    }

    /**
     * Show the location for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location= Main_Work::find($id);
        $oprs = Operating_Unit::all();
        
        return view('location.edit',compact('location', 'oprs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocationFormRequest $request,$id)
    {
        $info = Main_Work::find($id);
        $data = $request-> validated();

        $info->opr_id = $data['name'];
        $info->location_name =  $data['location'];

        $info->update();

        return redirect()->route('location.index')->with('flash_message', 'Location Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Main_Work::destroy($id);

        return redirect('location')->with('flash_message', 'Location deleted!');
    }
}