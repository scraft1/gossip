@extends('creativity')

@section('content')

<button onclick="history.go(-1)"><- Back</button><br><br>

<img src="../../images/{{ $painting->path }}"/><br><br>

{!! Form::model($painting, ['method' => 'PATCH', 'action' => ['PaintingsController@update', $painting->id]]) !!}

	@include('paintings.form', ['submitButtonText' => 'Edit'])

{!! Form::close() !!}

@include('errors.list')

@endsection