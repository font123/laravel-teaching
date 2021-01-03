<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Nava extends Model
{
    //
    protected $table = 'nava';
    protected $primaryKey = 'nava_id';
    public $timestamps = false;
    protected $guarded = [];
}
