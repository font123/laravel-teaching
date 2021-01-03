<?php

namespace App\Http\MOdel;

use Illuminate\Database\Eloquent\Model;

class links extends Model
{
    //
    protected $table = 'links';
    protected $primaryKey = 'link_id';
    public $timestamps = false;
    protected $guarded = [];
}
