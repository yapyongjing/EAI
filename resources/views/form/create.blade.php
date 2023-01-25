@extends('layouts.app')

@section('content')

<div class="container" style="margin-top:30px">
    <div class="row">
        
        <div class="text-left col-4 mt-4 p-5 rounded" style="margin-bottom:0">
            <h1>Assessment Form</h1> 
            <p>Key in the Ratings</p> 
        </div>

        <div class="col-8">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">

                    <form method="POST" action="{{route('form.store')}}">
                        
                        @csrf

                        <h4>1. Identification of Aspects and Impacts</h4>
                        <br>
                        <div class="form-group">
                            <label for="name">Operating Unit Name</label>
                            <select class="form-control" name="opr_name">
                                <option value="0"> Select Operating Unit</option>
                                
                                @foreach($oprs as $opr)
                                    <option value="{{ $opr->opr_unit_name}}">{{ $opr->opr_unit_name }}</option>
                                @endforeach

                            </select>
                        </div><br>
                        
                        <div class="form-group">
                          <label for="location">Location</label>
                          <select class="form-control" name="location_name">
                            <option value="0"> Select Location</option>
                            
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

                        {{-- <hr>

                        <div class="form-group">
                            <label for="fkey">Work Activity Name</label>
                            <select class="form-control" id="work_name" name="work_name">
                                <option value="0"> Select Work Activity</option>
                                
                                @foreach($works as $work)
                                    <option value="{{$work->work_name}}">{{$work->work_name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="con">Condition</label><br>
                            <div class="form-check-inline">
                                <input type="radio" class="form-check-input" name="con" value="Normal Condition">Normal Condition 
                                <label class="form-check-label" for="Air_Pollution"></label>
                            </div>
                            <div class="form-check-inline">
                                <input type="radio" class="form-check-input" name="con" value="Abnormal Condition">Abnormal Condition 
                                <label class="form-check-label" for="Water_Pollution"></label>
                            </div>
                            <div class="form-check-inline">
                                <input type="radio" class="form-check-input" name="con" value="Emergency">Emergency 
                                <label class="form-check-label" for="Soil/Land pollution"></label>
                            </div>
                        </div>
                        <br>

                        <hr>
                        <div class="form-group">
                            <label for="aspect">Aspect</label>
                              <select class="form-control" id="aspect" name="aspect">
                                <option value="0"> Select Aspect</option>
                                @foreach($aspects as $aspect)
                                    <option value="{{$aspect->aspect_name}}">{{$aspect->aspect_name}}</option>
                                @endforeach
                                </select>
                          </div>
                          <br>

                          <div class="form-group">
                            <label for="impact">Impact</label><br>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="Air_Pollution">
                                <input type="checkbox" class="form-check-input" name="impact[]" value="Air Pollution"> Air Pollution
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="Water_Pollution">
                                <input type="checkbox" class="form-check-input" name="impact[]" value="Water Pollution"> Water Pollution
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="Soil/Land pollution">
                                <input type="checkbox" class="form-check-input" name="impact[]" value="Soil / Land pollution"> Soil / Land pollution
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="Depletion_of_natural_resources">
                                <input type="checkbox" class="form-check-input" name="impact[]" value="Depletion of natural resources"> Depletion of natural resources
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="Shortage_of_landfill">
                                <input type="checkbox" class="form-check-input" name="impact[]" value="Shortage of landfill"> Shortage of landfill
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="Nuisance">
                                <input type="checkbox" class="form-check-input" name="impact[]" value="Nuisance"> Nuisance
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="Beneficial">
                                <input type="checkbox" class="form-check-input" name="impact[]" value="Beneficial"> Beneficial
                                </label>
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="rqm">Applicable Env. Legal/Reg/COP or other requirement</label>
                            <input type="text" class="form-control" id="rqm" placeholder="Enter Requirement" name="rqm" required>
                            @error('rqm')
                              <div class="form-error">
                                  {{$message}}
                              </div>
                              @enderror
                        </div>
                        <br> --}}

                        <button type="submit" class="float-right btn btn-dark btn-primary">Submit</button>
                        <a href="{{ route('form.index') }}" class="btn float-right"> Back</a>
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