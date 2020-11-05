<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreQuestion extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function store(){
        return $this->belongsTo('App\Store');
    }
}
