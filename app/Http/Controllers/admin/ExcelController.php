<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Schedule;
use Illuminate\Support\Facades\Storage;
use App\Http\Model\Sm183;

class ExcelController extends Controller
{
    //
    public function excel(){
        return view('admin.excel');
    }
    
    //Excel文件导入功能 By Laravel学院
    public function import(){
        $file = Input::file('file');
        $originalName = $file->getClientOriginalName(); // 文件原名
        $ext = $file->getClientOriginalExtension();     // 扩展名
        $realPath = $file->getRealPath();   //临时文件的绝对路径
        $type = $file->getClientMimeType();
        $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
        $path=$file->move('public','hh'); //文件路径改变 到项目public下     
       
        
        Excel::load($path,function ($reader)  { //Excel::load直接在本地项目找即：D：\wamp64\www\laravel
            
            $reader = $reader->getSheet(0);
            $data = $reader->toArray();
            
             for($i=1;$i<count($data);$i++){
                $student = array(
                   
                    'class_id'=>$data[$i][0],
                    'one'=>$data[$i][1],
                    'two'=>$data[$i][2],
                    'three'=>$data[$i][3],
                    'four'=>$data[$i][4],
                    'five'=>$data[$i][5], 
                    'six'=>$data[$i][6], 
                    
                );
                
                $res=Sm183::insert($student);
                
            } 
            
            
            
            
            
        });  
            
    }
}
