<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\model\User;

class UserController extends Controller
{
    //
 
    public function index(){
    	$score = User::orderBy('id')->sum('score');
    	$total = User::count();
    	$mean = $score/$total;
    	
    	return view('admin.teacher.evluateresult',compact('total','mean'));
       
    }
    
}
