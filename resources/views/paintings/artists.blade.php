@extends('creativity')

@section('content')

@foreach ($artists as $artist)
	<a href="{{url('/paintings/artists', $artist)}}">{{$artist}}</a><br><br>
	
@endforeach

@endsection