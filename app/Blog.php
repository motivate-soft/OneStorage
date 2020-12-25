<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Helper\Helper;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Facades\App;

class Blog extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['title', 'content'];

    public static $IMAGE_PREFIX = '/images/blogs/';

    public function getTitleAttribute($value){
        if(!$value){
            return $this->_id;
        }
        return $value;
    }

    /**
     * @param $value
     * @return string
     */
    public function getImageAttribute($value){
        return static::$IMAGE_PREFIX . $value;
    }

    /**
     * @param $value
     * @return string
     */
    public function getThumbnailAttribute($value){
        return static::$IMAGE_PREFIX . $value;
    }

    /**
     * @param $value
     * @return string
     */
    public function getPromotionAttribute($value){
        return static::$IMAGE_PREFIX . $value;
    }

    /**
     * @param $value
     * @return \DateTime
     * @throws \Exception
     */
    public function getPublishDateAttribute($value){
        return new \DateTime($value);
    }

    /**
     * Save uploaded image and set url to model
     * @param Request $request
     * @param $attribute
     */
    public function setImage(Request $request, $attribute){
        if ($request->hasFile($attribute)) {
            $image = $request->file($attribute);
            $imgName = time() . Helper::getRandomString() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path(static::$IMAGE_PREFIX);
            $image->move($destinationPath, $imgName);
            $this[$attribute] = $imgName;
        }
    }

    /**
     * Set data to model for a request
     * @param $request
     */
    public function setData($request){
        $this->_id = $request->_id;
        //$this->title = $request->title;
        //$this->content = $request->content;
        $locale = App::getLocale();
        $this->update([
           $locale => [
               'title'  => $request->title,
               'content' => $request->content
           ]
        ]);

        $this->used_promotion = isset($request->usedPromition) &&  $request->usedPromition == "on";
        if(!$this->used_promotion){
            $this->as_promotion = false;
            $this->column = 0;
            $this->state = false;
        }

        $this->used_notify = isset($request->usedNotify) &&  $request->usedNotify == "on";
        $this->publish_date = $request->year . '/' . $request->month . '/' . $request->day;

        $this->setImage($request, "image");
        $this->setImage($request, "thumbnail");
        $this->setImage($request, "promotion");

        $this->save();
    }

    /**
     * Set this blog as promotion
     * @param int $column
     */
    public function setAsPromotion($column){
        $old = Blog::where('column', $column)->first();
        if($old){
            $old->as_promotion = false;
            $old->column = 0;
            $old->state = false;
            $old->save();
        }
        $this->as_promotion = true;
        $this->column = $column;
        $this->state = false;
        $this->save();
    }

    /**
     * Set this blog promotion state
     * @param $state
     */
    public function setPromotion($state){
        $this->state = $state;
        $this->save();
    }

    /**
     * Get {$count} latest newses
     * @param int $count
     * @return mixed
     */

    public static function getNewses($count = 0){
        $newses = Blog::orderBy('publish_date', 'desc')->orderBy('created_at', 'desc');
        if($count > 0){
            $newses = $newses->take($count)->get();
        }
        return $newses;
    }

    /**
     * Get Latest Notify News
     * @return mixed
     */
    public static function getLatestNotifyNews(){
        $latest_news = Blog::where('_id', '!=', null)
            ->where('used_notify', true)
            ->orderBy('publish_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->first();
        return $latest_news;
    }


    public function seoTag()
    {
        return $this->hasOne('App\SeoTag', 'blog_id');
    }
}
