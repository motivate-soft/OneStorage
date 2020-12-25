<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

/**
 * Class BlogController
 * @package App\Http\Controllers
 */
class BlogController extends Controller
{
    /**
     * Get a Blog using Id
     *
     * @param  $id
     * @return \App\Blog
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function get($id){
        $blog = Blog::findOrFail($id);
        return $blog;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $blog = Blog::create();
        $blog->setData($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $blog = Blog::where('_id', $id)->first();
        return view('news', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        $blog = Blog::find(isset($request->id) ?  $request->id : 0);
        $blog->setData($request);
        return redirect()->back();
    }

    /**
     * Delete blog using {$id}
     * @param $id
     * @return bool
     */
    public function delete($id){
        $blog = Blog::find($id);
        if($blog){
            $blog->delete();
            return true;
        }
        return false;
    }

    /**
     * Set blog as Promotion
     * @param $id
     * @param $column
     * @return bool
     */
    public function asPromotion($id, $column){
        $blog = Blog::find($id);
        if($blog){
            $blog->setAsPromotion($column);
            return true;
        }
        return false;
    }

    /**
     * Set blog promotion state
     * @param $id
     * @param $state
     * @return bool
     */
    public function setPromotion($id, $state){
        $blog = Blog::find($id);
        if($blog){
            $blog->setPromotion($state);
            return true;
        }
        return false;
    }
}
