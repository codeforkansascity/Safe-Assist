<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Validation\ValidatesRequests;
                
class Address extends Model
{
    use ValidatesRequests;

    /**
     * drop-down options for the state field.
     * incorporated from comments in https://gist.github.com/maxrice/2776900
     * @var array  */
    public static $state_options =  [
        'AL'=>'Alabama',
        'AK'=>'Alaska',
        'AZ'=>'Arizona',
        'AR'=>'Arkansas',
        'CA'=>'California',
        'CO'=>'Colorado',
        'CT'=>'Connecticut',
        'DE'=>'Delaware',
        'DC'=>'District of Columbia',
        'FL'=>'Florida',
        'GA'=>'Georgia',
        'HI'=>'Hawaii',
        'ID'=>'Idaho',
        'IL'=>'Illinois',
        'IN'=>'Indiana',
        'IA'=>'Iowa',
        'KS'=>'Kansas',
        'KY'=>'Kentucky',
        'LA'=>'Louisiana',
        'ME'=>'Maine',
        'MD'=>'Maryland',
        'MA'=>'Massachusetts',
        'MI'=>'Michigan',
        'MN'=>'Minnesota',
        'MS'=>'Mississippi',
        'MO'=>'Missouri',
        'MT'=>'Montana',
        'NE'=>'Nebraska',
        'NV'=>'Nevada',
        'NH'=>'New Hampshire',
        'NJ'=>'New Jersey',
        'NM'=>'New Mexico',
        'NY'=>'New York',
        'NC'=>'North Carolina',
        'ND'=>'North Dakota',
        'OH'=>'Ohio',
        'OK'=>'Oklahoma',
        'OR'=>'Oregon',
        'PA'=>'Pennsylvania',
        'RI'=>'Rhode Island',
        'SC'=>'South Carolina',
        'SD'=>'South Dakota',
        'TN'=>'Tennessee',
        'TX'=>'Texas',
        'UT'=>'Utah',
        'VT'=>'Vermont',
        'VA'=>'Virginia',
        'WA'=>'Washington',
        'WV'=>'West Virginia',
        'WI'=>'Wisconsin',
        'WY'=>'Wyoming'
    ];

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
