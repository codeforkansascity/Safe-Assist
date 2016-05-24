<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    public static function get_all_options() {
        $options = array();
        foreach(Condition::all() as $condition)
            $options[$condition->id] = $condition->name;
        return $options;
    }
}