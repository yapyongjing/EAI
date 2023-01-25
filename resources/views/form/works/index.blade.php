@extends('layouts.app')

@section('content')

@if($message = Session::get('flash_message'))

<div  class="container alert alert-success">
  {{$message}}
</div>

@endif

<div class="container">
    <h2>Work Activity on {{$opr->location_name}}</h2>
    <br>
    
    <div class="bg-light d-flex justify-content-between">
      <a href="{{ route('form.works.create',$opr->id)}}" class="btn btn-primary"> Add Work Activity</a>
    
      <a href="{{ route('form.index')}}" class="btn btn-dark clearfix pull-right"> Back</a>
    </div>
  
    <div class="table-responsive">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>Work Activity</th>
            <th>Condition</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
    
              

                  @foreach ($works as $work)
                      
                      <tr>
                          <td>{{$work->work_name}}</td>
                          <td>{{$work->condition}}</td>
                          <td>
                            <a href="{{ route('form.works.edit',[$opr->id, $work->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form method="post" action="{{ route('form.destroy', $work->id) }}" style="display:inline">
                              @csrf
                              @method('DELETE')
                              <input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)">
                            </form>
                            <a href="" class="btn btn-primary btn-sm">Aspect Impact</a>
                          </td>
                      </tr>
                  @endforeach
             

        </tbody>
      </table>
    </div>
</div>
@endsection

@section('scripts')
    
@endsection