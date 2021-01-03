<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Sevaluate;
use Illuminate\Support\Facades\Auth;
use App\http\model\Tevaluate;
use App\http\model\Devaluate;
use App\Http\Model\Desc;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Teacher;
use App\Http\Model\Start;


class SeresultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //评教结果数据保存到数据库
        $input = Input::all();
        $result=new Sevaluate();
        $result->student_id = session('user.student_id');//获取当前用户
        $result->scorce=$input["scorce"];
        $result->teacher_name=$input["teacher"];
        $result->course_name=$input["course"];
        $result->time=$input["time"];
        $result->place=$input["place"];
        $result->att=$input["att"];
        $result->con=$input["con"];
        $result->met=$input["met"];
        $result->eff=$input["eff"];
        $result->ord=$input["ord"];
        $result->act_time=$input["act_time"];
        $result->teacher_id=$input["teacher_id"];
        $result->college=$input["college"];
        $result->term=$input["term"];
        $bool=$result->save();
        
        
        $data = Sevaluate::where('teacher_id',$input["teacher_id"])->where('course_name',$input["course"])->where('term',$input["term"])->get();//匹配教师id
        $tdata = Tevaluate::where('teacher_id',$input["teacher_id"])->where('course_name',$input["course"])->where('term',$input["term"])->get();
        $ddata = Devaluate::where('teacher_id',$input["teacher_id"])->where('course_name',$input["course"])->where('term',$input["term"])->get();
        if (count($data)>0 && count($ddata)>0){
            //学生
            $score = $data->sum('scorce');//总分
            $mean = round($score/count($data),2); //平均分
            
            //同行
            if (count($tdata)>0){
                $Tscore = $tdata->sum('scorce');//总分
                $tmean = round($Tscore/count($tdata),2);
                $Tmean = sprintf("%1\$.2f", $tmean);//保留两位小数
            }else {                                //如果没有同行评教，就拿督导评教的分数作为同行评教分数
                $Dscore = $ddata->sum('scorce');//总分
                $dmean = round($Dscore/count($ddata),2);
                $Tmean = sprintf("%1\$.2f", $dmean);//保留两位小数
            }
            
            //督导
            $Dscore = $ddata->sum('scorce');//总分
            $dmean = round($Dscore/count($ddata),2);
            $Dmean = sprintf("%1\$.2f", $dmean);//保留两位小数
            
            //最终总分：学生占比60%，同行占比15%，督导占比15%
            $totalScore = round(($mean*0.6)+($Tmean*0.15)+($Dmean*0.15),2);
            //$lastScore保留两位小数,不足补0
            $lastScore = sprintf("%1\$.2f", $totalScore);
            
            $Timg = Teacher::where('teacher_id',$input["teacher_id"])->get();
            $photo = $Timg[0]->photo;
            $major = $Timg[0]->major;
            $save = Desc::where('teacher_id',$input["teacher_id"])->where('term',$input["term"])->get(); // 查询排行榜数据表是否已存在当前teacher_id的数据
            if (count($save)==0){             //如果不存在则保存，存在则更新
                $desc = new Desc();
                $desc->score=$lastScore;
                $desc->teacher_id=$input["teacher_id"];
                $desc->major=$major;
                $desc->teacher_name=$input["teacher"];
                $desc->college=$input["college"];
                $desc->photo=$photo;
                $desc->term=$input["term"];
                $desc->save();
            }else {
                Desc::where('teacher_id',$input["teacher_id"])->update(['score'=>$lastScore]);
            }
        
        }
        
                
            if($bool){
                return redirect('admin/shistory');
                
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
