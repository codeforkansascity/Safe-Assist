<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Validation\ValidatesRequests;
                
class Address extends Model
{
    use ValidatesRequests;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['street', 'city', 'state', 'zip1'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['id'];
    
    public static function rules()
    {
        return [
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip1' => 'required',
        ];
    }
}
