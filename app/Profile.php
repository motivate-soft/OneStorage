<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Profile extends Model
{
    //

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

}
