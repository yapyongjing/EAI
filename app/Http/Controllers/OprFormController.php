<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ListFormRequest;
use App\Models\Main_Work;
use App\Models\Operating_Unit;
use App\Models\OprForm;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as Pdf;
use Dompdf\Dompdf;


//main work/location
class OprFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->input('search');
        
        // Retrieve all forms if no search query is provided
        if (empty($query)) {
            $forms = OprForm::orderBy('date', 'ASC')->simplePaginate(10);
        } else {
            // Filter forms based on the search query
            $forms = OprForm::where('operating_name', 'LIKE', '%' . $query . '%')
                ->orWhere('location_name', 'LIKE', '%' . $query . '%')
                ->orWhere('date', 'LIKE', '%' . $query . '%')
                ->orWhere('prepared_by', 'LIKE', '%' . $query . '%')
                ->orWhere('checked_by', 'LIKE', '%' . $query . '%')
                ->orWhere('approved_by', 'LIKE', '%' . $query . '%')
                ->orderBy('date', 'ASC')
                ->simplePaginate(10);
        }

        return view('form.index', compact('forms'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $oprs = Operating_Unit::all();
        $locations = Main_Work::all();
        $users = User::all();
        
        return view('form.create', compact('oprs','locations','users'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ListFormRequest $request)
    {
        $data = $request-> validated();

        //
        $info = new OprForm();

        $info->operating_name =  $data['opr_name'];
        $info->location_name =  $data['location_name'];
        $info->date =  $data['date'];
        $info->prepared_by = $data['prepared_by'];
        $info->checked_by = $data['checked_by'];
        $info->approved_by = $data['approved_by'];

        $info->save();

        return redirect()->route('oprForm.index')->with('flash_message', 'Form Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(OprForm $data)
    {
        //
        return view('form.show',[
            'form' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oprs = Operating_Unit::all();
        $locations = Main_Work::all();
        $users = User::all();
        $form = OprForm::find($id);
        
        return view('form.edit',[
            'form' => $form,
            'oprs' => $oprs,
            'locations' => $locations,
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
    public function update(ListFormRequest $request,$id)
    {
        $data = $request-> validated();
        
        $info = OprForm::find($id);
        
        $info->operating_name =  $data['opr_name'];
        $info->location_name =  $data['location_name'];
        $info->date =  $data['date'];
        $info->prepared_by = $data['prepared_by'];
        $info->checked_by = $data['checked_by'];
        $info->approved_by = $data['approved_by'];

        $info->update();

        return redirect()->route('oprForm.index')->with('flash_message', 'Form Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OprForm::destroy($id);

        return redirect()->route('oprForm.index')->with('flash_message', 'Form deleted!');
    }

    public function printPdf($id)
    {
        //OprForm
            //MainWorkForm
                //WorkForm
                    //AspectImpactForm
                        //ImportanceRating
                        //RiskControl
        $form = OprForm::with([
            'works' => [
                'aspects' => [
                    'ratings',
                    'risks'
                ]
            ]
        ])->find($id);

       $logoUrl = public_path('logo.png');

        $pdf = new Dompdf();
        
        $pdf = PDF::loadView('form.pdf',['form' => $form, 'logoUrl' => $logoUrl]);

        $pdf->setPaper('custom', 'landscape');
        $pdf->setPaper([0, 0, 1000, 1500], 'landscape');
        
        return $pdf->stream('form.pdf');
    }
}
