@extends('app')

@section('content')

<h1>Day {{$day}}</h1>

@foreach ($tasks as $task)
	<h2> {{$task->name}}</h2>
	Due: {{$task->due_date}}<br>
	
@endforeach

@endsection
