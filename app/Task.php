<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

	// columns that can be mass assigned (not a security threat)
	protected $fillable = [
		'name',
		'due_date',
		'day'
	];
}
