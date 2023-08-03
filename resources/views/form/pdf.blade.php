@<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <style>
        .border-bottom{
            border-bottom:1px solid #ccc!important
        }
        .logo-container {
           position: relative;
           display: flex;
           align-items: center;
        }

        .logo {
           width: 3%;
           height: auto;
        }

        .logo-title {
           margin-left: 40px; 
           font-size: 30px; 
           font-weight: bold; 
        }
        .small-column {
            width: 10%;
        }
        th.title {
            font-size: 20px; 
            font-weight: bold; 
        } 
        table, th, tr,td {
            border: 1px solid;
            outline: thin solid;
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
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                        
                        <tr>
                            <td class="small-column">Operating unit:</td>
                            <td>{{$form->operating_name}}</td>
                            <td class="small-column">Prepared By:</td>
                            <td>{{$form->prepared_by}}</td>
                        </tr>
                        <tr>
                            <td>Location:</td>
                            <td>{{$form->location_name}}</td>
                            <td>Checked By:</td>
                            <td>{{$form->checked_by}}</td>
                        </tr>
                        <tr>
                            <td>Date:</td>
                            <td>{{$form->date}}</td>
                            <td>Approved By:</td>
                            <td>{{$form->approved_by}}</td>
                        </tr>
                        
                        </table>
                    </div>
                    

                    <div class="border-bottom"></div>
                    <br>

                    {{-- WorkForm and aspect impact --}}
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th colspan="6" class="title">1. Identification of Aspects and Impacts</th>
                                <th colspan="7" class="title">2. Importance</th>
                                <th colspan="5" class="title">3. Risk Control/ Mitigation Measures</th>
                            </tr>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Work Name</th>
                                <th rowspan="2">Condition</th>
                                <th rowspan="2">Aspect</th>
                                <th rowspan="2">Impact</th>
                                <th rowspan="2">Requirement</th>
                                <th colspan="7">Risk Assessment</th>
                                <th rowspan="2">Existing Control Measures</th>
                                <th rowspan="2">Action Plan</th>
                                <th rowspan="2">Person In Charge</th>
                                <th rowspan="2">Time Frame</th>
                                <th rowspan="2">Status</th>
                            </tr>
                            <tr>
                                <th>F</th>
                                <th>S</th>
                                <th>R</th>
                                <th>C</th>
                                <th>L</th>
                                <th>AR</th>
                                <th>Result</th>
                            </tr>
                            @foreach ($form->works as $index => $work)
                                <tr>
                                    {{--work activity--}}
                                    <td rowspan="{{ count($work->aspects) }}">{{ $index + 1 }}</td>
                                    <td rowspan="{{ count($work->aspects) }}">{{ $work->work_name }}</td>
                                    <td rowspan="{{ count($work->aspects) }}">{{ $work->condition }}</td>
                                    {{-- aspect impact --}}
                                    @foreach ($work->aspects as $aspectIndex => $aspect)
                                        @if ($aspectIndex > 0)
                                            </tr><tr>
                                        @endif
                                        <td>{{ $aspect->aspect_name }}</td>
                                        <td>{{ $aspect->impact_name }}</td>
                                        <td>{{ $aspect->requirement_name }}</td>
                                        {{--rating and risk control --}}
                                         @foreach ($aspect->ratings as $ratings)
                                         @php
                                            $total = $ratings->option1 + $ratings->option2 + $ratings->option3 + $ratings->option4 + $ratings->option5;
                                        @endphp
                                                <td>{{ $ratings->option1}}</td>
                                                <td>{{ $ratings->option2}}</td>
                                                <td>{{ $ratings->option3}}</td>
                                                <td>{{ $ratings->option4}}</td>
                                                <td>{{ $ratings->option5}}</td>
                                                <td>{{ $total}}</td>
                                                <td>{{ $ratings->risk}}</td>
                                        @endforeach
                                        @foreach ($aspect->risks as $risk)
                                                <td>{{ $risk->existing_control_measures}}</td>
                                                <td>{{ $risk->action_plan}}</td>
                                                <td>{{ $risk->person_in_charge}}</td>
                                                <td>{{ $risk->time_frame}}</td>
                                                <td>{{ $risk->status}}</td>
                                        @endforeach
                                    @endforeach
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>


