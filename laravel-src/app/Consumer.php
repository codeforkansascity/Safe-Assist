<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
                
class Consumer extends Model
{
    public static $relationship_options = [
			'self' => 'Self',
			'parent' => 'Parent',
			'guardian' => 'Guardian',
			'sibling' => 'Sibling',
			'facility_agent' => 'Facility Agent',
			'medical_worker' => 'Medical Worker',
			'other' => 'Other'
    ];
    
    public static $language_options = [
			'english' => 'English',
			'spanish' => 'Spanish',
			'other' => 'Other'
    ];
    
    public static $gender_options = [
			'M' => 'Male',
			'F' => 'Female'
    ];
	
    public static $eye_color_options = [
			'brown' => 'Brown',
			'hazel' => 'Hazel',
			'blue' => 'Blue',
			'green' => 'Green',
			'grey' => 'Grey',
			'amber' => 'Amber'
    ];
    
    public static $hair_color_options = [
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

	public function medications() {
		return $this->belongsToMany('App\Medication');
	}

	public function conditions() {
		return $this->belongsToMany('App\Condition');
	}

	public function impairments() {
		return $this->belongsToMany('App\Impairment');
	}

	public function devices() {
		return $this->belongsToMany('App\Device');
	}

	public function employer()
	{
		return $this->belongsTo('App\Employer');
	}

	public function school()
	{
		return $this->belongsTo('App\School');
	}

	public function address()
    {
        return $this->belongsTo('App\Address');
    }

    public function contacts() {
        return $this->hasMany('App\Contact');
    }
}
