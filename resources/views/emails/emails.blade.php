@extends('app')

@section('content')

<h2>Email History</h2>

@foreach ($emails as $email)
	<h3><a href="{{url('/emails', $email->id)}}">Subject: {{$email->subject}}</a> </h3>
	To: {{$email->to}} <br>
	From: {{$email->from}}
	<br>
@endforeach

@endsection
