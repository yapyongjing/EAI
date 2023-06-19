@extends('layouts.app')

@section('content')

<div class="container" style="margin-top:30px">
    <div class="row">
        
        <div class="text-left col-4 mt-4 p-5 rounded" style="margin-bottom:0">
            <h1>Risk Control</h1> 
            <p>Key in risk control</p> 
        </div>

        <div class="col-8">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">

                    <h4>3. Risk Control/Mitigation Measures </h4>
                    <br>
                    <form method="POST" action="{{ route('oprForm.work.aspectImpact.riskControl.store', 
                    ['id' => $id,'work_id' => $work_id, 'ai_id' => $ai_id] ) }}">
                        
                        @csrf

                        <div class="form-group">
                            <label for="ECM">Existing Control Measures</label>
                            <input type="text" class="form-control" id="ECM" placeholder="Enter Exisitng Control Measures" name="ECM" required>
                            @error('ECM')
                            <div class="form-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="risk">Action Plan(Risk Control/Mitigation Measures)</label>
                            <input type="text" class="form-control" id="risk" placeholder="Enter risk control/mitigation measures" name="risk" required>
                            @error('risk')
                            <div class="form-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="pic">Person In Charge</label>
                            <select class="form-control" name="pic">
                                <option value="" disabled selected> Select Person In Charge</option>

                                @foreach($users as $user)
                                    <option value="{{ $user->name}}">{{ $user->name }}</option>
                                @endforeach
                                {{-- @foreach($pics as $pic)
                                    <option value="{{ $pic->person_in_charge_name}}">{{ $pic->person_in_charge_name }}</option>
                                @endforeach --}}

                            </select>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="time">Time Frame</label>
                            <input type="text" class="form-control" id="time" placeholder="Enter time frame" name="time" required>
                            @error('time')
                            <div class="form-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" id="status" placeholder="Enter Exisitng Control Measures" name="status" required>
                            @error('status')
                            <div class="form-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <br>

                        <button type="submit" class="float-right btn btn-dark btn-primary">Save</button>
                        <a href="{{ route('oprForm.work.aspectImpact.index', [$id,$work_id]) }}" class="btn float-right"> Back</a>
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