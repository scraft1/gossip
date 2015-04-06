@extends('creativity')

@section('content')

<button onclick="history.go(-1)"><- Back</button>

<h2>{{$name}}</h2>
@foreach ($paintings as $painting)
	<h3><i>"{{$painting->title}}"</i></h3>
	<a href="{{url('/paintings', $painting->id)}}"><img src="../../images/{{ $painting->path }}"/></a><br><br>
	
@endforeach

@endsection