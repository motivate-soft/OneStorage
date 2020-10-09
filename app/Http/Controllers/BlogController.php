<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Helper;



class BlogController extends Controller
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

    public function get($id)
    {
        $blog = Blog::find($id);
        return $blog;
    }

    private function saveImage($blog, $request, $name)
    {
        if ($request->hasFile($name)) {

            $image = $request->file($name);
            $imgName = time() . Helper::getRandomString() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/blogs');
            $image->move($destinationPath, $imgName);
            $blog[$name] = $imgName;
        }
    }

    private function setData($blog, $request)
    {
        if(!$blog){
            return;
        }
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->used_promotion = isset($request->usedPromition) &&  $request->usedPromition == "on";
        if(!$blog->used_promotion){
            $blog->as_promotion = false;
            $blog->column = 0;
            $blog->state = false;
        }

        $blog->used_notify = isset($request->usedNotify) &&  $request->usedNotify == "on";
        $blog->publish_date = $request->year . '/' . $request->month . '/' . $request->day;

        $this->saveImage($blog, $request, "image");
        $this->saveImage($blog, $request, "thumbnail");
        $this->saveImage($blog, $request, "promotion");

        $blog->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //file upload
        // $this->validate($request, [
        //     'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        $blog = new Blog;
        $this->setData($blog, $request);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $blog = Blog::find($id);
        return view('news', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $blog = Blog::find(isset($request->id) ?  $request->id : 0);
        $this->setData($blog, $request);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }

    public function delete($id)
    {
        $blog = Blog::find($id);
        if($blog){
            $blog->delete();
            return true;
        }
        return false;
    }

    public function asPromotion($id, $column)
    {
        $blog = Blog::find($id);
        if($blog){
            $old = Blog::where('column', $column)->first();
            if($old){
                $old->as_promotion = false;
                $old->column = 0;
                $old->state = false;
                $old->save();
            }
            $blog->as_promotion = true;
            $blog->column = $column;
            $blog->state = false;
            $blog->save();
            return true;
        }
        return false;
    }

    public function setPromotion($id, $state)
    {
        $blog = Blog::find($id);
        if($blog){
            $blog->state = $state;
            $blog->save();
            return true;
        }
        return false;
    }
}
