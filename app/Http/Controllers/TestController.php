<?php namespace App\Http\Controllers;

use App\User;
use App\Peer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TestController extends Controller {

	//
	public function users()
	{
		return User::all();
	}

	public function rumor(){
		$rumor = array (
		  'MessageID' => 'ABCD:3',
		  'Originator' => 'Phil',
		  'Text' => 'Hello, world!'
		);

		$bodyData = array (
		  'Rumor' => json_encode($rumor),
		  'EndPoint' => "example.com"
		);
		dd($bodyData);
		$bodyStr = http_build_query($bodyData);

		$ch = curl_init('http://gossip.dev/receive/2');

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $bodyData);

		curl_exec($ch);
		curl_close($ch);
	}

	public function want(){
		$want = array (
		  'ABCD' => 3,
		  'EFGH' => 2,
		  'IJKL' => 4
		);

		$bodyData = array (
		  'Want' => json_encode($want),
		  'EndPoint' => "example.com"
		);
		$bodyStr = http_build_query($bodyData);

		$ch = curl_init('http://gossip.dev/receive/2');

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $bodyData);

		curl_exec($ch);
		curl_close($ch);
	}
}
