@extends('layouts.app')

@section('content')

<div class="container" style="margin-top:30px">
    <div class="row">
        
        <div class="text-left col-4 mt-4 p-5 rounded" style="margin-bottom:0">
            <h1>Importance</h1> 
            <p>Key in the Ratings</p> 
        </div>

        <div class="col-8">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">

                    <h4>2. Importance/Kepentingan</h4>
                    <br>
                    <form name="form1" method="POST" action="{{ route('oprForm.work.aspectImpact.importantRating.update', 
                    ['id' => $workform->opr_form_id,'work_id' => $workform->id, 'ai_id' => $aspectform->id] ) }}">
                        
                        @csrf
                        @method('PUT')
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thread-dark">
                                    <tr>
                                        <th>Risk Assessment</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Frequency (F)</td>
                                        <td>
                                            <div class="form-group">
                                                <div class="form-check-inline">
                                                    
                                                    <input type="radio" class="option1" name="option1" value="1" onchange="calculateTotal()" {{ $rating->option1 == '1' ? 'checked' : '' }} required> 
                                                    1
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="radio" class="option1" name="option1" value="2" onchange="calculateTotal()" {{ $rating->option1 == '2' ? 'checked' : '' }} required>
                                                    2
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="radio" class="option1" name="option1" value="3" onchange="calculateTotal()" {{ $rating->option1 == '3' ? 'checked' : '' }} required> 
                                                    3
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="radio" class="option1" name="option1" value="4" onchange="calculateTotal()" {{ $rating->option1 == '4' ? 'checked' : '' }} required> 
                                                    4
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="radio" class="option1" name="option1" value="5" onchange="calculateTotal()" {{ $rating->option1 == '5' ? 'checked' : '' }} required> 
                                                    5
                                                </div>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Severity (S)</td>
                                        <td>
                                            <div class="form-group">
                                                <div class="form-check-inline">
                                                    
                                                    <input type="radio" class="option2" name="option2" value="1" onchange="calculateTotal()" {{ $rating->option2 == '1' ? 'checked' : '' }} required> 
                                                    1
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="radio" class="option2" name="option2" value="2" onchange="calculateTotal()" {{ $rating->option2 == '2' ? 'checked' : '' }} required>
                                                    2
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="radio" class="option2" name="option2" value="3" onchange="calculateTotal()" {{ $rating->option2 == '3' ? 'checked' : '' }} required> 
                                                    3
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="radio" class="option2" name="option2" value="4" onchange="calculateTotal()" {{ $rating->option2 == '4' ? 'checked' : '' }} required> 
                                                    4
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="radio" class="option2" name="option2" value="5" onchange="calculateTotal()" {{ $rating->option2 == '5' ? 'checked' : '' }} required> 
                                                    5
                                                </div>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Regulatory (R)</td>
                                        <td>
                                            <div class="form-group">
                                                <div class="form-check-inline">
                                                    <input type="radio" class="option3" name="option3" value="1" onchange="calculateTotal()" {{ $rating->option3 == '1' ? 'checked' : '' }} required> 
                                                    1
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="radio" class="option3" name="option3" value="2" onchange="calculateTotal()" {{ $rating->option3 == '2' ? 'checked' : '' }} required>
                                                    2
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="radio" class="option3" name="option3" value="3" onchange="calculateTotal()" {{ $rating->option3 == '3' ? 'checked' : '' }} required> 
                                                    3
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="radio" class="option3" name="option3" value="4" onchange="calculateTotal()" {{ $rating->option3 == '4' ? 'checked' : '' }} required> 
                                                    4
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="radio" class="option3" name="option3" value="5" onchange="calculateTotal()" {{ $rating->option3 == '5' ? 'checked' : '' }} required> 
                                                    5
                                                </div>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Control  (C)</td>
                                        <td>
                                            <div class="form-group">
                                                <div class="form-check-inline">
                                                    
                                                    <input type="radio" class="option4" name="option4" value="1" onchange="calculateTotal()" {{ $rating->option4 == '1' ? 'checked' : '' }} required> 
                                                    1
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="radio" class="option4" name="option4" value="2" onchange="calculateTotal()" {{ $rating->option4 == '2' ? 'checked' : '' }} required>
                                                    2
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="radio" class="option4" name="option4" value="3" onchange="calculateTotal()" {{ $rating->option4 == '3' ? 'checked' : '' }} required> 
                                                    3
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="radio" class="option4" name="option4" value="4" onchange="calculateTotal()" {{ $rating->option4 == '4' ? 'checked' : '' }} required> 
                                                    4
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="radio" class="option4" name="option4" value="5" onchange="calculateTotal()" {{ $rating->option4 == '5' ? 'checked' : '' }} required> 
                                                    5
                                                </div>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>LikelihooD (L)</td>
                                        <td>
                                            <div class="form-group">
                                                <div class="form-check-inline">
                                                    
                                                    <input type="radio" class="option5" name="option5" value="1" onchange="calculateTotal()" {{ $rating->option5 == '1' ? 'checked' : '' }} required> 
                                                    1
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="radio" class="option5" name="option5" value="2" onchange="calculateTotal()" {{ $rating->option5 == '2' ? 'checked' : '' }} required>
                                                    2
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="radio" class="option5" name="option5" value="3" onchange="calculateTotal()" {{ $rating->option5 == '3' ? 'checked' : '' }} required> 
                                                    3
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="radio" class="option5" name="option5" value="4" onchange="calculateTotal()" {{ $rating->option5 == '4' ? 'checked' : '' }} required> 
                                                    4
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="radio" class="option5" name="option5" value="5" onchange="calculateTotal()" {{ $rating->option5 == '5' ? 'checked' : '' }} required> 
                                                    5
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="form-check-inline" style="font-size:0.7vw; color:Tomato;">*AR &lt;11, Not significant</p>
                                            <p class="form-check-inline" style="font-size:0.7vw; color:Tomato;">*AR =&gt;11, Significant</p>
                                            <p class="form-check-inline" style="font-size:0.7vw; color:Tomato;">*AR &lt;11 and R&gt;1, Significant</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="form-check-inline" >Accumalated Ratings (AR): </p>
                                            <div class="form-check-inline" id=msg></div>
                                            <div name = "msg2" id = "msg2"></div>
                                            <input type="hidden" name="result" id="result">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit" class="float-right btn btn-dark btn-primary">Save & Submit</button>
                            <a href="{{ route('oprForm.work.aspectImpact.index', [$workform->opr_form_id,$workform->id]) }}" class="btn"> Back</a>
                        </div> 
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
<script> 
   function calculateTotal(){

       // check if page is reloaded or submitted
       if (performance.navigation.type === 1 || performance.navigation.type === 0) { 
        localStorage.removeItem("total");
        total = 0;
        }

        var total = parseInt(localStorage.getItem("total")) || 0;
        var optionClasses = ["option1", "option2", "option3", "option4", "option5"];
        var option3Selected = false;

        for (var i = 0; i < optionClasses.length; i++) {
            var options = document.querySelectorAll("." + optionClasses[i]);
            
            for (var j = 0; j < options.length; j++) {
            if (options[j].checked) {
                total += parseInt(options[j].value);
                
                // check if Regulatory is selected
                if (optionClasses[i] === "option3") {
                option3Selected = true;
                }
            }
            }
        }

        localStorage.setItem("total", total);
        
        document.getElementById("msg").innerHTML = total;
        
        // check if total is greater than or equal to 11 and either Regulatory is selected
            if (total >= 11 || (option3Selected && document.querySelectorAll("input[type='radio']:checked").length > 0)) {
                document.getElementById("msg2").innerHTML = "Significant Risk";
                document.getElementById("result").value = document.getElementById("msg2").innerHTML;
            } else {
                document.getElementById("msg2").innerHTML = "Not Significant Risk";
                document.getElementById("result").value = document.getElementById("msg2").innerHTML;
            }
    }

</script>
@endsection