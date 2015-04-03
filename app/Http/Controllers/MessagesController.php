<?php namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Message;
use App\Peer;
use App\User;
use App\Counter;
use App\Sequence;
use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use App\Http\Controllers\Controller;

class MessagesController extends Controller {
	
	public function __construct(){ // needs double underlines
		$this->middleware('auth', ['only' => ['index', 'send']]); 
	}

	public function index(){	
		$messages = \Auth::user()->messages;

		return view('messages.messages', compact('messages'));
	}

	// post /messages
	// saving a user's message
	public function store(Request $request){ 
		$this->validate($request, ['body' => 'required']);
		$message = new Message($request->all()); 
		\Auth::user()->incrementSequence();

		$message->message_id = \Auth::user()->message_id;
		$message->originator = \Auth::user()->originator;
		$message->sequence = \Auth::user()->sequence;

		\Auth::user()->messages()->save($message);

		return redirect('messages');
	}

	public function receive(Request $request, $id){ 
		$user = User::findOrFail($id);

		if ($request->has('EndPoint')){
			$endpoint = $request->input('EndPoint'); 
			// add new peer if needed
		    $peer = Peer::where('user_id', $id)->where('url', $endpoint)->get()->first();
		    if($peer == NULL){
		    	$peer = new Peer();
		    	$peer->url = $endpoint;
		    	$user->peers()->save($peer);
		    }
		}
		if ($request->has('Rumor'))
		{
			// surround with try/catch in case of improper formatting ?? 
		    $rumorBody = $request->input('Rumor');
		    $contents = json_decode($rumorBody, true);
		    $str = $contents['MessageID'];
		    list($mid, $seq) = explode(':', $str);
		    $message = $user->messages->where('message_id', $mid)->last();
		    
		    // ignore sequences that are more than 1 above the most recent message
		    if(($message == NULL) || (($message->sequence + 1)  == $seq)){ 
		    	// store message
		    	$newMessage = new Message();
		    	$newMessage->message_id = $mid;
		    	$newMessage->sequence = $seq;
		    	$newMessage->originator = $contents['Originator'];
		    	$newMessage->body = $contents['Text'];
		    	$user->messages()->save($newMessage);

		    	$s = $user->sequences()->where('message_id', $mid)->get()->first();
		    	if($s == NULL){
		    		$s = new Sequence();
		    		$s->message_id = $mid;
		    	}
		    	$s->sequence = $seq;
		    	$user->sequences()->save($s);
		    	$user->refresh = true;
		    	$user->save();
		    }
		    // else ignore because we already have it
		}
		else if ($request->has('Want'))
		{
		    $wantList = $request->input('Want');
		    $contents = json_decode($wantList, true);	

		    foreach($contents as $key => $value) {
	            // echo $key." => ".$value."<br>"; 
	            
	            $count = Counter::where('peer_id', $peer->id)->where('message_id', $key)->get()->first();
	            // add counter if needed
	            if($count == NULL){
	            	$count = new Counter();
	            	$count->message_id = $key;
	            	$count->sequence = $value;
	            	$peer->counters()->save($count);
	            }
	            // update sequence if needed
	            else if($value > $count->sequence){
	            	$count->sequence = $value;
	            	$count->save();
	            }
	        } 	
		}
	}

	public function send(){
		$user = \Auth::user();  
		$peer = $user->getPeer(); 

		if($peer != NULL){
			$type = rand(0,1);

			if($type == 0){
				$peer->sendWant();
			}
			else{
				$peer->findRumor();
			}
		}
		if($user->refresh){
			$user->refresh = false;
			$user->save();
			return "refresh";
		}
	}
}




