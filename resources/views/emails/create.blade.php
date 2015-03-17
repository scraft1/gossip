@extends('app')

@section('content')

<h1>Compose Email</h1>

{!! Form::open(['url' => 'emails']) !!}

	@include('emails.form', ['submitButtonText' => 'Send Email']);

{!! Form::close() !!}

@include('errors.list');

@endsection