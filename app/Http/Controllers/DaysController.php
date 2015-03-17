<?php namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DaysController extends Controller {

	//
	public function index(){		
		return view('pages.days');
	}

	public function show($day){
		$tasks = Task::where('day', $day)->get();
		
		return view('pages.day', compact('tasks', 'day'));
	}

}
