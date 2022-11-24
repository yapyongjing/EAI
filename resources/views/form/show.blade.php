@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
   
    <div>
        <h1>
            {{$form['name']}}
            
        </h1>
        <ul>
            <li>
                Made by: {{$form['location']}}
            </li>
            <li>
                Year made: {{$form['date']}}
            </li>
        </ul>
    </div>

        

</div>
@endsection