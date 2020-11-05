<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Profile extends Model
{
    //
    public static $AVATAR_PREFIX = '/images/avatars/';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    /**
     * @param $value
     * @return string
     * @throws \Exception
     */
    public function getBirthdayAttribute($value){
        $DOB = new DateTime($value);
        return $DOB->format('d M Y');
    }

    /**
     * @param $value
     * @return string
     */
    public function getIsSoundwillMemberAttribute($value){
        return $value ? "SoundWill" : "-";
    }

    /**
     * @param $value
     * @return string
     */
    public function getIsExistingCustomerAttribute($value){
        return $value ? "OneStorage (分店)" : "-";
    }

    /**
     * @param $value
     * @return string
     */
    public function getAvatarAttribute($value){
        return static::$AVATAR_PREFIX . ($value ? $value : "default.png");
    }

}
