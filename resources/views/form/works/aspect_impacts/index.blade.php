@extends('layouts.app')

@section('content')

@if($message = Session::get('flash_message'))

<div  class="container alert alert-success">
  {{$message}}
</div>

@endif

<div class="container">
    <h2>Aspect Impact on {{$work->work_name}}</h2>
    <br>
    
    <div class="bg-light d-flex justify-content-between">
      <a href="{{ route('oprForm.work.aspectImpact.create',[$work->opr_form_id,$work->id])}}" class="btn btn-primary"> Add Aspect Impact</a>
    
      <a href="{{ route('oprForm.work.index',$work->opr_form_id)}}" class="btn btn-dark clearfix pull-right"> Back</a>
    </div>
    <br>

    <div class="d-flex justify-content-end mb-3">
      <form action="{{ route('oprForm.work.aspectImpact.index',[$id, $work->id]) }}" method="GET" class="form-inline" id="searchForm">
        <div class="form-group mr-2">
          <input type="text" name="search" class="form-control" placeholder="Search..." id="searchInput" value="{{ request('search') }}" autofocus>
        </div>
      </form>
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
                      <td>{{ $aspect->aspect_name }}</td>
                      <td>{{ $aspect->impact_name }}</td>
                      <td>{{ $aspect->requirement_name }}</td>
                      <td>
                          <a href="{{ route('oprForm.work.aspectImpact.edit',[$id, $work->id, $aspect->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                          {{-- delete button --}}
                          <form method="post" action="{{ route('oprForm.work.aspectImpact.destroy',[$id, $work->id,$aspect->id]) }}" style="display:inline">
                              @csrf
                              @method('DELETE')
                              <input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)">
                          </form>
                          <br><br>

                          {{-- Importance button --}}
                          @foreach ($ratings as $rating)
                              @if ($rating->aspect_impact_form_id == $aspect->id) 
                                  <a href="{{ route('oprForm.work.aspectImpact.importantRate.edit',[$id, $work->id, $aspect->id,$rating->id]) }}" class="btn btn-secondary btn-sm">Edit Importance</a>
                              @endif
                          @endforeach

                          @if ($aspect->ratings->isEmpty())
                              <a href="{{ route('oprForm.work.aspectImpact.importantRate.index',[$id, $work->id, $aspect->id]) }}" class="btn btn-secondary btn-sm">New Importance</a>
                          @endif

                          <br><br>
                          {{--Risk Control button--}}
                          @foreach ($risks as $risk)
                              @if ($risk->aspect_impact_form_id == $aspect->id) 
                                <a href="{{ route('oprForm.work.aspectImpact.riskControl.edit',[$id, $work->id, $aspect->id,$risk->id])}}" class="btn btn-secondary btn-sm">Edit Risk Control</a>
                              @endif
                          @endforeach

                          @if ($aspect->risks->isEmpty())
                            <a href="{{ route('oprForm.work.aspectImpact.riskControl.index',[$id, $work->id, $aspect->id])}}" class="btn btn-secondary btn-sm">New Risk Control</a>
                          @endif

                          {{-- <a href="{{ route('oprForm.work.aspectImpact.print-pdf', [$id, $work->id, $aspect->id]) }}" target="_blank" class="btn btn-info btn-sm">Print</a> --}}

                      </td>
                  </tr>
              @endforeach
        </tbody>
      </table>
    </div>
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