<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    //
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
