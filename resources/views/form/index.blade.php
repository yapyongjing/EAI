@extends('layouts.app')

@section('content')

@if($message = Session::get('flash_message'))

<div  class="container alert alert-success">
  {{$message}}
</div>

@endif

<div class="container">
    <h2>Environment Aspect Impact Form List</h2><br>
    <div class="table-responsive">
      @can('form-create')
    <a href="{{ route('oprForm.create') }}" class="btn btn-primary"> Add New Form</a>
    @endcan

    <div class="d-flex justify-content-end mb-3">
      <form action="{{ route('oprForm.index') }}" method="GET" class="form-inline" id="searchForm">
        <div class="form-group mr-2">
          <input type="text" name="search" class="form-control" placeholder="Search..." id="searchInput" value="{{ request('search') }}">
        </div>
      </form>
    </div>
  

    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Operating unit</th>
          <th>Location</th>
          <th>Date</th>
          <th>Prepared By</th>
          <th>Checked By</th>
          <th>Approved By</th>
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
                      <td>{{$form->prepared_by}}</td>
                      <td>{{$form->checked_by}}</td>
                      <td>{{$form->approved_by}}</td>
                      <td>
                        {{-- <a href="{{ route('form.show', $form->id) }}" class="btn btn-primary btn-sm">View</a> --}}
                        @can('form-list')
                        <a href="{{ route('oprForm.edit', $form->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        @can('form-delete')
                        <form method="POST" action="{{ route('oprForm.destroy', ['id' => $form->id]) }}" style="display:inline">
                          @csrf
                          @method('DELETE')
                          <input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)">
                        </form>
                        @endcan
                        <a href="{{ route('oprForm.work.index',['id' => $form->id]) }}" class="btn btn-secondary btn-sm">Work Activity</a>
                        @endcan
                        <a href="{{ route('oprForm.print-pdf', ['id' => $form->id]) }}" target="_blank" class="btn btn-info btn-sm">PDF</a>
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
    {{$forms->links()}}
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