<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreQuestionTranslation extends Model
{
    //
    protected $fillable = ['question', 'answer'];
    public $timestamps = false;
}
