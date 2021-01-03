<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Model\Student;
use Illuminate\Support\Facades\Crypt;
use App\Http\Model\Info;

class StudentController extends Controller
{
    //
    public function index(){
        $data = Student::where('student_id',session('user.student_id'))->select('photo')->get();
        $img = $data[0]->photo;
        
        $info = Info::orderBy('id')->get();
        if(count($info)<0){
            $suminfo=0;
        }else {
            $suminfo = count($info);
        }
        return view('admin.student.index',compact('img','info','suminfo'));
    }
    public function person(){
        $data = Student::where('student_id',session('user.student_id'))->select('photo')->get();
        $img = $data[0]->photo;
        
        return view('admin.student.my',compact('img'));
    }
    
    public function news(){
        $data = Student::where('student_id',session('user.student_id'))->select('photo')->get();
        $img = $data[0]->photo;
        
        $info = Info::orderBy('id')->get();
        if(count($info)<0){
            $suminfo=0;
        }else {
            $suminfo = count($info);
        }
        
        return view('admin.student.news',compact('img','info','suminfo'));
    }
    
    public function info(){
        $data = Student::where('student_id',session('user.student_id'))->get();
        return view('admin.student.info',compact('data'));
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
                $user = Student::where('student_name',session('user.student_name'))->first();
                $_password = Crypt::decrypt($user->student_password);
                if($input['password_o']==$_password){
                    if($input['password']==$input['password_a']){
                        $user->student_password = Crypt::encrypt($input['password']);
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
            return view('admin.student.pass');
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
            Student::where('student_id',session('user.student_id'))->update(['photo'=>$path]);
            
        }else{
            return "未上传图片！";
        }
        
    } 
}
