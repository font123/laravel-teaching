<?php

namespace App\http\model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table = "article";
    public $primaryKey = "art_id";
    public $timestamps = false;
    protected $guarded = [];
}
