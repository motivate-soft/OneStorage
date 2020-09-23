<?php

namespace App\Http\Controllers;

use App\AppConfig;
use App\Background;
use Illuminate\Http\Request;

class BackgroundController extends Controller
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
        //file upload
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $background = new Background;

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/backgrounds');
            $image->move($destinationPath, $name);
            $background->image = $name;
        }

        $background->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Background  $background
     * @return \Illuminate\Http\Response
     */
    public function show(Background $background)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Background  $background
     * @return \Illuminate\Http\Response
     */
    public function edit(Background $background)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Background  $background
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Background $background)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Background  $background
     * @return \Illuminate\Http\Response
     */
    public function destroy(Background $background)
    {
        //
    }

    public function delete($id)
    {
        $background = Background::find($id);
        if ($background) {
            $background->remove();
        }
        return redirect()->back();
    }

    public function set($id)
    {
        $background = Background::find($id);
        if ($background) {
            $background->set();
        }
        return redirect()->back();
    }
}
