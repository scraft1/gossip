<?php namespace App\Http\Controllers;

use Input;
use App\Painting;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PaintingsController extends Controller {


	public function index(){
		$paintings = Painting::orderBy('created_at','desc')->get();

		return view('paintings.paintings', compact('paintings'));
	}

	// /paintings/{id}
	public function show(Painting $painting){	
		return view('paintings.painting', compact('painting'));
	}

	// /paintings/create
	public function create(){		
		return view('paintings.create');
	}

	// post /paintings
	public function store(Request $request){ 
		$this->validate($request, ['painting' => 'required', 'artist' => 'required', 'title' => 'required']);
		$painting = new Painting($request->all());

		$file = Input::file('painting');
		$path = str_random(6).'.jpg';
		$file->move(public_path().'/images', $path);

		$painting->path = $path;
		$painting->save();
		
		return redirect('paintings/create');
		return redirect('paintings');
	}

	// /paintings/{id}/edit
	public function edit(Painting $painting){ 
		return view('paintings.edit', compact('painting'));
	}

	// patch /paintings
	public function update(Painting $painting, Request $request){ 
		$this->validate($request, ['artist' => 'required', 'title' => 'required']);
		$painting->update($request->all());

		return view('paintings.painting', compact('painting'));
	}

	public function quiz(){ 
		$painting = Painting::orderByRaw("RAND()")->get()->first();
		$choices = Painting::distinct()->select('artist')->where('artist', '!=', $painting->artist)->orderByRaw("RAND()")->take(3)->lists('artist');
		$choices[3] = $painting->artist;
		shuffle($choices);

		return view('paintings.quiz', compact('painting', 'choices'));
	}

	public function artists(){ 
		$artists = array_unique(Painting::lists('artist'));

		return view('paintings.artists', compact('artists'));
	}

	public function artist($name){
		$paintings = Painting::orderBy('created_at','desc')->where('artist', $name)->get();

		return view('paintings.artist', compact('paintings', 'name'));

	}
}
