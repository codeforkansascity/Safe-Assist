<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
                
class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    protected $fillable = ['email', 'password', 'address_id'];
    protected $hidden = ['password', 'remember_token'];
    
    public function address()
    {
        return $this->belongsTo('App\Address');
    }           
    
    public function consumers() {
    	    return $this->hasMany('App\Consumer', 'sponsor');
    }
    
    public function agencies() {
    	    return $this->belongsToMany('App\Agency')->withPivot('position');
    }

    /** determines whether or not this user is an agent (belongs to an agency)  */
    public function is_agent() {
        return $this->agencies()->count() > 0;
    }
}
