@extends('layouts.app')

@section('content')

<div class="container" style="margin-top:30px">
    <div class="row">
        
        <div class="text-left col-4 mt-4 p-5 rounded" style="margin-bottom:0">
            <h1>New Work Activity</h1> 
            <p>Edit work activity</p> 
        </div>

        <div class="col-8">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('oprForm.work.aspectImpact.update', 
                    [ 'id' => $opr->id, 'work_id' => $workform->id, 'ai_id' => $aiform->id] ) }}">
                        
                        @csrf
                        @method('PUT')

                            <div class="form-group">
                                <label for="fkey">Work Activity Name</label>
                                <select class="form-control" id="fkey" name="fkey">
                                    <option value="0"> Select Work Activity</option>
                                    
                                    //option = work, work = work in form
                                    @foreach($options as $option)
                                        <option value="{{$workform->id}}"
                                            {{$option->work_name == $workform ->work_name ? 'selected="selected"' : 'disabled'}}>
                                            {{$option->work_name}}
                                        </option>
                                    @endforeach

                                </select>
                            </div><br>

                            <div class="form-group">
                            <label for="aspect">Aspect</label>
                            <select class="form-control" id="aspect" name="aspect">
                                <option value="0"> Select Aspect</option>
                                
                                    @foreach($aspects as $aspect)
                                        <option value="{{$aspect->aspect_name}}"
                                            {{$aspect->aspect_name == $aiform->aspect_name ? ' selected="selected"' : '' }}>
                                            {{$aspect->aspect_name}}
                                        </option>
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
                                <select class="form-control" id="rqm" name="rqm">
                                    <option value="0"> Select requirement</option>
                                    
                                    @foreach($rqms as $rqm)
                                        <option value="{{$rqm->requirement_name}}"
                                            {{$rqm->requirement_name == $aiform->requirement_name ? ' selected="selected"' : '' }}>
                                            {{$rqm->requirement_name}}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <br>

                        <button type="submit" class="float-right btn btn-dark btn-primary">Edit</button>
                        <a href="{{ route('oprForm.work.aspectImpact.index', [$workform->opr_form_id,$workform->id]) }}" class="btn float-right"> Back</a>
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