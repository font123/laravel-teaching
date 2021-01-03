<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = "pj";
    public $primaryKey = "id";
    public $timestamps = false;
    protected $guarded = [];
}
