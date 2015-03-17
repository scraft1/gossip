<?php namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Email;
use Illuminate\Http\Request;
use App\Http\Requests\EmailRequest;
use App\Http\Controllers\Controller;

class EmailController extends Controller {
	
	public function __construct(){ // needs double underlines
		$this->middleware('auth', ['except' => ['index', 'show']]); 
	}

	// /emails
	public function index(){	
		$emails = Email::latest()->sent()->get();

		return view('emails.emails', compact('emails'));
	}

	// /emails/{id}
	public function show($id){	
		$email = Email::findOrFail($id);

		return view('emails.email', compact('email'));
	}

	// /emails/create
	public function create(){		
		return view('emails.create');
	}

	// post /emails
	public function store(EmailRequest $request){ 
		$email = new Email($request->all()); 
		\Auth::user()->emails()->save($email); // saves user_id in email automatically

		return redirect('emails');
	}

	// /emails/{id}/edit
	public function edit($id){ 
		$email = Email::findOrFail($id); 

		return view('emails.edit', compact('email'));
	}

	// patch /emails
	public function update($id, EmailRequest $request){ 
		$email = Email::findOrFail($id); 

		$email->update($request->all());

		return redirect('emails');
	}
}
