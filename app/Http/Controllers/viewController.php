<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class viewController extends Controller
{
    //
    public function index(){
        $student = array(
                        '张三','女','208','2018098787343',
                        '李四','女','208','2018098787323',
                        '小华','女','208','2018098787303',
                        '王五','女','208','2018098787335'
        );    
        return view('greeting',compact('student'));
    }
}
