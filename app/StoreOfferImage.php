<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreOfferImage extends Model
{
    //
    public function store(){
        return $this->belongsTo('App\Store');
    }
}
