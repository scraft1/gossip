@extends('app')

@section('content')

<h1>Schedule</h1>
<ul>
@for ($x = 1; $x <= 6; $x++)
	<li><a href="{{url('/days', 1)}}">Day {{$x}}</a><br></li>
@endfor
</ul>
@endsection
