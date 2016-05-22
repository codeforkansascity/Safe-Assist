<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
                
class Consumer extends Model
{
    public $relationship_options = [
			'self' => 'Self',
			'parent' => 'Parent',
			'guardian' => 'Guardian',
			'sibling' => 'Sibling',
			'facility_agent' => 'Facility Agent',
			'medical_worker' => 'Medical Worker',
			'other' => 'Other'
    ];
    
    public $language_options = [
			'english' => 'English',
			'spanish' => 'Spanish',
			'other' => 'Other'
    ];
    
    public $gender_options = [
			'M' => 'Male',
			'F' => 'Female'
    ];
	
    public $eye_color_options = [
			'brown' => 'Brown',
			'hazel' => 'Hazel',
			'blue' => 'Blue',
			'green' => 'Green',
			'grey' => 'Grey',
			'amber' => 'Amber'
    ];
    
    public $hair_color_options = [
			'brown' => 'Brown',
			'black' => 'Black',
			'blonde' => 'Blonde',
			'red' => 'Red',
			'grey' => 'Grey',
			'bald' => 'Bald'
    ];
    
    public function agencies() 
    {
        return $this->belongsTo('App\Consumer', 'sponsor');
    }
        
    public function address()
    {
        return $this->belongsTo('App\Address');
    }

    public function contacts() {
        return $this->hasMany('App\Contact');
    }
}
