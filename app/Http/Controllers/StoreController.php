<?php

namespace App\Http\Controllers;

use App\Store;
use App\StoreOfferImage;
use App\StoreImage;
use App\StoreQuestion;
use App\StoreSize;
use App\AppConfig;
use Illuminate\Http\Request;
use DB;
use Image;
use Helper;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    private function setImages($store, $data, $type, $url)
    {
        $activeImages = json_decode($data['active-'.$type]);
        //active offer images
        foreach ($store[$type] as $image) {
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
                    $image->store_id = $store->id;
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


    private function setData($store, $data)
    {
        if ($store) {
            $store->_id = $data['_id'];
            $store->location = $data['location'];
            $store->branch = $data['branch'];
            $store->suburb = $data['suburb'];
            $store->detail = $data['detail'];
            $store->latest_offer = $data['latest_offer'];
            $store->address = $data['address'];
            $store->text_above_addr = $data['text_above_addr'];
            $store->text_below_addr = $data['text_below_addr'];
            $store->opening_hours = $data['opening_hours'];
            $store->nearby_facilities = $data['nearby_facilities'];
            $store->video_link = $data['video_link'];
            $store->lat = $data['lat'];
            $store->lng = $data['lng'];
            //save services
            $services = '';
            for ($i = 0; $i < Store::$_SERVICE_COUNT; $i++) {
                $services .= (isset($data['service' . $i]) && $data['service' . $i] == "on") ? '1' : '0';
                if ($i != Store::$_SERVICE_COUNT - 1) {
                    $services .= ',';
                }
            }
            $store->service_facilities = $services;
            $store->save();
            //save sizes
            for ($i = 0; $i < 4; $i++) {
                $size = null;
                if (isset($data['s-' . $i . '-id']) && $data['s-' . $i . '-id'] != 0) {
                    $size = StoreSize::find($data['s-' . $i . '-id']);
                } else {
                    $size = new StoreSize;
                    $size->store_id = $store->id;
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
                    $question->store_id = $store->id;
                    $question->question = $data['question' . $i];
                    $question->answer = $data['answer' . $i];
                    $question->save();
                }
            }
            $this->setImages($store, $data, "offerImages", "/images/offers");
            $this->setImages($store, $data, "storeImages", "/images/stores");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $store = new Store;
        $this->setData($store, $data);
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $store = Store::find($data['id']);
        $this->setData($store, $data);
        return redirect()->back();
    }

    public function delete($id)
    {
        $store = Store::find($id);
        if ($store) {
            $store->delete();
            return true;
        }
        return false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }

    public function getBranch()
    {
        $location = isset($_GET['location']) ? $_GET['location'] : '';
        $branches = Store::where('location', $location)->select('branch', '_id', 'address')->get();
        return $branches;
    }

    public function showRentwareHouse($id = '')
    {
        $store = Store::where('_id', $id)->first();
        if($store){
            return view('rentwarehouse', ['store' => $store]);
        }

        return redirect()->route('pages.branchLocation');
    }

    public function branchLocation()
    {
        $locations = Store::getLocations();
        $location = isset($_GET['location']) ? $_GET['location'] : '';
        $_GET['location'] = $location;

        $stores = DB::table('stores')->join('store_sizes', 'store_sizes.store_id', '=', 'stores.id')
            ->groupBy('stores.id')
            ->selectRaw('stores.*, min(store_sizes.prepaid_price) as price');

        $appConfig = AppConfig::first();
        if($appConfig){
            $stores->orderByRaw($appConfig->store_order);
        }else{
            $stores->orderByRaw("price ASC");
        }

        $stores = $location == '' ? $stores->get() : $stores->where('location', $location)->get();

        return view('branchlocation', ['locations' => $locations, 'stores' => $stores]);
    }

    public function show($id = 0)
    {
        $store = Store::find($id);
        return view('backend.stores', ['selected_store' => $store]);
    }

    public function changeOrder(Request $request)
    {
        $appConfig = AppConfig::first();
        if ($appConfig && isset($request->order)) {
            $appConfig->store_order = $request->order;
            $appConfig->save();
            return true;
        }
        return false;
    }
}
