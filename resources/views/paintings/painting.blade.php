@extends('creativity')

@section('content')

<button onclick="history.go(-1)"><- Back</button><br><br>

<img src="../images/{{ $painting->path }}"/>
<br><br>

<table style='font-size: 130%;'>
  <tr>
    <td>Artist:</td><td>{{$painting->artist}}</td>
  </tr>
  <tr>
  	<td>Title:</td><td>{{$painting->title}}</td>
  </tr>
  <tr>
  	<td>Notes:&nbsp;</td><td>{{$painting->notes}}</td>
  </tr>    
</table>
<br>

<button onclick="location.href='{{$painting->id}}/edit'">Edit</button>

@endsection