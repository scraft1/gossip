<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sequence extends Model {

	//
	//
	protected $fillable = [
		'message_id',
		'sequence'
	];

	public function user(){
		return $this->belongsTo('App\User');
	}
}
