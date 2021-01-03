<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\http\model\Tsign;
use App\http\model\Tevaluate;
use App\Http\Model\Tadd;
use App\Http\Model\Info;
use App\Http\Model\Teacher;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Taddok;
use App\Http\Model\Start;

class TnoevalController extends Controller
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
        
        $data = Tsign::where('user_id',session('user.teacher_id'))->where('term',$term)->get();
        
        $oksum = Tevaluate::where('user_id',session('user.teacher_id'))->where('term',$term)->count();    //已完成听课的课程数量
        
        $selectsum = Tadd::where('college',session('user.college'))->where('term',$term)->count();//可选择听课的课程数量
        $listen = Teacher::where('teacher_name',session('user.teacher_name'))->select('listens')->get();
        $listens = $listen[0]->listens;   //老师每学期应听的课程数量

        return view('admin.teacher.noeval',compact('data','oksum','selectsum','listens'));
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
            $result->user_id=session('user.teacher_id');
            $bool=$result->save();
            if($bool){
                
                Taddok::where('id', $input['signid'])->delete();
                return redirect('admin/teval');
                
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
