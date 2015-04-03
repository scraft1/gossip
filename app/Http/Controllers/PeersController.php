<?php namespace App\Http\Controllers;

use App\Peer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PeersController extends Controller {

	public function __construct(){
		$this->middleware('auth'); // , ['except' => ['index', 'show']]
	}
	
	public function index(){
		return \Auth::user()->peers;
	}

	public function create(){
		return view('peers.create');
	}

	public function store(Request $request){
		$this->validate($request, [
	        'url' => 'required'
	    ]);

		$peer = new Peer($request->all());
		\Auth::user()->peers()->save($peer); 

		return redirect('messages');
	}
}
