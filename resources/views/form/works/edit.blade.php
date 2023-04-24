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

                    <form method="POST" action="{{ route('oprForm.work.update', [ 'id' => $opr->id, 'work_id' => $workform->id ]) }}">
                        
                        @csrf
                        @method('PUT')


                        <div class="form-group">
                            <label for="fkey">Location Name</label>
                            <select class="form-control" id="fkey" name="fkey">
                                <option value="0"> Select Location</option>
                                
                                // option = mainwork, opr = oprform
                                @foreach($options as $option)
                                <option value="{{$opr->id}}" 
                                    {{ $option->location_name == $opr->location_name ? 'selected="selected"' : 'disabled' }}>
                                    {{$option->location_name}}</option>
                                @endforeach

                            </select>
                        </div><br>

                        <div class="form-group">
                          <label for="work_name">Name of work activity</label>
                          <select class="form-control" id="work_name" name="work_name">
                                <option value="0"> Select Work Activity</option>
                                
                                @foreach($works as $work)
                                    <option value="{{$work->work_name}}" 
                                        {{$work->work_name == $workform->work_name ? ' selected="selected"' : '' }}>
                                        {{$work->work_name}}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <br>
                        
                        <div class="form-group">
                            <label for="con">Condition</label><br>
                            <div class="form-check-inline">
                                <input type="radio" class="form-check-input" name="con" value="Normal Condition" {{ $workform->condition == 'Normal Condition' ? 'checked' : '' }}>
                                Normal Condition 
                                <label class="form-check-label" for="Air_Pollution"></label>
                            </div>
                            <div class="form-check-inline">
                                <input type="radio" class="form-check-input" name="con" value="Abnormal Condition" {{ $workform->condition == 'Abnormal Condition' ? 'checked' : '' }}>
                                Abnormal Condition form
                                <label class="form-check-label" for="Water_Pollution"></label>
                            </div>
                            <div class="form-check-inline">
                                <input type="radio" class="form-check-input" name="con" value="Emergency" {{ $workform->condition == 'Emergency' ? 'checked' : '' }}>
                                Emergency 
                                <label class="form-check-label" for="Soil/Land pollution"></label>
                            </div>
                        </div>
                        <br>

                        <button type="submit" class="float-right btn btn-dark btn-primary">Edit</button>
                        <a href="{{ route('oprForm.work.index',$opr->id) }}" class="btn float-right"> Back</a>
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