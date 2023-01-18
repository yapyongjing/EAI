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

                    <form method="POST" action="{{ url('list/' .$work->id) }}">
                        
                        @csrf
                        @method('PUT')

                        {{-- main work/location dropdown --}}
                        <div class="form-group">
                            <label for="fkey">Location Name</label>
                            <select class="form-control" id="fkey" name="fkey">
                                
                                @foreach($options as $option)
                                    <option value="{{$option->id}}" {{  $option->id== $work->mainWork_id ? ' selected="selected"' : '' }}>
                                        {{$option->location_name}}</option>
                                @endforeach

                            </select>
                        </div><br>

                        {{-- work name textfield --}}
                        <div class="form-group">
                          <label for="work_name">Name of work activity</label>
                          <input type="text" class="form-control " id="work_name" placeholder="Enter work name" name="work_name" 
                          value="{{ $work->work_name }}" required>
                          @error('work_name')
                            <div class="form-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <br>
                        
                        {{-- condition radio button --}}
                        <div class="form-group">
                            <label for="con">Condition</label><br>
                            <div class="form-check-inline">
                                <input type="radio" class="form-check-input" name="con" value="Normal Condition"  {{ $work->condition == 'Normal Condition' ? 'checked' : '' }}>
                                Normal Condition 
                                <label class="form-check-label" for="Air_Pollution"></label>
                            </div>
                            <div class="form-check-inline">
                                <input type="radio" class="form-check-input" name="con" value="Abnormal Condition" {{ $work->condition == 'Abnormal Condition' ? 'checked' : '' }}>
                                Abnormal Condition 
                                <label class="form-check-label" for="Water_Pollution"></label>
                            </div>
                            <div class="form-check-inline">
                                <input type="radio" class="form-check-input" name="con" value="Emergency" {{ $work->condition == 'Emergency' ? 'checked' : '' }}>
                                Emergency 
                                <label class="form-check-label" for="Soil/Land pollution"></label>
                            </div>
                        </div>
                        <br>

                        <button type="submit" class="float-right btn btn-dark btn-primary">Next</button>
                        <a href="{{ route('list.index') }}" class="btn float-right"> Back</a>
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