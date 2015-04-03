<?php namespace App;

use \App\Message;
use Illuminate\Database\Eloquent\Model;

class Peer extends Model {

	//
	protected $fillable = [
		'url'
	];

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function counters(){
		return $this->hasMany('App\Counter');
	}

	public function sendWant(){
		$user = $this->user;
	    $wantList = $user->sequences;
	    $want = [];
	    foreach($wantList as $item){
	    	$want[$item->message_id] = $item->sequence;
	    }

		$bodyData = array (
		  'Want' => json_encode($want),
		  'EndPoint' => $user->url
		);
		$bodyStr = http_build_query($bodyData);

		$ch = curl_init($this->url);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $bodyData);

		curl_exec($ch);
		curl_close($ch);
	}

	public function findRumor(){
		$user = $this->user;

		$counters = $this->counters;
		
		foreach($counters as $c){
			$m = $user->messages()->where('sequence', $c->sequence + 1)->where('message_id', $c->message_id)->get()->first(); 
			if($m != NULL){
				$this->sendRumor($m);
			}
		}
		// in case the peer doesn't have any counters or they aren't 1 behind 
		
		$m = $user->messages->random(1); 
		if($m != NULL){
			$this->sendRumor($m);
		}
	}

	public function sendRumor($m){
		$user = $this->user;

		$rumor = array (
		  'MessageID' => $m->message_id.":".$m->sequence,
		  'Originator' => $m->originator,
		  'Text' => $m->body
		);

		$bodyData = array (
		  'Rumor' => json_encode($rumor),
		  'EndPoint' => $user->url
		);

		$bodyStr = http_build_query($bodyData);
		
		$ch = curl_init($this->url);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $bodyData);

		curl_exec($ch);
		curl_close($ch);
	}
}
