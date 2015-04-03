<?php namespace App;

use \App\Peer;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'originator', 'url', 'message_id', 'sequence'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function messages(){
		return $this->hasMany('App\Message');
	}

	public function peers(){
		return $this->hasMany('App\Peer');
	}

	public function sequences(){
		return $this->hasMany('App\Sequence');
	}

	public function incrementSequence(){
		$u = \Auth::user();
		$u->sequence = $u->sequence + 1;
		$u->save();
	}

	public function getPeer(){
		return $this->peers->random(1);
	}
}
