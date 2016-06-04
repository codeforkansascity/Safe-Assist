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

	public function get_medication_keys() {
		$keys = array();
		foreach($this->medications as $medication)
			$keys[] = $medication->id;
		return $keys;
	}

	public function get_medication_names() {
		$values = array();
		foreach($this->medications as $medication)
			$values[] = $medication->name;
		return $values;
	}

	public function get_medication_options() {
		$values = array();
		foreach($this->medications as $medication)
			$values[$medication->id] = $medication->name;
		return $values;
	}



	public function conditions() {
		return $this->belongsToMany('App\Condition');
	}

	public function get_condition_keys() {
		$keys = array();
		foreach($this->conditions as $condition)
			$keys[] = $condition->id;
		return $keys;
	}

	public function get_condition_names() {
		$values = array();
		foreach($this->conditions as $condition)
			$values[] = $condition->name;
		return $values;
	}



	public function impairments() {
		return $this->belongsToMany('App\Impairment');
	}

	public function get_impairment_keys() {
		$keys = array();
		foreach($this->impairments as $impairment)
			$keys[] = $impairment->id;
		return $keys;
	}

	public function get_impairment_names() {
		$values = array();
		foreach($this->impairments as $impairment)
			$values[] = $impairment->name;
		return $values;
	}



	public function devices() {
		return $this->belongsToMany('App\Device');
	}
	public function get_device_keys() {
		$keys = array();
		foreach($this->devices as $device)
			$keys[] = $device->id;
		return $keys;
	}

	public function get_device_names() {
		$values = array();
		foreach($this->devices as $device)
			$values[] = $device->name;
		return $values;
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
