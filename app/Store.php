<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Helper;
use Image;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Facades\App;

class Store extends Model implements TranslatableContract
{
    use Translatable;

    public static $_SERVICE_COUNT = 8;
    public static $_MAX_QUESTION_COUNT = 5;

    /**
     * Fillable attributes
     * @var array
     */

    public $translatedAttributes = ['detail', 'branch', 'location', 'suburb', 'address', 'latest_offer', 'text_above_addr',
        'text_below_addr', 'opening_hours', 'nearby_facilities'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sizes(){
        return $this->hasMany('App\StoreSize');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions(){
        return $this->hasMany('App\StoreQuestion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function offerImages(){
        return $this->hasMany('App\StoreOfferImage');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function storeImages(){
        return $this->hasMany('App\StoreImage');
    }

    /**
     * @param $index
     * @return bool
     */
    public function serviceState($index){
        $service_state = explode(",", $this->service_facilities);
        if (count($service_state) <= $index) {
            return false;
        }
        return $service_state[$index] == '1';
    }

    /**
     * @return array
     */
    public function getNearbyFacilities(){
        return explode(PHP_EOL, $this->nearby_facilities);
    }

    /**
     * @return mixed
     */
    public static function getLocations(){
        $locations = DB::table('store_translations')
            ->select('store_id as id', 'location')
            ->where('locale', App::getLocale())
            ->orderBy('store_id', 'asc')
            ->limit(6)
            ->get()
            ->unique('location');
//        dd($locations);
//        return  Store::select('id', 'location')->orderBy('id', 'asc')->get()->unique('location');
        return $locations;
    }

    /**
     * @return mixed
     */
    public function getLowestPrice(){
        return $this->sizes->min('prepaid_price');
    }

    /**
     * @return false|string
     */
    public function getSizeLabel(){
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

    /**
     * @return false|string
     */
    public function activeOfferImages(){
        $activeImages = [];
        foreach($this->offerImages()->where('is_used', true)->get() as $image){
            $activeImages[] = $image->id.'';
        }
        return json_encode($activeImages);
    }

    /**
     * @return false|string
     */
    public function activeStoreImages(){
        $activeImages = [];
        foreach($this->storeImages()->where('is_used', true)->get() as $image){
            $activeImages[] = $image->id.'';
        }
        return json_encode($activeImages);
    }

    /**
     * @param $data
     * @param $type
     * @param $url
     */
    public function setImages($data, $type, $url){
        $activeImages = json_decode($data['active-'.$type]);
        //active offer images
        foreach ($this[$type] as $image) {
            $image->is_used = in_array($image->id, $activeImages);
            $image->save();
        }

        //save offer images
        if (isset($data[$type])) {
            foreach ($data[$type] as $image_base64) {
                $name = time() . Helper::getRandomString() . '.png';
                $path = public_path($url) . '/' . $name;
                if (Image::make($image_base64)->save($path)) {
                    $image = $type == 'storeImages' ? new StoreImage : new StoreOfferImage;
                    $image->image = $name;
                    $image->is_used = true;
                    $image->store_id = $this->id;
                    $image->save();
                }
            }
        }

        //delete offer images
        $willDeleteImages = json_decode($data['delete-'.$type]);
        foreach ($willDeleteImages as $id) {
            $image = $type == 'storeImages' ? StoreImage::find($id) :StoreOfferImage::find($id);
            if ($image) {
                $image->delete();
            }
        }
    }

    /**
     * @param $data
     */
    public function setData($data){
        $this->_id = $data['_id'];
        $locale = App::getLocale();
        $this->update([
            $locale => [
                'location'  => $data['location'],
                'branch'  => $data['branch'],
                'suburb'  => $data['suburb'],
                'detail'  => $data['detail'],
                'latest_offer'  => $data['latest_offer'],
                'address'  => $data['address'],
                'text_above_addr'  => $data['text_above_addr'],
                'text_below_addr'  => $data['text_below_addr'],
                'opening_hours'  => $data['opening_hours'],
                'nearby_facilities'  => $data['nearby_facilities'],
            ]
        ]);

        $this->video_link = $data['video_link'];
        $this->lat = $data['lat'];
        $this->lng = $data['lng'];
        //save services
        $services = '';
        for ($i = 0; $i < Store::$_SERVICE_COUNT; $i++) {
            $services .= (isset($data['service' . $i]) && $data['service' . $i] == "on") ? '1' : '0';
            if ($i != Store::$_SERVICE_COUNT - 1) {
                $services .= ',';
            }
        }
        $this->service_facilities = $services;
        $this->save();
        //save sizes
        for ($i = 0; $i < 4; $i++) {
            $size = null;
            if (isset($data['s-' . $i . '-id']) && $data['s-' . $i . '-id'] != 0) {
                $size = StoreSize::find($data['s-' . $i . '-id']);
            } else {
                $size = new StoreSize;
                $size->store_id = $this->id;
            }
            if (!$size) {
                continue;
            }
            $size->size = isset($data['s-' . $i . '-size']) ? $data['s-' . $i . '-size'] : 0;
            $size->width = isset($data['s-' . $i . '-width']) ? $data['s-' . $i . '-width'] : 0;
            $size->height = isset($data['s-' . $i . '-height']) ? $data['s-' . $i . '-height'] : 0;
            $size->depth = isset($data['s-' . $i . '-depth']) ? $data['s-' . $i . '-depth'] : 0;
            $size->price = isset($data['s-' . $i . '-price']) ? $data['s-' . $i . '-price'] : 0;
            $size->prepaid_price = isset($data['s-' . $i . '-preprice']) ? $data['s-' . $i . '-preprice'] : 0;
            $size->save();
        }

        //save questions
        for ($i = 0; $i < Store::$_MAX_QUESTION_COUNT; $i++) {
            if (isset($data['question' . $i . '-id']) && $data['question' . $i . '-id'] != 0) {
                $question = StoreQuestion::find($data['question' . $i . '-id']);
                if ($data['question' . $i] == "") {
                    $question->delete();
                } else {
                    $question->question = $data['question' . $i];
                    $question->answer = $data['answer' . $i];
                    $question->save();
                }
            } else if (isset($data['question' . $i]) && $data['question' . $i] != "") {
                $question = new StoreQuestion;
                $question->store_id = $this->id;
                $question->save();
                $question->update([
                    $locale => [
                        'question' => $data['question' . $i],
                        'answer' => $data['answer' . $i]
                    ]
                ]);
//                $question->question = $data['question' . $i];
//                $question->answer = $data['answer' . $i];
            }
        }
        $this->setImages($data, "offerImages", "/images/offers");
        $this->setImages($data, "storeImages", "/images/stores");
    }

    /**
     * @return bool|void|null
     */
    public function delete(){
        DB::transaction(function()
        {
            $this->sizes()->delete();
            $this->questions()->delete();
            $this->offerImages()->delete();
            parent::delete();
        });
    }
}
