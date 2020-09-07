<?php

namespace App\Http\Controllers;

use App\Store;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        //
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
        $url = $request->url();
        $id = isset($_GET['storeId']) ? $_GET['storeId'] : -1;
        $store = Store::find($id);
        if (str_contains($url, "mobile")) {
            return view('mobile.rentwarehouse', ['store' => $store]);
        } else {
            return view('desktop.rentwarehouse', ['store' => $store]);
        }
    }

    public function branchLocation(Request $request)
    {
        $url = $request->url();
        $location = isset($_GET['location']) ? $_GET['location'] : '';
        $locations = Store::groupBy('location')->select('location')->get();
        $stores = Store::where('location', $location)->get();
        if (str_contains($url, "mobile")) {
            return view('mobile.branchlocation', ['locations' => $locations, 'stores' => $stores]);
        } else {
            return view('desktop.branchlocation', ['locations' => $locations, 'stores' => $stores]);
        }
    }
}
