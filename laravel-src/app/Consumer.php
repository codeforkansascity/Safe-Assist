<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
                
class Consumer extends Model
{
    public function agencies() 
    {
    	    return $this->belongsTo('App\Consumer', 'sponsor');
    }
        
    public function address()
    {
        return $this->belongsTo('App\Address');
    }    
}
