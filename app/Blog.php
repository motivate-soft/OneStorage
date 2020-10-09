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

    public function getPublishDateAttribute($value){
        return new \DateTime($value);
    }

    public static function getNewses($count = 0){
        $newses = Blog::orderBy('publish_date', 'desc')->orderBy('created_at', 'desc');
        if($count > 0){
            $newses = $newses->take($count)->get();
        }
        return $newses;
    }

    public static function getLatestNotifyNews(){
        $latest_news = Blog::where('used_notify', true)
            ->orderBy('publish_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->first();
        return $latest_news;
    }

}
