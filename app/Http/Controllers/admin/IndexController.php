<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use App\Http\Model\User;
use App\Http\Model\Student;

class IndexController extends Controller
{
    //
    public function index(){
        return view('admin.index');
    }
    public function info(){
        return view('admin.info');
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
            return view('admin.pass');
        }
    }
 
}
