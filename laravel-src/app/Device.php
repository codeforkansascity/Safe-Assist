<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    public static function get_all_options() {
        $options = array();
        foreach(Device::all() as $device)
            $options[$device->id] = $device->name;
        return $options;
    }
}