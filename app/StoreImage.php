<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreImage extends Model
{
    //
    public function store(){
        return $this->belongsTo('App\Store');
    }

    public function getImageAttribute($value)
    {
        return 'images/stores/'.$value;
    }
}
