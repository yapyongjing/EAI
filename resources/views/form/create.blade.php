@extends('layouts.app')

@section('content')

<div class="container" style="margin-top:30px">
    <div class="row">
        
        <div class="text-left col-4 mt-4 p-5 rounded" style="margin-bottom:0">
            <h1>Assessment Form</h1> 
            <p>New assessment form</p> 
        </div>

        <div class="col-8">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">

                    <form method="POST" action="{{route('oprForm.store')}}">
                        
                        @csrf

                        <h4>1. Identification of Aspects and Impacts</h4>
                        <br>
                        <div class="form-group">
                            <label for="name">Operating Unit Name</label>
                            <select class="form-control" name="opr_name" required>
                                <option value="" disabled selected> Select Operating Unit</option>
                                
                                @foreach($oprs as $opr)
                                    <option value="{{ $opr->opr_unit_name}}">{{ $opr->opr_unit_name }}</option>
                                @endforeach

                            </select>
                        </div><br>
                        
                        <div class="form-group">
                          <label for="location">Location</label>
                          <select class="form-control" name="location_name" required>
                            <option value="" disabled selected> Select Location</option>
                            
                            @foreach($locations as $location)
                                <option value="{{ $location->location_name}}">{{ $location->location_name }}</option>
                            @endforeach

                        </select>
                        </div><br>

                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                            @error('date')
                            <div class="form-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="prepared_by">Prepared By</label>
                            <select class="form-control" name="prepared_by" required>
                              <option value="" disabled selected> Select User</option>
                              
                              @foreach($users as $user)
                                    <option value="{{ $user->name}}">{{ $user->name }}</option>
                                @endforeach
  
                          </select>
                          </div><br>

                        <div class="form-group">
                            <label for="checked_by">Checked By</label>
                            <select class="form-control" name="checked_by" required>
                              <option value="" disabled selected> Select User</option>
                              
                              @foreach($users as $user)
                                    <option value="{{ $user->name}}">{{ $user->name }}</option>
                                @endforeach
  
                          </select>
                          </div><br>
                        
                          <div class="form-group">
                            <label for="approved_by">Approved By</label>
                            <select class="form-control" name="approved_by" required>
                              <option value="" disabled selected> Select User</option>
                              
                              @foreach($users as $user)
                                    <option value="{{ $user->name}}">{{ $user->name }}</option>
                                @endforeach
  
                          </select>
                          </div><br>

                        <button type="submit" class="float-right btn btn-dark btn-primary">Submit</button>
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