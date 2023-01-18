<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OprRequest;
use App\Models\OperatingUnit;

//operating unit
class OprUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('opr.index', [
            'oprs' => OperatingUnit::all()
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('opr.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OprRequest $request)
    {
        //
        $data = $request-> validated();

        //
        $info = new OperatingUnit();


        $info->opr_unit_name = $data['opr_name'];//get input from create.php

        $info->save();

        return redirect()->route('opr.index')-> with('flash_message','Operating Unit Added');
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
    public function edit(OperatingUnit $opr)
    {
        return view('opr.edit', compact('opr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OprRequest $request, $id)
    {
        $opr = OperatingUnit::find($id);
        $input = $request->validated();

        $opr->opr_unit_name = $input['opr_name'];
        $opr->update();

        return redirect()->route('opr.index')-> with('flash_message','Operating Unit edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OperatingUnit::destroy($id);

        return redirect('opr')->with('flash_message', 'Operating Unit deleted!');
    }
}
