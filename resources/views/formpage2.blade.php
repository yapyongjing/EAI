@extends('layouts.app')

@section('content')

<div class="container" style="margin-top:30px">
    <div class="row">
        
        <div class="text-left col-4 mt-4 p-5 rounded" style="margin-bottom:0">
            <h1>Assessment Form</h1> 
            <p>Key in the Ratings</p> 
        </div>

        <div class="col-8">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">

                    <h4>2. Importance/Kepentingan</h4>
                    <br>
                    <form name="form1" method="POST" action="">
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
                                                    
                                                    <input type="checkbox" class="form-check-input" name="ckb" value="1" onclick="chkcontrol(1)";> 
                                                    1
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="checkbox" class="form-check-input" name="ckb" value="2" onclick="chkcontrol(2)";>
                                                    2
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="checkbox" class="form-check-input" name="ckb" value="3" onclick="chkcontrol(3)";> 
                                                    3
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="checkbox" class="form-check-input" name="ckb" value="4" onclick="chkcontrol(4)";> 
                                                    4
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="checkbox" class="form-check-input" name="ckb" value="5" onclick="chkcontrol(5)";> 
                                                    5
                                                </div>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Severity (S)</td>
                                        <td>
                                            <div class="form-group">
                                                <div class="form-check-inline">
                                                    
                                                    <input type="checkbox" class="form-check-input" name="ckb" value="1" onclick="chkcontrol(1)";> 
                                                    1
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="checkbox" class="form-check-input" name="ckb" value="2" onclick="chkcontrol(2)";>
                                                    2
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="checkbox" class="form-check-input" name="ckb" value="3" onclick="chkcontrol(3)";> 
                                                    3
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="checkbox" class="form-check-input" name="ckb" value="4" onclick="chkcontrol(4)";> 
                                                    4
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="checkbox" class="form-check-input" name="ckb" value="5" onclick="chkcontrol(5)";> 
                                                    5
                                                </div>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Regulatory (R)</td>
                                        <td>
                                            <div class="form-group">
                                                <div class="form-check-inline">
                                                    <input type="checkbox" class="form-check-input" name="ckb" value="1" onclick="chkcontrol(1)";> 
                                                    1
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="checkbox" class="form-check-input" name="ckb" value="2" onclick="chkcontrol(2)";>
                                                    2
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="checkbox" class="form-check-input" name="ckb" value="3" onclick="chkcontrol(3)";> 
                                                    3
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="checkbox" class="form-check-input" name="ckb" value="4" onclick="chkcontrol(4)";> 
                                                    4
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="checkbox" class="form-check-input" name="ckb" value="5" onclick="chkcontrol(5)";> 
                                                    5
                                                </div>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Control  (C)</td>
                                        <td>
                                            <div class="form-group">
                                                <div class="form-check-inline">
                                                    
                                                    <input type="checkbox" class="form-check-input" name="ckb" value="1" onclick="chkcontrol(1)";> 
                                                    1
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="checkbox" class="form-check-input" name="ckb" value="2" onclick="chkcontrol(2)";>
                                                    2
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="checkbox" class="form-check-input" name="ckb" value="3" onclick="chkcontrol(3)";> 
                                                    3
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="checkbox" class="form-check-input" name="ckb" value="4" onclick="chkcontrol(4)";> 
                                                    4
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="checkbox" class="form-check-input" name="ckb" value="5" onclick="chkcontrol(5)";> 
                                                    5
                                                </div>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>LikelihooD (L)</td>
                                        <td>
                                            <div class="form-group">
                                                <div class="form-check-inline">
                                                    
                                                    <input type="checkbox" class="form-check-input" name="ckb" value="1" onclick="chkcontrol(1)";> 
                                                    1
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="checkbox" class="form-check-input" name="ckb" value="2" onclick="chkcontrol(2)";>
                                                    2
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="checkbox" class="form-check-input" name="ckb" value="3" onclick="chkcontrol(3)";> 
                                                    3
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="checkbox" class="form-check-input" name="ckb" value="4" onclick="chkcontrol(4)";> 
                                                    4
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="checkbox" class="form-check-input" name="ckb" value="5" onclick="chkcontrol(5)";> 
                                                    5
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Accumalated Ratings (AR)</p>
                                            <p style="font-size:0.7vw; color:Tomato;">*AR &lt;11, Not significant</p>
                                            <p style="font-size:0.7vw; color:Tomato;">*AR =&gt;11, Significant</p>
                                            <p style="font-size:0.7vw; color:Tomato;">*AR &lt;11 and R&gt;1, Significant</p>
                                        </td>
                                        <td>
                                            <div id=msg></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> 
                    </form>
                </div>
                <div class="card-footer">
                    <div id = msg2></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script> 
    function chkcontrol(j) {
        var sum=0;
        for(var i=0; i < document.form1.ckb.length; i++){
        
            if(document.form1.ckb[i].checked){
                sum = sum + parseInt(document.form1.ckb[i].value);

                if(sum == 0){
                    document.getElementById("msg").innerHTML="0";
                }else if(sum >10){
                    document.getElementById("msg").innerHTML=" "+ sum;
                    document.getElementById("msg2").innerHTML= "Significant Risk";
                }else{
                    document.getElementById("msg").innerHTML= " "+sum;
                    document.getElementById("msg2").innerHTML= "Not Significant Risk";
                }
            }
            
        }
    }
    </script>
@endsection