<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Email extends Model {
	//
	protected $fillable = [
		'subject',
		'to',
		'from',
		'body',
		'sent_at',
		'user_id'
	];

	// convert custom date objects to carbon objects
	protected $dates = ['sent_at']; 

	public function scopeSent($query){
		$query->where('sent_at', '<=', Carbon::now());
	}

	public function scopeUnsent($query){
		$query->where('sent_at', '>', Carbon::now());
	}

	// mutator called when $user->sent_at = $newvalue;
	public function setSentAtAttribute($date){
		$this->attributes['sent_at'] = Carbon::createFromFormat('Y-m-d', $date);
		//Carbon::parse($date); // sets to midnight
	}

	public function user(){
		return $this->belongsTo('App\User');
	}
}