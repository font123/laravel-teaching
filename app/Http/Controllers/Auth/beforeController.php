<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class beforeController extends Controller
{
    public function head(){
        return '首页';
    }
    
    public function login(){
        return '注册';
    }
    
    public  function register(){
        return '登录';
    }
}
