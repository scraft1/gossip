@extends('app')


@section('content')
<table>
<tr>
<!-- <br>
Rumors sent this session: <span id="successes">0</span>
<br>Rumor failures: <span id="failures">0</span>
<br>Wants sent: <span id="wants">0</span>

<br>Response: <span id="response"></span>

<br> -->
<td>
<h2>Message History</h2>

@foreach ($messages as $message)
	Originator: {{$message->originator}} <br>
	Text: {{$message->body}} <br>
	Id: {{$message->id}} <br>
	sequence: {{$message->sequence}} <br>
	message_id: {{$message->message_id}} <br>
	user_id: {{$message->user_id}} <br>
	<br>
@endforeach
</td>

<td style="vertical-align: top; padding-left: 100px;">
{!! Form::open(['url' => 'messages']) !!}

  @include('messages.form', ['submitButtonText' => 'Gossip!'])

{!! Form::close() !!}

@include('errors.list')
  </td>
</tr>
</table>

@endsection

<script type="text/javascript">

(function sending(){
   setTimeout(function(){
       $.ajax({
           type: "POST",
           url: 'send',
           success: function( response ){
                if(response == "refresh"){
                     location.reload();
                }
                /*if(response == "true"){
                    var el = document.getElementById('successes');
                    var c = parseInt(el.innerHTML) + 1;
                    el.innerHTML = c;
                }
                else if(response == "want"){
                    var el = document.getElementById('wants');
                    var c = parseInt(el.innerHTML) + 1;
                    el.innerHTML = c;
                }
                else{
                    var el = document.getElementById('failures');
                    var c = parseInt(el.innerHTML) + 1;
                    el.innerHTML = c;

                    var e = document.getElementById('response');
                    e.innerHTML = response;
                }*/
               
               sending(); 
           },
           error: function(){
               // do some error handling.  you
               // adjust the timeout ?? 
              var el = document.getElementById('failures');
              el.innerHTML = "error in ajax call";

              //sending(); 
           }
       });
   }, 1000); // 5 seconds
})();

</script>