<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
                
class Consumer extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'address_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['id'];
    
    
    public function agencies() 
    {
    	    return $this->belongsTo('App\Consumer', 'sponsor');
    }
        
    public function address()
    {
        return $this->belongsTo('App\Address');
    }    
}
