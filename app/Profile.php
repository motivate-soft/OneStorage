<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Profile extends Model
{
    //
    public static $AVATAR_PREFIX = '/images/avatars/';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getBirthdayAttribute($value)
    {
        $DOB = new DateTime($value);
        return $DOB->format('d M Y');
    }

    public function getIsSoundwillMemberAttribute($value){
        return $value ? "SoundWill" : "-";
    }

    public function getIsExistingCustomerAttribute($value){
        return $value ? "OneStorage (分店)" : "-";
    }

    public function getAvatarAttribute($value)
    {
        return static::$AVATAR_PREFIX . ($value ? $value : "default.png");
    }

}
