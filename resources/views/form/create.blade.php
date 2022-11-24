@extends('layouts.app')

@section('content')

<div class="container" style="margin-top:30px">
    <div class="row">
        
        <div class="text-left col-4 mt-4 p-5 rounded" style="margin-bottom:0">
            <h1>Assessment</h1> 
            <p>Key in the Ratings</p> 
        </div>

        <div class="col-8">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">

                    <form method="POST" action="{{route('form.store')}}">
                        
                        @csrf

                        {{-- <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control " id="name" placeholder="Enter operating unit name" name="name" value="{{ old('name') }}" required>
                          @error('name')
                            <div class="form-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div><br> --}}

                        <div class="form-group">
                            <label for="name">Operating Unit Name</label>
                            <select class="form-control" name="name">
                                <option value="0"> Select Operating Unit</option>
                                
                                @foreach($form as $forms)
                                    <option value="{{ $forms->opr_unit_name}}">{{ $forms->opr_unit_name }}</option></option>
                                @endforeach

                            </select>
                        </div><br>
                        
                        <div class="form-group">
                          <label for="location">Location</label>
                          <input type="text" class="form-control" id="location" placeholder="Enter location" name="location" required>
                          @error('location')
                            <div class="form-error">
                                {{$message}}
                            </div>
                            @enderror
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
                        <button type="submit" class="float-right btn btn-dark btn-primary">Next</button>
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