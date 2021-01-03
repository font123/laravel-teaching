<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Tadd;
use App\Http\Model\Taddok;
use App\Http\Model\Leader;
use App\http\model\Tsign;
use App\http\model\Tevaluate;
use App\http\model\Devaluate;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use App\Http\Model\Info;
use App\Http\Model\Start;

class DsupervisorController extends Controller
{
    //
    public function index(){
        $data = Leader::where('dudao_id',session('user.dudao_id'))->select('photo')->get();
        $img = $data[0]->photo;
        
        $info = Info::orderBy('id')->get(); 
        if(count($info)<0){
            $suminfo=0;
        }else {
            $suminfo = count($info);        
        }
        
        return view("admin.supervisor.index",compact('img','info','suminfo'));
    }
    
    public function person(){
        $data = Leader::where('dudao_id',session('user.dudao_id'))->select('photo')->get();
        $img = $data[0]->photo;
        return view("admin.supervisor.my",compact('img'));
    }
    
    public function news(){
        $data = Leader::where('dudao_id',session('user.dudao_id'))->select('photo')->get();
        $img = $data[0]->photo;
        
        $info = Info::orderBy('id')->get();
        if(count($info)<0){
            $suminfo=0;
        }else {
            $suminfo = count($info);
        }
        
        return view('admin.supervisor.news',compact('img','info','suminfo'));
    }
    
    public function listen(){
        $data_2 = Start::select('term')->get();
        $term = $data_2[0]->term;   //匹配学期
        $selectsum = Tadd::where('college',session('user.college'))->where('term',$term)->count();//可选择听课的课程数量
        $nosum = Tsign::where('user_id',session('user.dudao_id'))->where('term',$term)->count();    //已添加听课，但未完成听课的课程数量
        $oksum = Devaluate::where('user_id',session('user.dudao_id'))->where('term',$term)->count();     //已完成听课的课程数量
        
        $process = ($oksum/$selectsum)*100;   //完成听课的进度百分比
        
        $data = Leader::where('dudao_id',session('user.dudao_id'))->select('photo')->get();
        $img = $data[0]->photo;
        
        $info = Info::orderBy('id')->get();
        if(count($info)<0){
            $suminfo=0;
        }else {
            $suminfo = count($info);
        }
        
        return view("admin.supervisor.listen",compact('selectsum','nosum','oksum','process','selectsum','img','info','suminfo'));
    }
    
    public function info(){
        $data = Leader::where('dudao_id',session('user.dudao_id'))->get();
        return view('admin.supervisor.info',compact('data'));
    }
    
    public function nocom()
    {
        //
        $data_2 = Start::select('term')->get();
        $term = $data_2[0]->term;   //匹配学期
        $oksum = Devaluate::where('user_id',session('user.dudao_id'))->where('term',$term)->count();     //已完成听课的课程数量
        
        $data = Leader::where('dudao_id',session('user.dudao_id'))->select('photo')->get();
        $img = $data[0]->photo;
        
        $data_2 = Start::select('term')->get();
        $term = $data_2[0]->term;   //匹配学期
        $data = Tadd::where('college',session('user.college'))->where('term',$term)->orderBy('id','desc')->get();
        $selectsum = count($data);      //可选择听课的课程数量
        return view("admin.supervisor.nocomplete",compact('data','oksum','selectsum','img'));
    }

    
    public function pass(){
        if($input = Input::all()){
            $rules = [
                'password'=>'required|between:6,13',
            ];
            $message = [
                'password.required'=>'新密码不能为空',
                'password.between'=>'新密码必须在6-13位之间',
                
            ];
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                $user = Leader::where('dudao_name',session('user.dudao_name'))->first();
                $_password = Crypt::decrypt($user->dudao_password);
                if($input['password_o']==$_password){
                    if($input['password']==$input['password_a']){
                        $user->dudao_password = Crypt::encrypt($input['password']);
                        $user->save();
                        return back()->with('msg','新密码修改成功');
                    }else{
                        return back()->with('msg','两次输入密码不一致');
                    }
                    
                    
                }else{
                    return back()->with('msg','原密码错误');
                }
            }else{
                return back()->withErrors($validator);
            }
        }else{
            return view('admin.supervisor.pass');
        }
    }
    
    //修改头像
    public function upImg(Request $request){
        
        $file = Input::file('house_img_one1');
        if ($file) {
            //获取当前文件的扩展名;
            $extension = $file->extension();
            $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $extension; //时间戳生成唯一文件名
            $path=$file->move('headImg',$filename);//文件路径保存到项目headImg下
            
            //设置支持的文件格式;
            $allowed_extensions = array('jpg','jpeg','png','gif');
            
            // //判断图片文件格式是否支持;
            if ($extension &&  !in_array($extension, $allowed_extensions))
            {
                return ['error' => '上传的图片格式不支持(支持png,jpg,jpeg,gif等)'];
            }
            Leader::where('dudao_id',session('user.dudao_id'))->update(['photo'=>$path]);
            
        }else{
            return "未上传图片！";
        }
        
    } 
    
}
