<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Background extends Model
{
    //
    public static $IMAGE_PREFIX = '/images/backgrounds/';

    /**
     * @param $value
     * @return string
     */
    public function getImageAttribute($value){
        return static::$IMAGE_PREFIX . $value;
    }

    public function set()
    {
        $appConfig = AppConfig::first();
        if ($appConfig) {
            $appConfig->background = $this->image;
            $appConfig->save();
        }
    }

    public function remove()
    {
        $appConfig = AppConfig::first();
        if ($appConfig && $appConfig->background == $this->image) {
            $appConfig->background = null;
            $appConfig->save();
        }
        $this->delete();
    }

    public function isActive()
    {
        $appConfig = AppConfig::first();
        return $appConfig && $appConfig->background == $this->image;
    }

    public function setImage(UploadedFile $reqImage){
        $name = time() . '.' . $reqImage->getClientOriginalExtension();
        $destinationPath = public_path(static::$IMAGE_PREFIX);
        $reqImage->move($destinationPath, $name);
        $this->image = $name;
        $this->save();
    }
}
