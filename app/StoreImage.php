<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreImage extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function store(){
        return $this->belongsTo('App\Store');
    }

    /**
     * @param $value
     * @return string
     */
    public function getImageAttribute($value){
        return 'images/stores/'.$value;
    }
}
