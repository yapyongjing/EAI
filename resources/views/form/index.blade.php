@extends('layouts.app')

@section('content')

<div class="container">
    <h2>EAI Operating Unit List</h2>
    <div class="table-responsive">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Operating unit</th>
          {{-- <th>Location</th>
          <th>Date</th> --}}
        </tr>
      </thead>
      <tbody>
   
            @if (count($form)>0)

                @foreach ($form as $forms)
                    
                    <tr>
                        <td>{{$forms['opr_unit_name']}}</td>
                        {{-- <td>{{$forms['location_name']}}</td>
                        <td>{{$forms['date']}}</td> --}}
                    </tr>
                @endforeach
            @else
                <div class="jumbotron text-left cold-md-4" style="margin-bottom:0">
                    <h1>No Data Available</h1> 
                </div>
            @endif

      </tbody>
    </table>
    </div>
</div>
@endsection

@section('scripts')
    
@endsection