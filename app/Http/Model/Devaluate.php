<?php

namespace App\http\model;

use Illuminate\Database\Eloquent\Model;

class Devaluate extends Model
{
    //
    protected $table = "devluate";
    public $primaryKey = "id";
    public $timestamps = false;
    protected $guarded = [];
}
