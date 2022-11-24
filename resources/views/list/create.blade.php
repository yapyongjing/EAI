@extends('layouts.app')

@section('content')

<div class="container" style="margin-top:30px">
    <div class="row">
        
        <div class="text-left col-4 mt-4 p-5 rounded" style="margin-bottom:0">
            <h1>New Work Activity</h1> 
            <p>Key in new work activity</p> 
        </div>

        <div class="col-8">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">

                    <form method="POST" action="{{route('list.store')}}">
                        
                        @csrf

                        <div class="form-group">
                          <label for="work_name">Name of work activity</label>
                          <input type="text" class="form-control " id="work_name" placeholder="Enter work name" name="work_name" value="{{ old('work_name') }}" required>
                          @error('work_name')
                            <div class="form-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <br>
                        
                        <div class="form-group">
                            <label for="con">Condition</label><br>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="Air_Pollution">
                                <input type="checkbox" class="form-check-input" name="con[]" value="Normal Condition"> Normal Condition
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="Water_Pollution">
                                <input type="checkbox" class="form-check-input" name="con[]" value="Abnormal Condition"> Abnormal Condition
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="Soil/Land pollution">
                                <input type="checkbox" class="form-check-input" name="con[]" value="Emergency"> Emergency
                                </label>
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                          <label for="aspect">Aspect</label>
                          <input type="text" class="form-control" id="aspect" placeholder="Enter aspect" name="aspect" required>
                          @error('aspect')
                            <div class="form-error">
                                {{$message}}
                            </div>
                            @enderror
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
                        <button type="submit" class="float-right btn btn-dark btn-primary">Submit</button>
                        <button type="button" class="btn float-right">Cancel</button>
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