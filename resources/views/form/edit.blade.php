@extends('layouts.app')

@section('content')

<div class="container" style="margin-top:30px">
    <div class="row">
        
        <div class="text-left col-4 mt-4 p-5 rounded" style="margin-bottom:0">
            <h1>Assessment Form</h1> 
            <p>Edit Ratings</p> 
        </div>

        <div class="col-8">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">

                    {{-- <div class="hidden sm:block">
                        <div class="py-8">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div> --}}

                    <form method="POST" action="{{ route('oprForm.update',['id' => $form->id]) }}">
                        
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Operating Unit Name</label>
                            <select class="form-control" name="opr_name">
                                <option value="0"> Select Operating Unit</option>
                                
                                @foreach($oprs as $opr)
                                <option value="{{$opr->opr_unit_name}}" 
                                    {{  $opr->opr_unit_name== $form->operating_name ? ' selected="selected"' : '' }}>
                                    {{$opr->opr_unit_name}}
                                </option>
                                @endforeach

                            </select>
                        </div><br>
                        
                        <div class="form-group">
                          <label for="location">Location</label>
                          <select class="form-control" name="location_name">
                            <option value="0"> Select Location</option>
                            
                            @foreach($locations as $location)
                                <option value="{{ $location->location_name}}" {{ $location->location_name == $form->location_name ? ' selected="selected"' : '' }}>
                                {{$location->location_name}}</option>
                            @endforeach

                        </select>
                        </div><br>

                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{$form->date}}" required>
                            @error('date')
                            <div class="form-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <br>

                        

                        <button type="submit" class="float-right btn btn-dark btn-primary">Save</button>
                        <a href="{{ route('oprForm.index') }}" class="btn float-right"> Back</a>
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