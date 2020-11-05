<?php

namespace App\Http\Controllers;

use App\Background;
use Illuminate\Http\Request;

/**
 * Class BackgroundController
 * @package App\Http\Controllers
 */
class BackgroundController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request){
        //file upload
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $background = new Background;
            $background->setImage($request->file('image'));
        }

        return redirect()->back();
    }

    /**
     * Delete background
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function delete($id){
        $background = Background::findOrFail($id);
        $background->remove();
        return redirect()->back();
    }

    /**
     * Set background to app config
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function set($id){
        $background = Background::findOrFail($id);
        $background->set();
        return redirect()->back();
    }
}
