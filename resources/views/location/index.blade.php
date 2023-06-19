@extends('layouts.app')

@section('content')

@if($message = Session::get('flash_message'))

<div  class="container alert alert-success">
  {{$message}}
</div>

@endif

<div class="container">
    <h2>EAI Location List</h2>
    <a href="{{ route('location.create') }}" class="btn btn-primary"> Add</a>

    <div class="d-flex justify-content-end mb-3">
      <form action="{{ route('location.index') }}" method="GET" class="form-inline" id="searchForm">
        <div class="form-group mr-2">
          <input type="text" name="search" class="form-control" placeholder="Search..." id="searchInput" value="{{ request('search') }}" autofocus>
        </div>
      </form>
    </div>
    

    <div class="table-responsive">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Operating unit</th>
          <th>Location</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody> 
            @if (count($locations)>0)
                @foreach ($locations as $location)
                    <tr>
                      <td>{{$location->opr->opr_unit_name}}</td>
                      <td>{{$location->location_name}}</td>
                      <td>
                        <a href="{{ route('location.edit', $location->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form method="post" action="{{ route('location.destroy', $location->id) }}" style="display:inline">
                          @csrf
                          @method('DELETE')
                          <input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)"/>
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
    {{$locations->links()}}
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