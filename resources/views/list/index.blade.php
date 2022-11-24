@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Guidance List</h2>
    <div class="table-responsive">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>Work Activity</th>
            <th>Condition</th>
            <th>Aspect</th>
            <th>Impact</th>
          </tr>
        </thead>
        <tbody>
    
              @if (count($list)>0)

                  @foreach ($list as $lists)
                      
                      <tr>
                          <td>{{$lists['Work']}}</td>
                          <td>{{$lists['Con']}}</td>
                          <td>{{$lists['Aspect']}}</td>
                          <td>{{$lists['Impact']}}</td>
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
      <a href="{{ route('list.create') }}" class="btn btn-primary"> Add</a>
    </div>
</div>
@endsection

@section('scripts')
    
@endsection