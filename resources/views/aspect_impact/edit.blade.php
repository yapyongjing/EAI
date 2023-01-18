@extends('layouts.app')

@section('content')

<div class="container" style="margin-top:30px">
    <div class="row">
        
        <div class="text-left col-4 mt-4 p-5 rounded" style="margin-bottom:0">
            <h1>Work Activity</h1> 
            <p>Edit work activity</p> 
        </div>

        <div class="col-8">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ url('aspect_impact/' .$aspects->id) }}">
                        
                        @csrf
                        @method('PUT')

                        {{--work activity dropdown--}}
                        <div class="form-group">
                            <label for="fkey">Work Activity Name</label>
                            <select class="form-control" id="fkey" name="fkey">
                                
                                @foreach($works as $work)
                                    <option value="{{$work->id}}" {{  $work->id== $aspects->work_id ? ' selected="selected"' : '' }}>
                                        {{$work->work_name}}</option>
                                @endforeach

                            </select>
                        </div><br>

                        {{-- aspect textfield --}}
                        <div class="form-group">
                          <label for="aspect">Aspect</label>
                          <input type="text" class="form-control" id="aspect" placeholder="Enter aspect" name="aspect" 
                          value="{{ $aspects->aspect_name }}" required>
                          @error('aspect')
                            <div class="form-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <br>

                        {{-- impact checkbox --}}
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

                         {{-- requirement textfield --}}
                        <div class="form-group">
                        <label for="rqm">Applicable Env. Legal/Reg/COP or other requirement</label>
                        <input type="text" class="form-control" id="rqm" placeholder="Enter requirement" name="rqm" 
                        value="{{ $aspects->requirement_name }}" required>
                        @error('aspect')
                            <div class="form-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <br>

                        <button type="submit" class="float-right btn btn-dark btn-primary">Save</button>
                        <a href="{{ route('list.edit',$aspects->work_id ) }}" class="btn float-right"> Back</a>
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