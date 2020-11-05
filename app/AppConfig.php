<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppConfig extends Model
{
    public static function getBackground(){
        $appConfig = AppConfig::first();
        if($appConfig){
            return $appConfig->background;
        }
        return null;
    }
}
