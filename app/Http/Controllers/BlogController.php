<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use App\SeoTag;
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
        $blog = Blog::with('seoTag')->findOrFail($id);
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
      
        $input = $request->only(['seo_title', 'seo_description', 'seo_keyword', 'seo_content', 'alt_field']);
        
        $input['blog_id'] = $blog->id;

        $seoTag = SeoTag::create($input);
        

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $blog = Blog::with('seoTag')->where('_id', $id)->first();
        $seoTag = SeoTag::where('blog_id', $blog->id)->first();
        return view('news',['blog'=>$blog, 'seoTag'=>$seoTag]);
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

        if($request->id)
        {
            $input = $request->only(['seo_title', 'seo_description', 'seo_keyword', 'seo_content', 'alt_field']);
            $input['blog_id'] = $blog->id;
            SeoTag::updateOrCreate(['blog_id'=>$request->id], $input);    
        }
        
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

    public function getSeoTag()
    {
        $seoTag = SeoTag::find(1);

        return response()->json(['data'=>$seoTag]);
    }
}
