<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Sevaluate extends Model
{
    protected $table = "sevluate";
    public $primaryKey = "id";
    public $timestamps = false;
    protected $guarded = [];
}