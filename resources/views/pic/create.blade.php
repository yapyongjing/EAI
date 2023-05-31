@extends('layouts.app')

@section('content')

<div class="container" style="margin-top:30px">
    <div class="row">
        
        <div class="text-left col-4 mt-4 p-5 rounded" style="margin-bottom:0">
            <h1>New User/Person In Charge</h1> 
            <p>Key in new User/Person In Charge</p> 
        </div>

        <div class="col-8">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">

                    <form method="POST" action="{{route('pic.store')}}">
                        
                        @csrf

                        <div class="form-group">
                          <label for="pic_name">Name of user/person in charge</label>
                          <input type="text" class="form-control " id="pic_name" placeholder="Enter name" name="pic_name" value="{{ old('pic_name') }}" required>
                          @error('pic_name')
                            <div class="form-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <br>
                        <button type="submit" class="float-right btn btn-dark btn-primary">Submit</button>
                        <a href="{{ route('pic.index') }}" class="btn float-right"> Back</a>
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