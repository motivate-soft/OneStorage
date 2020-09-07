<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //
    public function sizes(){
        return $this->hasMany('App\StoreSize');
    }
}
