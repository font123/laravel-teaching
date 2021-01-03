<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class linkController extends Controller
{
    public function index(){
        $user = DB::select("select * from student where sex=?",['男']);
        return view("info",compact('user'));
    }
}
