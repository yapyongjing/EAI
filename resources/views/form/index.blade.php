@extends('layouts.app')

@section('content')

@if($message = Session::get('flash_message'))

<div  class="container alert alert-success">
  {{$message}}
</div>

@endif

<div class="container">
    <h2>EAI Form List</h2><br>
    <div class="table-responsive">
    <a href="{{ route('form.create') }}" class="btn btn-primary"> Add Operating Unit</a>

    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Operating unit</th>
          <th>Location</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        
            @if (count($forms)>0)

            {{-- show all information --}}
                @foreach ($forms as $form)
                    <tr>
                      <td>{{$form->operating_name}}</td>
                      <td>{{$form->location_name}}</td>
                      <td>{{$form->date}}</td>
                      <td>
                        {{-- <a href="{{ route('form.show', $form->id) }}" class="btn btn-primary btn-sm">View</a> --}}
                        <a href="{{ route('form.edit', $form->id) }}" class="btn btn-primary btn-sm">View</a>
                        <form method="post" action="{{ route('form.destroy', $form->id) }}" style="display:inline">
                          @csrf
                          @method('DELETE')
                          <input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)">
                        </form>
                        <a href="{{ route('form.works.index',$form->id) }}" class="btn btn-primary btn-sm">Work Activity</a>
                      </td>
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