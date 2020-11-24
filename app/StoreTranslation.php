<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreTranslation extends Model
{
    //
    protected $fillable = ['detail', 'branch', 'location', 'suburb', 'address', 'latest_offer', 'text_above_addr',
        'text_below_addr', 'opening_hours', 'nearby_facilities'];
    public $timestamps = false;
}
