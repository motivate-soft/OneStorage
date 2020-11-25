<?php

namespace App\Http\Controllers;

use App\Store;
use App\AppConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use DB;

/**
 * Class StoreController
 * @package App\Http\Controllers
 */
class StoreController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $data = $request->all();
        $store = Store::create();
        $store->setData($data);
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request){
        $data = $request->all();
        $store = Store::findOrFail($data['id']);
        $store->setData($data);
        return redirect()->back();
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id){
        $store = Store::find($id);

        if ($store) {
            $store->delete();
            return true;
        }
        return false;
    }


    /**
     * @return mixed
     */
    public function getBranch(){
        $location = isset($_GET['location']) ? $_GET['location'] : '';
        $branches = DB::table('store_translations')
            ->leftJoin('stores', 'stores.id', '=', 'store_translations.store_id')
            ->where('locale', App::getLocale())
            ->where('location', $location)
            ->select('store_translations.branch', 'stores._id', 'store_translations.address')
            ->get();
//        $branches = Store::where('location', $location)->select('branch', '_id', 'address')->get();
        return $branches;
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function showRentwareHouse($id = ''){
        $store = Store::where('_id', $id)->first();

        if($store){
            return view('rentwarehouse', ['store' => $store]);
        }

        return redirect()->route('pages.branchLocation');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function branchLocation(){
        $locations = Store::getLocations();
        $location = isset($_GET['location']) ? $_GET['location'] : '';
        $_GET['location'] = $location;

        $stores = DB::table('stores')
            ->join('store_translations', 'store_translations.store_id', '=', 'stores.id')
            ->join('store_sizes', 'store_sizes.store_id', '=', 'stores.id')
            ->where('store_translations.locale', App::getLocale())
            ->selectRaw('stores.*, store_translations.* ,min(store_sizes.prepaid_price) as price')
            ->groupBy('stores.id');

        $appConfig = AppConfig::first();

        if($appConfig){
            $stores->orderByRaw($appConfig->store_order);
        }else{
            $stores->orderByRaw("price ASC");
        }

        $stores = $location == '' ? $stores->get() : $stores->where('location', $location)->get();

//        dd($stores);

        return view('branchlocation', ['locations' => $locations, 'stores' => $stores]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id = 0){
        $store = Store::find($id);
        return view('backend.stores', ['selected_store' => $store]);
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function changeOrder(Request $request){
        $appConfig = AppConfig::first();

        if ($appConfig && isset($request->order)) {
            $appConfig->store_order = $request->order;
            $appConfig->save();
            return true;
        }

        return false;
    }
}
