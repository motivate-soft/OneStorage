<?php

namespace App\Http\Controllers;

use App\Store;
use App\StoreQuestion;
use App\StoreSize;
use Illuminate\Http\Request;

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



    private function setData($store, $data)
    {
        if ($store) {
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
                } else{
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
        if($store){
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
        $branches = Store::where('location', $location)->select('branch', 'id', 'address')->get();
        return $branches;
    }

    public function showRentwareHouse(Request $request)
    {
        $id = isset($_GET['storeId']) ? $_GET['storeId'] : -1;
        $store = Store::find($id);
        return view('rentwarehouse', ['store' => $store]);
    }

    public function branchLocation()
    {
        $locations = Store::getLocations();
        $location = isset($_GET['location']) ? $_GET['location'] : $locations[0]->location;
        $_GET['location'] = $location;
        $stores = Store::where('location', $location)->get();
        return view('branchlocation', ['locations' => $locations, 'stores' => $stores]);
    }

    public function show($id = 0)
    {
        $store = Store::find($id);
        return view('backend.stores', ['selected_store' => $store]);
    }
}
