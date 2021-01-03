<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\http\model\Tsign;
use App\Http\Model\Leader;
use App\Http\Model\Taddok;
use App\Http\Model\Tadd;
use App\http\model\Devaluate;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Start;

class DlistenokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_2 = Start::select('term')->get();
        $term = $data_2[0]->term;   //匹配学期
        $data = Devaluate::where('user_id',session('user.dudao_id'))->where('term',$term)->get();
        
        $oksum = count($data);     //已完成听课的课程数量
        
        $selectsum = Tadd::where('college',session('user.college'))->where('term',$term)->count();//可选择听课的课程数量
        
        $data_1 = Leader::where('dudao_id',session('user.dudao_id'))->select('photo')->get();
        $img = $data_1[0]->photo;
          
        return view("admin.supervisor.complete",compact('data','oksum','selectsum','img'));
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
        //评教结果数据保存到数据库
        $input = Input::all();
        $result=new Devaluate();
        
        $result->scorce=$input["scorce"];
        $result->teacher_name=$input["teacher"];
        $result->teacher_id=$input["teacher_id"];
        $result->course_name=$input["course"];
        $result->time=$input["time"];
        $result->place=$input["place"];
        $result->att=$input["att"];
        $result->con=$input["con"];
        $result->met=$input["met"];
        $result->eff=$input["eff"];
        $result->ord=$input["ord"];
        $result->act_time=$input["act_time"];
        $result->college=$input["college"];
        $result->context=$input["context"];
        $result->photo=$input["photo"];
        $result->address=$input["address"];
        $result->term=$input["term"];
        $result->user_id=session('user.dudao_id');
        $bool=$result->save();
        if($bool){
            
            Tsign::where('id', $input["evl_id"])->delete();
             return redirect('admin/dyes');
            
        }else{
            
            echo '失败';
            
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
