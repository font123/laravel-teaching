<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Taddok extends Model
{
    protected $table = "taddok";
    public $primaryKey = "id";
    public $timestamps = false;
    protected $guarded = [];
}
