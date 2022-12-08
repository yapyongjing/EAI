@extends('layouts.app')

@section('content')

<div class="container">
    <h2>EAI Form List</h2>
    <div class="table-responsive">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Operating unit</th>
          <th>Location</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        
            @if (count($forms)>0)

            {{-- show all information --}}
                @foreach ($forms as $form)
                    
                    <tr>
                      <td>{{$form->opr->opr_unit_name}}</td>
                      <td>{{$form->location_name}}</td>
                      <td>{{$form->date}}</td>
                    </tr>
                @endforeach
            @else
                <div class="jumbotron text-left cold-md-4" style="margin-bottom:0">
                    <h1>No Data Available</h1> 
                </div>
            @endif

      </tbody>
    </table>
    <i class="fas fa-plus"></i>
      <a href="{{ route('form.create') }}" class="btn btn-primary"> Add</a>
    </div>
</div>
@endsection

@section('scripts')
    
@endsection