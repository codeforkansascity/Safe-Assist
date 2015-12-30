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
    
    
    /**
     * attempts to find a matching address before creating a new instance
     */
    public static function retrieveOrCreate(array $attributes = [])
    {
        // TODO: look up address attributes to find a match
        $existing_addr = Address::where('street',$attributes['street'])
          ->where('city',$attributes['city'])
          ->where('state',$attributes['state'])
          ->where('zip1',$attributes['zip1'])
          ->first();
        if($existing_addr) return $existing_addr;
        return Address::create($attributes);
    }
}
