<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Tadd extends Model
{
    protected $table = "tadd";
    public $primaryKey = "id";
    public $timestamps = false;
    protected $guarded = [];
}
