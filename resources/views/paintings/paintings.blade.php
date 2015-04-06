@extends('creativity')

@section('content')

@foreach ($paintings as $painting)
	<a href="{{url('/paintings', $painting->id)}}"><img src="images/{{ $painting->path }}"/></a><br><br>
	
@endforeach

@endsection