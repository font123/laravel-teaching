<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Tadd;
use App\Http\Model\Taddok;
use App\http\model\Tsign;
use App\Http\Model\Teacher;
use App\Http\Model\Info;
use Illuminate\Support\Facades\Input;
use App\http\model\Tevaluate;
use App\Http\Model\Start;

class TlistenokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data_2 = Start::select('term')->get();
        $term = $data_2[0]->term;   //匹配学期
        
        $data = Tevaluate::where('user_id',session('user.teacher_id'))->where('term',$term)->get();     //已完成听课的课程数量
         $oksum =count($data);
        $data_1 = Teacher::where('teacher_name',session('user.teacher_name'))->select('listens')->get();
        $listens = $data_1[0]->listens;   //老师每学期应听的课程数量
        
        $info = Info::orderBy('id')->get();
       
        if(count($info)<0){
            $suminfo=0;
        }else {
            $suminfo = count($info);
            
        }
 
         return view("admin.teacher.complete",compact('data','oksum','listens')); 
       
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
        $result = new Tevaluate();     
        
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
        $result->user_id=session('user.teacher_id');
        $bool=$result->save();
        if($bool){
            
            Tsign::where('id', $input['evl_id'])->delete();
            return redirect('admin/yplan');                 
           
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
