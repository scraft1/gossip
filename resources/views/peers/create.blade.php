@extends('app')

@section('content')

<h1>Add Peer</h1>

{!! Form::open(['url' => 'peers']) !!}

	<div class="form-group">
		{!! Form::label('url', 'URL:') !!}
		{!! Form::text('url', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
	</div>

{!! Form::close() !!}

@endsection