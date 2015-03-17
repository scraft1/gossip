@extends('app')

@section('content')

<h3>Subject: {{$email->subject}}</h3>
<h3>To: {{$email->to}}</h3>
<h3>From: {{$email->from}}</h3>
<h3>Body: </h3>
<p>{{$email->body}}</p>

@endsection