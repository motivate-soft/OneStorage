<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Facades\App;

class StoreQuestion extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['question', 'answer'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function store(){
        return $this->belongsTo('App\Store');
    }
}
