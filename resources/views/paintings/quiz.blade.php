@extends('creativity')

@section('content')

<h3>Who was the artist of this piece?</h3>
<br>
<img src="../images/{{ $painting->path }}"/>
<br><br>

<input type='radio' onclick='check(a)'><span id='a' style='padding-left:10px'>{{ $choices[0] }}</span><br>
<input type='radio' onclick='check(b)'><span id='b' style='padding-left:10px'>{{ $choices[1] }}</span><br>
<input type='radio' onclick='check(c)'><span id='c' style='padding-left:10px'>{{ $choices[2] }}</span><br>
<input type='radio' onclick='check(d)'><span id='d' style='padding-left:10px'>{{ $choices[3] }}</span><br>

<br>
<button onclick="location.reload()">Next Question</button>

<script>
function check(ans){
	var answer = '{{$painting->artist}}';
	if(ans.innerHTML == answer){
		ans.style.color = 'green';
		ans.style.fontSize = '20px';
	}
	else{
		ans.style.color = 'red';
		if(document.getElementById('a').innerHTML == answer){
			document.getElementById('a').style.color = 'green';
			document.getElementById('a').style.fontSize = '20px';
		}
		else if(document.getElementById('b').innerHTML == answer){
			document.getElementById('b').style.color = 'green';
			document.getElementById('b').style.fontSize = '20px';
		}
		else if(document.getElementById('c').innerHTML == answer){
			document.getElementById('c').style.color = 'green';
			document.getElementById('c').style.fontSize = '20px';
		}
		else{
			document.getElementById('d').style.color = 'green';
			document.getElementById('d').style.fontSize = '20px';
		}
	}
}


</script>

@endsection