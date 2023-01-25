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

                    <form method="POST" action="{{ url('form/' .$forms->id) }}">
                        
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Operating Unit Name</label>
                            <select class="form-control" name="opr_name">
                                <option value="0"> Select Operating Unit</option>
                                
                                @foreach($oprs as $opr)
                                <option value="{{$opr->opr_unit_name}}" {{  $opr->opr_unit_name== $forms->operating_name ? ' selected="selected"' : '' }}>
                                    {{$opr->opr_unit_name}}</option>
                                @endforeach

                            </select>
                        </div><br>
                        
                        <div class="form-group">
                          <label for="location">Location</label>
                          <select class="form-control" name="location_name">
                            <option value="0"> Select Location</option>
                            
                            @foreach($locations as $location)
                                <option value="{{ $location->location_name}}" {{ $location->location_name == $forms->location_name ? ' selected="selected"' : '' }}>
                                {{$location->location_name}}</option>
                            @endforeach

                        </select>
                        </div><br>

                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{$forms->date}}" required>
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
                                    <option value="{{$work->work_name}}" {{ $work->work_name == $forms->work_name ? ' selected="selected"' : '' }}>
                                        {{$work->work_name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="con">Condition</label><br>
                            <div class="form-check-inline">
                                <input type="radio" class="form-check-input" name="con" value="Normal Condition" {{ $forms->condition == 'Normal Condition' ? 'checked' : '' }}>
                                Normal Condition 
                                <label class="form-check-label" for="Air_Pollution"></label>
                            </div>
                            <div class="form-check-inline">
                                <input type="radio" class="form-check-input" name="con" value="Abnormal Condition" {{ $forms->condition == 'Abnormal Condition' ? 'checked' : '' }}>
                                Abnormal Condition 
                                <label class="form-check-label" for="Water_Pollution"></label>
                            </div>
                            <div class="form-check-inline">
                                <input type="radio" class="form-check-input" name="con" value="Emergency" {{ $forms->condition == 'Emergency' ? 'checked' : '' }}>
                                Emergency 
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
                                    <option value="{{$aspect->aspect_name}}" {{$aspect->aspect_name == $forms->aspect_name ? ' selected="selected"' : '' }}>
                                        {{$aspect->aspect_name}}</option>
                                @endforeach
                                </select>
                          </div>
                          <br>

                          <div class="form-group">
                            <label for="impact">Impact</label><br>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="Air_Pollution">
                                <input type="checkbox" class="form-check-input" name="impact[]" value="Air Pollution" {{ in_array('Air Pollution', $impacts) ? 'checked' : '' }}> 
                                Air Pollution
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="Water_Pollution">
                                <input type="checkbox" class="form-check-input" name="impact[]" value="Water Pollution" {{ in_array('Water Pollution', $impacts) ? 'checked' : '' }}>
                                 Water Pollution
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="Soil/Land pollution">
                                <input type="checkbox" class="form-check-input" name="impact[]" value="Soil / Land pollution" {{ in_array('Soil / Land pollution', $impacts) ? 'checked' : '' }}> 
                                Soil / Land pollution
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="Depletion_of_natural_resources">
                                <input type="checkbox" class="form-check-input" name="impact[]" value="Depletion of natural resources" {{ in_array('Depletion of natural resources', $impacts) ? 'checked' : '' }}> 
                                Depletion of natural resources
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="Shortage_of_landfill">
                                <input type="checkbox" class="form-check-input" name="impact[]" value="Shortage of landfill" {{ in_array('Shortage of landfill', $impacts) ? 'checked' : '' }}> 
                                Shortage of landfill
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="Nuisance">
                                <input type="checkbox" class="form-check-input" name="impact[]" value="Nuisance" {{ in_array('Nuisance', $impacts) ? 'checked' : '' }}> 
                                Nuisance
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="Beneficial">
                                <input type="checkbox" class="form-check-input" name="impact[]" value="Beneficial" {{ in_array('Beneficial', $impacts) ? 'checked' : '' }}> 
                                Beneficial
                                </label>
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="rqm">Applicable Env. Legal/Reg/COP or other requirement</label>
                            <input type="text" class="form-control" id="rqm" placeholder="Enter requirement" name="rqm" 
                            value="{{ $forms->requirement_name }}"required>
                            @error('rqm')
                              <div class="form-error">
                                  {{$message}}
                              </div>
                              @enderror
                        </div>
                        <br> --}}

                        <button type="submit" class="float-right btn btn-dark btn-primary">Save</button>
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