<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    public function get_image_url(){
        return '/images/blogs/' . $this->image;
    }
}
