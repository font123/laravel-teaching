<?php

namespace App\http\model;

use Illuminate\Database\Eloquent\Model;

class Tevaluate extends Model
{
    //
    protected $table = "tevluate";
    public $primaryKey = "id";
    public $timestamps = false;
    protected $guarded = [];
}
