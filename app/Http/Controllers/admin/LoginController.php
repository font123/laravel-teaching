<?php
namespace App\Http\Controllers\admin;

require_once 'resources/views/org/code/Code.class.php';

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use App\Http\Model\User;
use App\Http\Model\Admin;
use App\Http\Model\Leader;
use App\Http\Model\Student;
use App\Http\Model\Teacher;


class LoginController extends Controller
{
    
      public function  login(){
        if($input = Input::all()){
            $code = new \Code();
            $_code = $code->get();
            if($_code==strtoupper($input['code'])){
                $power=$_POST["select"];
             if ($power==2){
                    $user = Leader::where('dudao_id',$input['username'])->get();
                    $isAuth = false;
                    foreach($user as $one){
                        if(Crypt::decrypt($one->dudao_password)==$input['password']){
                            $isAuth = true;
                            session(['user'=>$one]);
                            break;
                        }
                    }
                    if ($isAuth){
                        return redirect('admin/dindex');
                    }else{
                        return back()->with('msg','用户名或密码错误');
                    }
                }elseif ($power==3){
                    $user = Teacher::where('teacher_id',$input['username'])->get();
                    $isAuth = false;
                    foreach($user as $one){
                        if(Crypt::decrypt($one->teacher_password)==$input['password']){
                            $isAuth = true;
                            session(['user'=>$one]);
                            break;
                        }
                    }
                    if ($isAuth){
                        return redirect('admin/tclass');
                    }else{
                        return back()->with('msg','用户名或密码错误');
                    }
                }elseif ($power==4){
                    $user = Student::where('student_id',$input['username'])->get();
                    $isAuth = false;
                    foreach($user as $one){
                        if(Crypt::decrypt($one->student_password)==$input['password']){
                            $isAuth = true;
                            session(['user'=>$one]);
                            break;
                        }
                    }
                    if ($isAuth){
                        return redirect('admin/sclass');
                    }else{
                        return back()->with('msg','用户名或密码错误');
                    }
                }
                
                
            }else{
                return back()->with('msg','验证码错误');               
            }
        }else{
            return view('admin.login');
        }  
    }
    public function  code(){
        $code = new \Code;
        $code->make();
    }
    public function logout(){
        session(['user'=>null]);
        return Redirect('admin/login');
    } 
     
}
