@extends('layouts.app')

@section('content')

<div class="container" style="margin-top:30px">
    <div class="row">
        
        <div class="text-left col-4 mt-4 p-5 rounded" style="margin-bottom:0">
            <h1>Operating Unit</h1> 
            <p>Key in new operating unit</p> 
        </div>

        <div class="col-8">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">

                    <form method="POST" action="{{route('opr.store')}}">
                        
                        @csrf

                        <div class="form-group">
                          <label for="opr_name">Name of operating unit</label>
                          <input type="text" class="form-control " id="opr_name" placeholder="Enter operating unit name" name="opr_name" value="{{ old('opr_name') }}" required>
                          @error('opr_name')
                            <div class="form-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <br>
                        <button type="submit" class="float-right btn btn-dark btn-primary">Submit</button>
                        <a href="{{ route('opr.index') }}" class="btn float-right"> Back</a>
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