<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Tschedule extends Model
{
    protected $table = "tschedule";
    public $primaryKey = "id";
    public $timestamps = false;
    protected $guarded = [];
}
