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
      <a href="{{ route('oprForm.work.create',$opr->id)}}" class="btn btn-primary"> Add Work Activity</a>
      <a href="{{ route('oprForm.index')}}" class="btn btn-dark clearfix pull-right"> Back</a>
    </div>
    <br>
    
    <div class="d-flex justify-content-end mb-3">
      <form action="{{ route('oprForm.work.index',[$opr->id]) }}" method="GET" class="form-inline" id="searchForm">
        <div class="form-group mr-2">
          <input type="text" name="search" class="form-control" placeholder="Search..." id="searchInput" value="{{ request('search') }}" autofocus>
        </div>
      </form>
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
                        <a href="{{ route('oprForm.work.edit',[$opr->id, $work->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form method="post" action="{{ route('oprForm.work.destroy',[$opr->id, $work->id]) }}" style="display:inline">
                          @csrf
                          @method('DELETE')
                          <input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)">
                        </form>
                        <a href="{{ route('oprForm.work.aspectImpact.index',[$opr->id, $work->id]) }}" class="btn btn-secondary btn-sm">Aspect Impact</a>
                      </td>
                  </tr>
              @endforeach
             

        </tbody>
      </table>
    </div>
    {{$opr->links}}
</div>
@endsection

@section('scripts')
<script>
  document.getElementById('searchInput').addEventListener('input', function() {
      if (this.value.trim() === '') {
          this.form.submit();
      }
  });
</script>
@endsection