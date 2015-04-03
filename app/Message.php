<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

	//
	protected $fillable = [
		'message_id',
		'body',
		'sequence',
		'originator'
	];

	public function user(){
		return $this->belongsTo('App\User');
	}
}
