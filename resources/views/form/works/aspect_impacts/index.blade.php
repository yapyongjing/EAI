@extends('layouts.app')

@section('content')

@if($message = Session::get('flash_message'))

<div  class="container alert alert-success">
  {{$message}}
</div>

@endif

<div class="container">
    <h2>Work Activity on {{$work->work_name}}</h2>
    <br>
    
    <div class="bg-light d-flex justify-content-between">
      <a href="{{ route('oprForm.work.aspectImpact.create',[$work->opr_form_id,$work->id])}}" class="btn btn-primary"> Add Aspect Impact</a>
    
      <a href="{{ route('oprForm.work.index',$work->opr_form_id)}}" class="btn btn-dark clearfix pull-right"> Back</a>
    </div>
  
    <div class="table-responsive">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>Aspect</th>
            <th>Impact</th>
            <th>Requirement</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

              @foreach ($aspects as $aspect)
                  
                  <tr>
                      <td>{{$aspect->aspect_name}}</td>
                      <td>{{$aspect->impact_name}}</td>
                      <td>{{$aspect->requirement_name}}</td>
                      <td>
                        <a href="{{ route('oprForm.work.aspectImpact.edit',[$opr->id, $work->id, $aspect->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form method="post" action="{{ route('oprForm.work.aspectImpact.destroy',[$opr->id, $work->id,$aspect->id]) }}" style="display:inline">
                          @csrf
                          @method('DELETE')
                          <input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)">
                        </form>
                        {{-- @if ($ratingExists) 
                          <a href="{{ route('oprForm.work.aspectImpact.importantRating.edit',[$opr->id, $work->id, $aspect->id]) }}" class="btn btn-secondary btn-sm">Importance1</a>
                        @else --}}
                        <a href="{{ route('oprForm.work.aspectImpact.importantRating.index',[$opr->id, $work->id, $aspect->id]) }}" class="btn btn-secondary btn-sm">Importance</a>
                        {{-- @endif --}}
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