@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Operating List</h2>
    <div class="table-responsive">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>Operating Unit</th>
          </tr>
        </thead>
        <tbody>
    
              @if (count($opr)>0)

                  @foreach ($opr as $oprs)
                      
                      <tr>
                          <td>{{$oprs['opr_unit_name']}}</td>
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
      <a href="{{ route('opr.create') }}" class="btn btn-primary"> Add</a>
    </div>
</div>
@endsection

@section('scripts')
    
@endsection