<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Tschedule;
use App\Http\Model\Tadd;
use App\Http\Model\Course;

class TseeController extends Controller
{
    //
    public function index(){
        $data = Course::where('teacher_id',session('user.teacher_id'))->get();
        return view("admin.teacher.see",compact('data'));
    }
}
