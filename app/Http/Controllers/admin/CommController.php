<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CommController extends Controller
{
    //如何移动文件到指定文件夹
    public function upload(){
        $file = Input::file('Filedata');
        if($file -> isValid()){
            //检查一下上传的文件是否有效
            $clientName = $file -> getClientOriginalName(); //获取文件名称
            $tmpName = $file -> getFileName(); //缓存tmp类型文件夹职工的临时文件名
            $realPath = $file -> getrealPath(); //这个表示缓存在tmp文件夹下的文件的绝对路径
            $extension = $file -> getClientOriginalExtension(); //上传文件的后缀
            $mimeTye = $file -> getMimeType(); //图片类型 image/jpeg
            
            $newName = md5(date('ymdhis').$clientName).'.'.$extension;
            $path = $file -> move(app_path().'/storage/uploads',$newName);
            return "uploads/".$newName;
        }

     }
}
