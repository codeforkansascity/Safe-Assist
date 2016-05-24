<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    public static function get_all_options() {
        $options = array();
        foreach(Medication::all() as $medication)
            $options[$medication->id] = $medication->name;
        return $options;
    }
}