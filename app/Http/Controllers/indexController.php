<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class indexController extends Controller
{
    public function index(){
        return view('layouts');
    }
    public function linkdata(){
        $user = DB::table("student")->get();     
        return view("main",compact('user'));
    }
}
