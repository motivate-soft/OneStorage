<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    private static $IMAGE_PREFIX = '/images/blogs/';

    public function getImageAttribute($value){
        return static::$IMAGE_PREFIX . $value;
    }

    public function getThumbnailAttribute($value){
        return static::$IMAGE_PREFIX . $value;
    }

    public function getPromotionAttribute($value){
        return static::$IMAGE_PREFIX . $value;
    }


}
