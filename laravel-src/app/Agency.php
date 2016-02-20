<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
                
class Agency extends Model
{
	protected $table = 'agencies';
	
	public function agents() {
		return $this->belongsToMany('App\User', 'users_has_agencies');
	}

	public function address()
	{
		return $this->belongsTo('App\Address');
	}

	public function users() {
		return $this->belongsToMany('App\User');
	}
}
