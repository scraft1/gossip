<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model {

	//
	protected $fillable = [
		'message_id',
		'sequence'
	];

	public function peer(){
		return $this->belongsTo('App\Peer');
	}
}
