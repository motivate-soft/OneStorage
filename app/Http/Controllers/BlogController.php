<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

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
        $blog->image = $blog->get_image_url();
        return $blog;
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
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->used_notibar = isset($request->usedNotiBar) &&  $request->usedNotiBar == "on";

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            echo $name;
            $destinationPath = public_path('/images/blogs');
            $image->move($destinationPath, $name);
            $blog->image = $name;
        }

        $blog->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
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
        if ($blog) {
            $blog->title = $request->title;
            $blog->content = $request->content;
            $blog->used_notibar = isset($request->usedNotiBar) &&  $request->usedNotiBar == "on";

            if ($request->hasFile('image')) {

                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/blogs');
                $image->move($destinationPath, $name);
                $blog->image = $name;
            }

            $blog->save();
        }
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
        $blog->delete();
        return true;
    }
}
