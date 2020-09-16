<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Store extends Model
{

    public static $_SERVICE_COUNT = 8;
    public static $_MAX_QUESTION_COUNT = 5;

    protected $fillable = [
        'detail', 'branch', 'location', 'suburb', 'address', 'latest_offer', 'text_above_addr',
        'text_below_addr', 'opening_hours', 'nearby_facilities'
    ];
    //
    public function sizes()
    {
        return $this->hasMany('App\StoreSize');
    }

    public function questions()
    {
        return $this->hasMany('App\StoreQuestion');
    }

    public function serviceState($index)
    {
        $service_state = explode(",", $this->service_facilities);
        if (count($service_state) <= $index) {
            return false;
        }
        return $service_state[$index] == '1';
    }

    public function getNearbyFacilities()
    {
        return explode(PHP_EOL, $this->nearby_facilities);
    }

    public static function getLocations()
    {
        return  Store::select('id', 'location')->orderBy('id', 'asc')->get()->unique('location');
    }

    public function delete()
    {
        DB::transaction(function() 
        {
            $this->sizes()->delete();
            $this->questions()->delete();
            parent::delete();
        });
    }
}
