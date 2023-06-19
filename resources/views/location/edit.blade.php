@extends('layouts.app')

@section('content')

<div class="container" style="margin-top:30px">
    <div class="row">
        
        <div class="text-left col-4 mt-4 p-5 rounded" style="margin-bottom:0">
            <h1>Location</h1> 
            <p>Edit location information</p> 
        </div>

        <div class="col-8">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">

                    <form method="POST" action="{{{ url('location/' .$location->id) }}}">
                        
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Operating Unit Name</label>
                            <select class="form-control" name="name">
                                
                                @foreach($oprs as $opr)
                                <option value="{{$opr->id}}" {{  $opr->id== $location->opr_id ? ' selected="selected"' : '' }}>
                                        {{$opr->opr_unit_name}}</option>
                                @endforeach

                            </select>
                        </div><br>
                        
                        <div class="form-group">
                          <label for="location">Location</label>
                          <input type="text" class="form-control" id="location" placeholder="Enter location" name="location" 
                          value="{{ $location->location_name }}" required>
                          @error('location')
                            <div class="form-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div><br>
                        <button type="submit" class="float-right btn btn-dark btn-primary">Submit</button>
                        <a href="{{ route('location.index') }}" class="btn float-right"> Back</a>
                    </form>
                </div>
                <div class="card-footer">
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    
@endsection