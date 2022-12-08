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
                            <label for="fkey">Location Name</label>
                            <select class="form-control" id="fkey" name="fkey">
                                <option value="0"> Select Location</option>
                                
                                @foreach($options as $option)
                                    <option value="{{$option->id}}">{{$option->location_name}}</option>
                                @endforeach

                            </select>
                        </div><br>

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
                        
                        <div class="form-check">
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