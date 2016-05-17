<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    public function address()
    {
        return $this->belongsTo('App\Address');
    }

}
