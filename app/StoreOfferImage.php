<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreOfferImage extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function store(){
        return $this->belongsTo('App\Store');
    }
}
