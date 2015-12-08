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
    protected $fillable = ['street', 'city', 'state', 'zip1', 'zip2'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['id'];
}
