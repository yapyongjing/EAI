@extends('layouts.app')

@section('content')

@if($message = Session::get('flash_message'))

<div  class="container alert alert-success">
  {{$message}}
</div>

@endif

<div class="container">
    <h2>User/Person In Charge List</h2>
    <a href="{{ route('pic.create') }}" class="btn btn-primary"> Add</a>
    <div class="table-responsive">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>User/Person In Charge</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
    
              @if (count($pics)>0)

                  @foreach ($pics as $pic)
                      
                      <tr>
                          <td>{{$pic->person_in_charge_name}}</td>
                          <td>
                            <a href="{{ route('pic.edit', $pic->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form method="post" action="{{ route('pic.destroy', $pic->id) }}" style="display:inline">
                              @csrf
                              @method('DELETE')
                              <input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)"/>
                            </form>
                          </td>
                      </tr>
                  @endforeach
              @else
                  <div class="jumbotron text-left cold-md-4" style="margin-bottom:0">
                    <br>
                      <h2>No Data Available</h2> 
                  </div>
              @endif

        </tbody>
      </table>
    </div>
    {{ $pics->links() }}
</div>
@endsection

@section('scripts')
    
@endsection