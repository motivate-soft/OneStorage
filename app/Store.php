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

    public function offerImages()
    {
        return $this->hasMany('App\StoreOfferImage');
    }

    public function storeImages()
    {
        return $this->hasMany('App\StoreImage');
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

    public function getLowestPrice()
    {
        return $this->sizes->min('price');
    }

    public function getSizeLabel()
    {
        $sizeLabels = [];
        foreach($this->sizes as $size){
            $label = '';
            if($size->size < 13){
                $label = 'S';
            }else if($size->size < 25){
                $label = 'M';
            }else if($size->size < 37){
                $label = 'L';
            }else if($size->size >= 37 ){
                $label = 'XL';
            }
            if(!in_array($label, $sizeLabels)){
                $sizeLabels[] = $label;
            }
        }
        
        return json_encode($sizeLabels);
    }

    public function activeOfferImages()
    {
        $activeImages = [];
        foreach($this->offerImages()->where('is_used', true)->get() as $image){
            $activeImages[] = $image->id.'';
        }
        return json_encode($activeImages);
    }

    public function activeStoreImages()
    {
        $activeImages = [];
        foreach($this->storeImages()->where('is_used', true)->get() as $image){
            $activeImages[] = $image->id.'';
        }
        return json_encode($activeImages);
    }

    public function delete()
    {
        DB::transaction(function() 
        {
            $this->sizes()->delete();
            $this->questions()->delete();
            $this->offerImages()->delete();
            parent::delete();
        });
    }
}
