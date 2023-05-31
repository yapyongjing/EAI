<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonInCharge;

class PersonInChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pic.index', [
            'pics' => PersonInCharge::cursorPaginate(10)
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request-> validate([
            'pic_name' => 'required',
        ]);

        $info = new PersonInCharge();


        $info->person_in_charge_name = $data['pic_name'];//get input from create.php

        $info->save();

        return redirect()->route('pic.index')-> with('flash_message','User Added');
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
    public function edit(PersonInCharge $pic)
    {
        return view('pic.edit', compact('pic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pic)
    {
        $data = $request-> validate([
            'pic_name' => 'required',
        ]);

        $info = PersonInCharge::findOrFail($pic);
        
        $info->person_in_charge_name = $data['pic_name'];

        $info->update();

        return redirect()->route('pic.index')-> with('flash_message','User edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pic)
    {
        PersonInCharge::destroy($pic);

        return redirect()->route('pic.index')->with('flash_message', 'Unit deleted!');
    }
}
