<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Taddok;
use App\http\model\Tsign;
use App\Http\Model\Teacher;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Http\Model\Tadd;
use App\http\model\Tevaluate;
use App\Http\Model\Start;

class TaddokController extends Controller
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
        
        $oksum = Tevaluate::where('user_id',session('user.teacher_id'))->where('term',$term)->count();     //已完成听课的课程数量
        
        $num = Teacher::where('teacher_name',session('user.teacher_name'))->select('listens')->get();
        $listens = $num[0]->listens;   //老师每学期应听的课程数量
        
        $data = Taddok::where('user_id',session('user.teacher_id'))->get();
        return view("admin.teacher.nocomplete",compact('data','oksum','listens'));
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
        $nowTime = Carbon::now()->toDateString();//当前时间
        
        $data_1 = Taddok::where('user_id',session('user.teacher_id'))->where('name',$input['coursename'])->get();
        $data_2 = Tsign::where('user_id',session('user.teacher_id'))->where('name',$input['coursename'])->get();
        
        
        if($input['teacher_id']==session('user.teacher_id')){
            return back()->with('msg','不能选择自己所授的课程!')->withInput();
        }elseif ($nowTime>$input['stop']){
            return back()->with('msg','该课程已停止听课!')->withInput();
        }
         elseif(count($data_1)>0)
        {
            return back()->with('msg','请勿重复提交!')->withInput();
            
        }elseif (count($data_2)>0){
            return back()->with('msg','请勿重复听同一门课!')->withInput();
        }
        else {
            $result=new Taddok();
            $result->name = $input['coursename'];
            $result->teacher=$input['teacher'];
            $result->teacher_id=$input['teacher_id'];
            $result->time=$input['time'];
            $result->place=$input['place'];
            $result->college=$input['college'];
            $result->start=$input['start'];
            $result->stop=$input['stop'];
            $result->term=$input['term'];
            $result->user_id=session('user.teacher_id');
            $bool=$result->save();
            if($bool){
                
                return redirect('admin/nplan');
                
            }else{
                
                echo '失败';
                
            }
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
        /* //取消听课
        $res = Taddok::where('id',$id)->delete();//获取文章的art_id
        if($res){
            return back()->with('msg','取消听课成功');
        }else {
            return back()->with('msg','取消听课失败');
        } */

    }
   
}
