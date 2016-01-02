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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'password', 'address_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['id', 'password', 'remember_token'];
    
    public function address()
    {
        return $this->belongsTo('App\Address');
    }           
    
    public function consumers() {
    	    return $this->hasMany('App\Consumer', 'sponsor');
    }
    
    public function agencies() {
    	    return $this->belongsToMany('App\Agency', 'users_has_agencies');
    }
}
