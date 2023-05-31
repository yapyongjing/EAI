@<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <style>
        .logo-container {
           position: relative;
           display: flex;
           align-items: center;
        }

        .logo {
           width: 10%;
           height: auto;
        }

        .logo-title {
           margin-left: 40px; 
           font-size: 30px; 
           font-weight: bold; 
        }
        .border-bottom{
            border-bottom:1px solid #ccc!important
        }
        
        
     </style>
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar">
            <div class="logo-container">
                <img src="{{ $logoUrl }}" alt="Logo" class="logo">
                <span class="logo-title">Environmental Aspect Impact Form</span>
             </div>
        </nav>

        <main class="py-4">
            <div class="container-fluid">
                {{-- OperatingForm and MainWorkForm --}}
                    <div class="container">
                        <div class="table-responsive">
                            <table class="table">
                            
                            <tr>
                                <td>Operating unit:</td>
                                <td>{{$form->workForm->oprForm->operating_name}}</td>
                            </tr>
                            <tr>
                                <td>Location:</td>
                                <td>{{$form->workForm->oprForm->location_name}}</td>
                            </tr>
                            <tr>
                                <td>Date:</td>
                                <td>{{$form->workForm->oprForm->date}}</td>
                            </tr>
                            
                            </table>
                        </div>
                    </div>

                    <div class="border-bottom"></div>
                    <br>

                    {{-- WorkForm and aspect impact --}}
                    <p>1. Identification of Aspects and Impacts </p>
                    <div class="container">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                   <td>Work Name:</td>
                                   <td>{{ $form->workForm->work_name }}</td>
                                </tr>
                                <tr>
                                    <td>Condition:</td>
                                    <td>{{ $form->workForm->condition }}</td>
                                 </tr>
                                 <tr>
                                    <td>Aspect:</td>
                                    <td>{{ $form->aspect_name }}</td>
                                 </tr>
                                 <tr>
                                    <td>Impact:</td>
                                    <td>{{ $form->impact_name }}</td>
                                 </tr>
                                 <tr>
                                    <td>Requirement:</td>
                                    <td>{{ $form->requirement_name }}</td>
                                 </tr>
                            </table>
                        </div>
                    </div>

                    <div class="border-bottom"></div>
                    <br>

                    {{-- Importancce/Rating --}}
                    <p>2. Importance </p>
                    @foreach ($form->ratings as $rating)
                    <div class="container">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                   <td>Frequency(F):</td>
                                   <td>{{ $rating->option1 }}</td>
                                </tr>
                                <tr>
                                    <td>Severity(S):</td>
                                    <td>{{ $rating->option2 }}</td>
                                 </tr>
                                 <tr>
                                    <td>Regulatory(R):</td>
                                    <td>{{ $rating->option3 }}</td>
                                 </tr>
                                 <tr>
                                    <td>Controllability(C):</td>
                                    <td>{{ $rating->option4 }}</td>
                                 </tr>
                                 <tr>
                                    <td>Likelihood(L):</td>
                                    <td>{{ $rating->option5 }}</td>
                                 </tr>
                                 <tr>
                                    <td>Accumulated Ratings (AR):</td>
                                    <td>{{ $rating->risk }}</td>
                                 </tr>
                            </table>
                        </div>
                    </div>
                    @endforeach

                    <div class="border-bottom"></div>
                    <br>

                    {{-- Risk Control/Mitigation Measures  --}}
                    <p>3. Risk Control/Mitigation Measures  </p>
                    @foreach ($form->risks as $risk)
                    <div class="container">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                   <td>Existing Control Measures:</td>
                                   <td>{{ $risk->exisitng_control_measures }}</td>
                                </tr>
                                <tr>
                                    <td>Action Plan:</td>
                                    <td>{{ $risk->action_plan }}</td>
                                 </tr>
                                 <tr>
                                    <td>Person In Charge:</td>
                                    <td>{{ $risk->person_in_charge }}</td>
                                 </tr>
                                 <tr>
                                    <td>Time Frame:</td>
                                    <td>{{ $risk->time_frame }}</td>
                                 </tr>
                                 <tr>
                                    <td>Status:</td>
                                    <td>{{ $risk->status }}</td>
                                 </tr>
                            </table>
                        </div>
                    </div>
                    @endforeach

                    <div class="border-bottom"></div>
                    <br>

                </div>
            </div>
        </main>
    </div>
</body>
</html>


