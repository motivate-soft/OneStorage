<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
    //
    public function getImageUrl()
    {
        return "/images/backgrounds/" . $this->image;
    }

    public function set()
    {
        $appConfig = AppConfig::first();
        if ($appConfig) {
            $appConfig->background = $this->getImageUrl();
            $appConfig->save();
        }
    }

    public function remove()
    {
        $appConfig = AppConfig::first();
        if ($appConfig && $appConfig->background == $this->getImageUrl()) {
            $appConfig->background = "";
            $appConfig->save();
        }
        $this->delete();
    }

    public function isActive()
    {
        $appConfig = AppConfig::first();
        return $appConfig && $appConfig->background == $this->getImageUrl();
    }
}
