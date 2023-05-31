@extends('layouts.app')

@section('content')

<div class="container" style="margin-top:30px">
    <div class="row">
        
        <div class="text-left col-4 mt-4 p-5 rounded" style="margin-bottom:0">
            <h1>Risk Control</h1> 
            <p>Edit risk control</p> 
        </div>

        <div class="col-8">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">

                    <h4>3. Risk Control/Mitigation Measures </h4>
                    <br>
                    <form method="POST" action="{{ route('oprForm.work.aspectImpact.riskControl.update', 
                    // ['id' => $workform->opr_form_id,'work_id' => $workform->id, 'ai_id' => $aspectform->id,'risk_id' => $risk_id]
                    ['id' => $id,'work_id' => $work_id, 'ai_id' => $ai_id,'risk_id' => $risk_id]) }}">
                        
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="ECM">Exisitng Control Measures</label>
                            <input type="text" class="form-control" id="ECM" placeholder="Enter Exisitng Control Measures" name="ECM" 
                            value="{{ $risk->exisitng_control_measures }}" required>
                            @error('ECM')
                            <div class="form-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="risk">Action Plan(Risk Control/Mitigation Measures)</label>
                            <input type="text" class="form-control" id="risk" placeholder="Enter risk control/mitigation measures" name="risk" 
                            value="{{ $risk->action_plan }}" required>
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
                                <option value="0"> Select Person In Charge</option>
                                
                                @foreach($pics as $pic)
                                <option value="{{$pic->person_in_charge_name}}"
                                    {{$pic->person_in_charge_name == $risk->person_in_charge ? ' selected="selected"' : '' }}>
                                    {{$pic->person_in_charge_name}}
                                </option>
                                @endforeach

                            </select>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="time">Time Frame</label>
                            <input type="text" class="form-control" id="time" placeholder="Enter time frame" name="time" 
                            value="{{ $risk->time_frame }}" required>
                            @error('time')
                            <div class="form-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" id="status" placeholder="Enter Exisitng Control Measures" name="status" 
                            value="{{ $risk->status }}" required>
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