<html>

<body>

<h1>test</h1>
<div id='test'></div>
Messages sent this session: <span id="insertHere">0</span>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">

(function sending(){
   setTimeout(function(){
       $.ajax({
           type: "POST",
           url: 'send',
           success: function( response ){
               // do something with the response
              var el = document.getElementById('insertHere');
              var c = parseInt(el.innerHTML) + 1;
              el.innerHTML = c;
              
               sending(); 
           },
           error: function(){
               // do some error handling.  you
               // adjust the timeout ?? 

               sending(); 
           }
       });
   }, 5000); // 5 seconds
})();

</script>

</body>

</html>
