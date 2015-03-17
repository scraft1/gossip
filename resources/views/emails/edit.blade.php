@extends('app')

@section('content')

<h1>Edit: {{$email->subject}}</h1>

{!! Form::model($email, ['method' => 'PATCH', 'action' => ['EmailController@update', $email->id]]) !!}

	@include('emails.form', ['submitButtonText' => 'Edit Email']);

{!! Form::close() !!}

@include('errors.list');

@endsection