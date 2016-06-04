<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Impairment extends Model
{
    public static function get_all_options() {
        $options = array();
        foreach(Impairment::all() as $impairment)
            $options[$impairment->id] = $impairment->name;
        return $options;
    }
}