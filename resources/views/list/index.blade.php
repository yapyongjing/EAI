@extends('layouts.app')

@section('content')

@if($message = Session::get('flash_message'))

<div  class="container alert alert-success">
  {{$message}}
</div>

@endif

<div class="container">
    <h2>Work Activity List</h2>
    <a href="{{ route('list.create') }}" class="btn btn-primary"> Add</a>
    <div class="table-responsive">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>Work Activity</th>
            <th>Condition</th>
            <th>Aspect</th>
            <th>Impact</th>
            <th>Requirement</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
    
              @if (count($lists)>0)

                  @foreach ($lists as $list)
                      
                      <tr>
                          <td>{{$list->workAspect->work_name}}</td>
                          <td>{{$list->workAspect->condition}}</td>
                          <td>{{$list->aspect_name}}</td>
                          <td>{{$list->impact_name}}</td>
                          <td>{{$list->requirement_name}}</td>
                          <td>
                            <a href="{{ route('list.edit', $list->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form method="post" action="{{ route('list.destroy', $list->id) }}" style="display:inline">
                              @csrf
                              @method('DELETE')
                              <input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)">
                            </form>
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