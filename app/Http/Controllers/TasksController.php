<?php namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TasksController extends Controller {

	//
	public function index(){
		$tasks = Task::all();

		return view('pages.tasklist', compact('tasks'));
	}
}
