<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\http\model\Devaluate;
use App\http\model\Tsign;
use App\Http\Model\Tadd;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Leader;
use App\Http\Model\Start;

class DnoevalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data_2 = Start::select('term')->get();
        $term = $data_2[0]->term;   //匹配学期
        $data = Tsign::where('user_id',session('user.dudao_id'))->where('term',$term)->get();
        
        $result = Devaluate::where('user_id',session('user.dudao_id'))->where('term',$term)->get();  
        $oksum = count($result);     //已完成听课的课程数量
        
        $selectsum = Tadd::where('college',session('user.college'))->where('term',$term)->count();//可选择听课的课程数量
        
        $data_1 = Leader::where('dudao_id',session('user.dudao_id'))->select('photo')->get();
        $img = $data_1[0]->photo;
        
        
        return view('admin.supervisor.noeval',compact('data','oksum','selectsum','img'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = Input::all();
        //获取图片值;
        $file = Input::file('photo');
        
        if ($file) {
            /* $ext = $file->getClientOriginalExtension();     // 扩展名
             $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext; //时间戳生成唯一文件名
             $path=$file->move('signImg',$filename);//文件路径改变 到项目signImg下 */
            //获取当前文件的扩展名;
            $extension = $file->extension();
            //设置支持的文件格式;
            $allowed_extensions = array('jpg','jpeg','png','gif');
            
            // //判断图片文件格式是否支持;
            if ($extension &&  !in_array($extension, $allowed_extensions))
            {
                return ['error' => '上传的图片格式不支持(支持png,jpg,jpeg,gif等)'];
            }
            
            //一、转成base64
            $Info = getimagesize($file);
            $Info_data = fread(fopen($file,'r'), filesize($file));
            $base = base64_encode($Info_data);
            //二、存入数据库;
            $result = new Tsign();
            $result->photo = $base;
       
   
            $result->name = $input['coursename'];
            $result->teacher=$input['teacher'];
            $result->teacher_id=$input['teacher_id'];
            $result->time=$input['time'];
            $result->place=$input['place'];
            $result->college=$input['college'];
            $result->address=$input['address'];
            $result->term=$input['term'];
            $result->user_id=session('user.dudao_id');
            $bool=$result->save();
            if($bool){
                
                return redirect('admin/deval');
                
                
            }else{
                
                echo '失败';
                
            }  
        }else{
            return "未上传图片！";
        } 
   }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
