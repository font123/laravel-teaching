<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Tadd;
use App\http\model\Tsign;
use App\Http\Model\Teacher;
use App\Http\Model\Taddok;
use App\http\model\Tevaluate;
use App\Http\Model\Start;

class TselectsController extends Controller
{
    //
    public function index(){

        $data_2 = Start::select('term')->get();
        $term = $data_2[0]->term;   //匹配学期
        
        $oksum = Tevaluate::where('user_id',session('user.teacher_id'))->where('term',$term)->count();     //已完成听课的课程数量
        
        $data = Teacher::where('teacher_name',session('user.teacher_name'))->select('listens')->get();
        $listens = $data[0]->listens;   //老师每学期应听的课程数量
        
        $data = Tadd::where('college',session('user.college'))->where('term',$term)->orderBy('id','desc')->get();
        return view('admin.teacher.selects',compact('data','oksum','listens'));
    }
    
    public function delete($id){
    
        $res = Taddok::where('id',$id)->delete();
        if($res){
            return back()->with('msg','取消听课成功');
            return view("admin.teacher.nocomplete");
        }else {
            return back()->with('msg','取消听课失败');
        }
    }
    
   
}
