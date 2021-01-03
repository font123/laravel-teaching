<?php

namespace App\http\model;

use Illuminate\Database\Eloquent\Model;

class Tsign extends Model
{
    //
    protected $table = "tsign";
    public $primaryKey = "id";
    public $timestamps = false;
    protected $guarded = [];
}
