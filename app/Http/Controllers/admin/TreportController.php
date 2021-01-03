<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\model\User;
use App\Http\Model\Sevaluate;
use Illuminate\Support\Facades\DB;
use App\http\model\Tevaluate;
use App\http\model\Devaluate;
use App\Http\Model\Desc;
use App\Http\Model\Start;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Student;

class TreportController extends Controller
{
    //
 
    public function index(){
        
        $input = Input::all(); 
        $course_name = $input['coursename'];
        //匹配授课班级总人数
        $class  = $input['class'];
        $limit1 = array('|');
        $limit2 = array('$|$');
        $str2 = str_replace($limit1, $limit2, $class);
        $arr1 = array_values(array_filter(explode('$', $str2)));
        $studentsum = 0;
        foreach ($arr1 as $k => $v) {
            if ($k % 2 == 0) {
                $sum = Student::where('student_class','like',$arr1[$k])->count();
                $studentsum=$studentsum+$sum;
            }           
        }
        
        $data = Sevaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$input['term'])->get();//匹配学生评教数据
        $tdata = Tevaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$input['term'])->get();//匹配同行评教数据
        $ddata = Devaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$input['term'])->get();//匹配督导评教数据
          if (count($data)>0 && count($ddata)>0){         
             //学生
             $score = $data->sum('scorce');//总分
             $sTotal = count($data);
             $mean = sprintf("%1\$.2f", $score/$sTotal);//平均分保留两位小数
             //同行
             if (count($tdata)>0){  
                 $Tscore = $tdata->sum('scorce');//总分
                 $Tmean = sprintf("%1\$.2f", $Tscore/count($tdata));//保留两位小数
             }else {                                //如果没有同行评教，就拿督导评教的分数作为同行评教分数
                 $Dscore = $ddata->sum('scorce');//总分
                 $Tmean = sprintf("%1\$.2f", $Dscore/count($ddata));//保留两位小数
             }                       
             //督导
             $Dscore = $ddata->sum('scorce');//总分
             $Dmean = sprintf("%1\$.2f", $Dscore/count($ddata));//保留两位小数
             
             //最终总分：学生占比60%，同行占比15%，督导占比15%
             $last = ($mean*0.6)+($Tmean*0.15)+($Dmean*0.15);
             $lastScore  = sprintf("%1\$.2f", $last);//保留两位小数 */
             
             //获取同行评教数据表的context字段值集合数组
             $tcontext = Tevaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$input['term'])->get(); 
             $dcontext = Devaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$input['term'])->get(); 
             $context = array_collapse([$tcontext,$dcontext]);                   
  
              $desc = Desc::where('college',session('user.college'))->where('term',$input['term'])->orderBy('score','desc')->get(); //获取排行榜数据表数据学院排序
              $majordesc = Desc::where('major',session('user.major'))->where('term',$input['term'])->orderBy('score','desc')->get(); //获取排行榜数据表数据同专业排序
              
              $process = sprintf("%1\$.2f", ($sTotal/$studentsum)*100);
              
              //不同学期的数据
              $diff = Desc::where('teacher_id',session('user.teacher_id'))->get();
              foreach ($diff as $k=>$val){
                  if (count($val)>3){
                  if($k==0){
                      $data_4 = Sevaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配学生评教数据
                      $tdata_4 = Tevaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配同行评教数据
                      $ddata_4 = Devaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配督导评教数据                                            
                          //学生
                          $score = $data_4->sum('scorce');//总分
                          $mean_4 = sprintf("%1\$.2f", $score/count($data_4));//保留两位小数                          
                          //同行
                          if (count($tdata_4)>0){
                              $Tscore = $tdata_4->sum('scorce');//总分
                              $Tmean_4 = sprintf("%1\$.2f", $Tscore/count($tdata_4));//保留两位小数
                          }else {                                //如果没有同行评教，就拿督导评教的分数作为同行评教分数
                              $Dscore = $tdata_4->sum('scorce');//总分
                              $Tmean_4 = sprintf("%1\$.2f", $Dscore/count($tdata_4));//保留两位小数
                          }                          
                          //督导
                          $Dscore = $ddata_4->sum('scorce');//总分
                          $Dmean_4 = sprintf("%1\$.2f", $Dscore/count($ddata_4));//保留两位小数
                          
                          //最终总分：学生占比60%，同行占比15%，督导占比15%
                          $last = ($mean_4*0.6)+($Tmean_4*0.15)+($Dmean_4*0.15);
                          $lastScore_4  = sprintf("%1\$.2f", $last);//保留两位小数
                          $colData = Desc::where('college',session('user.college'))->get();
                          $colTotal = $colData->sum('score');
                          $colMean_4 = sprintf("%1\$.2f", $colTotal/count($colData)); //学院平均分
                          
                          $majorData = Desc::where('major',session('user.major'))->get();
                          $majorTotal = $majorData->sum('score');
                          $majorMean_4 = sprintf("%1\$.2f", $majorTotal/count($majorData)); //专业平均分
                  }elseif ($k==1){
                      $data_3 = Sevaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配学生评教数据
                      $tdata_3 = Tevaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配同行评教数据
                      $ddata_3 = Devaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配督导评教数据                       
                          //学生
                          $score = $data_3->sum('scorce');//总分
                          $mean_3 = sprintf("%1\$.2f", $score/count($data_3));//保留两位小数                          
                          //同行
                          if (count($tdata_3)>0){
                              $Tscore = $tdata_3->sum('scorce');//总分
                              $Tmean_3 = sprintf("%1\$.2f", $Tscore/count($tdata_3));//保留两位小数
                          }else {                                //如果没有同行评教，就拿督导评教的分数作为同行评教分数
                              $Dscore = $ddata_3->sum('scorce');//总分
                              $Tmean_3 = sprintf("%1\$.2f", $Dscore/count($ddata_3));//保留两位小数
                          }                         
                          //督导
                          $Dscore = $ddata_3->sum('scorce');//总分
                          $Dmean_3 = sprintf("%1\$.2f", $Dscore/count($ddata_3));//保留两位小数
                          
                          //最终总分：学生占比60%，同行占比15%，督导占比15%
                          $last = ($mean_3*0.6)+($Tmean_3*0.15)+($Dmean_3*0.15);
                          $lastScore_3  = sprintf("%1\$.2f", $last);//保留两位小数
                          $colData = Desc::where('college',session('user.college'))->get();
                          $colTotal = $colData->sum('score');
                          $colMean_3 = sprintf("%1\$.2f", $colTotal/count($colData)); //学院平均分
                          
                          $majorData = Desc::where('major',session('user.major'))->get();
                          $majorTotal = $majorData->sum('score');
                          $majorMean_3 = sprintf("%1\$.2f", $majorTotal/count($majorData)); //专业平均分
                  }elseif ($k==2){
                      $data_2 = Sevaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配学生评教数据
                      $tdata_2 = Tevaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配同行评教数据
                      $ddata_2 = Devaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配督导评教数据                      
                          //学生
                          $score = $data_2->sum('scorce');//总分
                          $mean_2 = sprintf("%1\$.2f", $score/count($data_2));//保留两位小数                          
                          //同行
                          if (count($tdata_2)>0){
                              $Tscore = $tdata_2->sum('scorce');//总分
                              $Tmean_2 = sprintf("%1\$.2f", $Tscore/count($tdata_2));//保留两位小数
                          }else {                                //如果没有同行评教，就拿督导评教的分数作为同行评教分数
                              $Dscore = $ddata_2->sum('scorce');//总分
                              $Tmean_2 = sprintf("%1\$.2f", $Dscore/count($ddata_2));//保留两位小数
                          }                        
                          //督导
                          $Dscore = $ddata_2->sum('scorce');//总分
                          $Dmean_2 = sprintf("%1\$.2f", $Dscore/count($ddata_2));//保留两位小数
                          
                          //最终总分：学生占比60%，同行占比15%，督导占比15%
                          $last = ($mean_2*0.6)+($Tmean_2*0.15)+($Dmean_2*0.15);
                          $lastScore_2  = sprintf("%1\$.2f", $last);//保留两位小数
                          $colData = Desc::where('college',session('user.college'))->get();
                          $colTotal = $colData->sum('score');
                          $colMean_2 = sprintf("%1\$.2f", $colTotal/count($colData)); //学院平均分
                          
                          $majorData = Desc::where('major',session('user.major'))->get();
                          $majorTotal = $majorData->sum('score');
                          $majorMean_2 = sprintf("%1\$.2f", $majorTotal/count($majorData)); //专业平均分
                  }elseif ($k==3){
                      $data_1 = Sevaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配学生评教数据
                      $tdata_1 = Tevaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配同行评教数据
                      $ddata_1 = Devaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配督导评教数据                        
                          //学生
                          $score = $data_1->sum('scorce');//总分
                          $mean_1 = sprintf("%1\$.2f", $score/count($data_1));//保留两位小数                         
                          //同行
                          if (count($tdata_1)>0){
                              $Tscore = $tdata_1->sum('scorce');//总分
                              $Tmean_1 = sprintf("%1\$.2f", $Tscore/count($tdata_1));//保留两位小数
                          }else {                                //如果没有同行评教，就拿督导评教的分数作为同行评教分数
                              $Dscore = $ddata_1->sum('scorce');//总分
                              $Tmean_1 = sprintf("%1\$.2f", $Dscore/count($ddata_1));//保留两位小数
                          }                        
                          //督导
                          $Dscore = $ddata_1->sum('scorce');//总分
                          $Dmean_1 = sprintf("%1\$.2f", $Dscore/count($ddata_1));//保留两位小数
                          
                          //最终总分：学生占比60%，同行占比15%，督导占比15%
                          $last = ($mean_1*0.6)+($Tmean_1*0.15)+($Dmean_1*0.15);
                          $lastScore_1 = sprintf("%1\$.2f", $last);//保留两位小数
                          $colData = Desc::where('college',session('user.college'))->get();
                          $colTotal = $colData->sum('score');
                          $colMean_1 = sprintf("%1\$.2f", $colTotal/count($colData)); //学院平均分
                          
                          $majorData = Desc::where('major',session('user.major'))->get();
                          $majorTotal = $majorData->sum('score');
                          $majorMean_1 = sprintf("%1\$.2f", $majorTotal/count($majorData)); //专业平均分
                      }
                
              } elseif (count($val)<2){
                  if($k==0){
                      $data_4 = Sevaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配学生评教数据
                      $tdata_4 = Tevaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配同行评教数据
                      $ddata_4 = Devaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配督导评教数据
                      //学生
                      $score = $data_4->sum('scorce');//总分
                      $mean_4 = sprintf("%1\$.2f", $score/count($data_4));//保留两位小数
                      //同行
                      if (count($tdata_4)>0){
                          $Tscore = $tdata_4->sum('scorce');//总分
                          $Tmean_4 = sprintf("%1\$.2f", $Tscore/count($tdata_4));//保留两位小数
                      }else {                                //如果没有同行评教，就拿督导评教的分数作为同行评教分数
                          $Dscore = $tdata_4->sum('scorce');//总分
                          $Tmean_4 = sprintf("%1\$.2f", $Dscore/count($tdata_4));//保留两位小数
                      }
                      //督导
                      $Dscore = $ddata_4->sum('scorce');//总分
                      $Dmean_4 = sprintf("%1\$.2f", $Dscore/count($ddata_4));//保留两位小数   
                      if ($val->term == "2020-2"){                                                                    
                          //最终总分：学生占比60%，同行占比15%，督导占比15%
                          $last = ($mean_4*0.6)+($Tmean_4*0.15)+($Dmean_4*0.15);
                          $lastScore_4  = sprintf("%1\$.2f", $last);//保留两位小数
                          $colData = Desc::where('college',session('user.college'))->get();
                          $colTotal = $colData->sum('score');
                          $colMean_4 = sprintf("%1\$.2f", $colTotal/count($colData)); //学院平均分
                          
                          $majorData = Desc::where('major',session('user.major'))->get();
                          $majorTotal = $majorData->sum('score');
                          $majorMean_4 = sprintf("%1\$.2f", $majorTotal/count($majorData)); //专业平均分
                          
                          $lastScore_3 = 0; $colMean_3 = 0;$majorMean_3 = 0;
                          $lastScore_2 = 0;$colMean_2 = 0;$majorMean_2 = 0;
                          $lastScore_1 = 0;$colMean_1 = 0;$majorMean_1 = 0;
                      }elseif ($val->term == "2020-1"){ 
                          //最终总分：学生占比60%，同行占比15%，督导占比15%
                          $last = ($mean_4*0.6)+($Tmean_4*0.15)+($Dmean_4*0.15);
                          $lastScore_3  = sprintf("%1\$.2f", $last);//保留两位小数
                          $colData = Desc::where('college',session('user.college'))->get();
                          $colTotal = $colData->sum('score');
                          $colMean_3 = sprintf("%1\$.2f", $colTotal/count($colData)); //学院平均分
                          
                          $majorData = Desc::where('major',session('user.major'))->get();
                          $majorTotal = $majorData->sum('score');
                          $majorMean_3 = sprintf("%1\$.2f", $majorTotal/count($majorData)); //专业平均分
                          
                          $lastScore_4 = 0; $colMean_4 = 0;$majorMean_4 = 0;
                          $lastScore_2 = 0;$colMean_2 = 0;$majorMean_2 = 0;
                          $lastScore_1 = 0;$colMean_1 = 0;$majorMean_1 = 0;
                      }elseif ($val->term == "2019-2"){
                          //最终总分：学生占比60%，同行占比15%，督导占比15%
                          $last = ($mean_4*0.6)+($Tmean_4*0.15)+($Dmean_4*0.15);
                          $lastScore_2  = sprintf("%1\$.2f", $last);//保留两位小数
                          $colData = Desc::where('college',session('user.college'))->get();
                          $colTotal = $colData->sum('score');
                          $colMean_2 = sprintf("%1\$.2f", $colTotal/count($colData)); //学院平均分
                          
                          $majorData = Desc::where('major',session('user.major'))->get();
                          $majorTotal = $majorData->sum('score');
                          $majorMean_2 = sprintf("%1\$.2f", $majorTotal/count($majorData)); //专业平均分
                          
                          $lastScore_4 = 0; $colMean_4 = 0;$majorMean_4 = 0;
                          $lastScore_3 = 0;$colMean_3 = 0;$majorMean_3 = 0;
                          $lastScore_1 = 0;$colMean_1 = 0;$majorMean_1 = 0;
                      }elseif ($val->term == "2019-1"){
                          //最终总分：学生占比60%，同行占比15%，督导占比15%
                          $last = ($mean_4*0.6)+($Tmean_4*0.15)+($Dmean_4*0.15);
                          $lastScore_1  = sprintf("%1\$.2f", $last);//保留两位小数
                          $colData = Desc::where('college',session('user.college'))->get();
                          $colTotal = $colData->sum('score');
                          $colMean_1 = sprintf("%1\$.2f", $colTotal/count($colData)); //学院平均分
                          
                          $majorData = Desc::where('major',session('user.major'))->get();
                          $majorTotal = $majorData->sum('score');
                          $majorMean_1 = sprintf("%1\$.2f", $majorTotal/count($majorData)); //专业平均分
                          
                          $lastScore_4 = 0; $colMean_4 = 0;$majorMean_4 = 0;
                          $lastScore_2 = 0;$colMean_2 = 0;$majorMean_2 = 0;
                          $lastScore_3 = 0;$colMean_3 = 0;$majorMean_3 = 0;
                      }
                  }
                  
              } elseif (1<count($val) && count($val)<3){
                  if($k==0){
                      $data_4 = Sevaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配学生评教数据
                      $tdata_4 = Tevaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配同行评教数据
                      $ddata_4 = Devaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配督导评教数据
                      //学生
                      $score = $data_4->sum('scorce');//总分
                      $mean_4 = sprintf("%1\$.2f", $score/count($data_4));//保留两位小数
                      //同行
                      if (count($tdata_4)>0){
                          $Tscore = $tdata_4->sum('scorce');//总分
                          $Tmean_4 = sprintf("%1\$.2f", $Tscore/count($tdata_4));//保留两位小数
                      }else {                                //如果没有同行评教，就拿督导评教的分数作为同行评教分数
                          $Dscore = $tdata_4->sum('scorce');//总分
                          $Tmean_4 = sprintf("%1\$.2f", $Dscore/count($tdata_4));//保留两位小数
                      }
                      //督导
                      $Dscore = $ddata_4->sum('scorce');//总分
                      $Dmean_4 = sprintf("%1\$.2f", $Dscore/count($ddata_4));//保留两位小数
                          //最终总分：学生占比60%，同行占比15%，督导占比15%
                          $last = ($mean_4*0.6)+($Tmean_4*0.15)+($Dmean_4*0.15);
                          $lastScore_4  = sprintf("%1\$.2f", $last);//保留两位小数
                          $colData = Desc::where('college',session('user.college'))->get();
                          $colTotal = $colData->sum('score');
                          $colMean_4 = sprintf("%1\$.2f", $colTotal/count($colData)); //学院平均分
                          
                          $majorData = Desc::where('major',session('user.major'))->get();
                          $majorTotal = $majorData->sum('score');
                          $majorMean_4 = sprintf("%1\$.2f", $majorTotal/count($majorData)); //专业平均分                        
                  }elseif ($k==1){
                      $data_3 = Sevaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配学生评教数据
                      $tdata_3 = Tevaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配同行评教数据
                      $ddata_3 = Devaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配督导评教数据
                      //学生
                      $score = $data_3->sum('scorce');//总分
                      $mean_3 = sprintf("%1\$.2f", $score/count($data_3));//保留两位小数
                      //同行
                      if (count($tdata_3)>0){
                          $Tscore = $tdata_3->sum('scorce');//总分
                          $Tmean_3 = sprintf("%1\$.2f", $Tscore/count($tdata_3));//保留两位小数
                      }else {                                //如果没有同行评教，就拿督导评教的分数作为同行评教分数
                          $Dscore = $ddata_3->sum('scorce');//总分
                          $Tmean_3 = sprintf("%1\$.2f", $Dscore/count($ddata_3));//保留两位小数
                      }
                      //督导
                      $Dscore = $ddata_3->sum('scorce');//总分
                      $Dmean_3 = sprintf("%1\$.2f", $Dscore/count($ddata_3));//保留两位小数
                      
                      //最终总分：学生占比60%，同行占比15%，督导占比15%
                      $last = ($mean_3*0.6)+($Tmean_3*0.15)+($Dmean_3*0.15);
                      $lastScore_3  = sprintf("%1\$.2f", $last);//保留两位小数
                      $colData = Desc::where('college',session('user.college'))->get();
                      $colTotal = $colData->sum('score');
                      $colMean_3 = sprintf("%1\$.2f", $colTotal/count($colData)); //学院平均分
                      
                      $majorData = Desc::where('major',session('user.major'))->get();
                      $majorTotal = $majorData->sum('score');
                      $majorMean_3 = sprintf("%1\$.2f", $majorTotal/count($majorData)); //专业平均分
                  }
                  $lastScore_2 = 0;$colMean_2 = 0;$majorMean_2 = 0;
                  $lastScore_1 = 0;$colMean_1 = 0;$majorMean_1 = 0;
              }elseif (2<count($val) && count($val)<4){
                  if($k==0){
                      $data_4 = Sevaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配学生评教数据
                      $tdata_4 = Tevaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配同行评教数据
                      $ddata_4 = Devaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配督导评教数据
                      //学生
                      $score = $data_4->sum('scorce');//总分
                      $mean_4 = sprintf("%1\$.2f", $score/count($data_4));//保留两位小数
                      //同行
                      if (count($tdata_4)>0){
                          $Tscore = $tdata_4->sum('scorce');//总分
                          $Tmean_4 = sprintf("%1\$.2f", $Tscore/count($tdata_4));//保留两位小数
                      }else {                                //如果没有同行评教，就拿督导评教的分数作为同行评教分数
                          $Dscore = $tdata_4->sum('scorce');//总分
                          $Tmean_4 = sprintf("%1\$.2f", $Dscore/count($tdata_4));//保留两位小数
                      }
                      //督导
                      $Dscore = $ddata_4->sum('scorce');//总分
                      $Dmean_4 = sprintf("%1\$.2f", $Dscore/count($ddata_4));//保留两位小数
                      //最终总分：学生占比60%，同行占比15%，督导占比15%
                      $last = ($mean_4*0.6)+($Tmean_4*0.15)+($Dmean_4*0.15);
                      $lastScore_4  = sprintf("%1\$.2f", $last);//保留两位小数
                      $colData = Desc::where('college',session('user.college'))->get();
                      $colTotal = $colData->sum('score');
                      $colMean_4 = sprintf("%1\$.2f", $colTotal/count($colData)); //学院平均分
                      
                      $majorData = Desc::where('major',session('user.major'))->get();
                      $majorTotal = $majorData->sum('score');
                      $majorMean_4 = sprintf("%1\$.2f", $majorTotal/count($majorData)); //专业平均分
                  }elseif ($k==1){
                      $data_3 = Sevaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配学生评教数据
                      $tdata_3 = Tevaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配同行评教数据
                      $ddata_3 = Devaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配督导评教数据
                      //学生
                      $score = $data_3->sum('scorce');//总分
                      $mean_3 = sprintf("%1\$.2f", $score/count($data_3));//保留两位小数
                      //同行
                      if (count($tdata_3)>0){
                          $Tscore = $tdata_3->sum('scorce');//总分
                          $Tmean_3 = sprintf("%1\$.2f", $Tscore/count($tdata_3));//保留两位小数
                      }else {                                //如果没有同行评教，就拿督导评教的分数作为同行评教分数
                          $Dscore = $ddata_3->sum('scorce');//总分
                          $Tmean_3 = sprintf("%1\$.2f", $Dscore/count($ddata_3));//保留两位小数
                      }
                      //督导
                      $Dscore = $ddata_3->sum('scorce');//总分
                      $Dmean_3 = sprintf("%1\$.2f", $Dscore/count($ddata_3));//保留两位小数
                      
                      //最终总分：学生占比60%，同行占比15%，督导占比15%
                      $last = ($mean_3*0.6)+($Tmean_3*0.15)+($Dmean_3*0.15);
                      $lastScore_3  = sprintf("%1\$.2f", $last);//保留两位小数
                      $colData = Desc::where('college',session('user.college'))->get();
                      $colTotal = $colData->sum('score');
                      $colMean_3 = sprintf("%1\$.2f", $colTotal/count($colData)); //学院平均分
                      
                      $majorData = Desc::where('major',session('user.major'))->get();
                      $majorTotal = $majorData->sum('score');
                      $majorMean_3 = sprintf("%1\$.2f", $majorTotal/count($majorData)); //专业平均分
                  }elseif ($k==2){
                      $data_2 = Sevaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配学生评教数据
                      $tdata_2 = Tevaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配同行评教数据
                      $ddata_2 = Devaluate::where('teacher_id',session('user.teacher_id'))->where('course_name',$input['coursename'])->where('term',$val->term)->get();//匹配督导评教数据
                      //学生
                      $score = $data_2->sum('scorce');//总分
                      $mean_2 = sprintf("%1\$.2f", $score/count($data_2));//保留两位小数
                      //同行
                      if (count($tdata_2)>0){
                          $Tscore = $tdata_2->sum('scorce');//总分
                          $Tmean_2 = sprintf("%1\$.2f", $Tscore/count($tdata_2));//保留两位小数
                      }else {                                //如果没有同行评教，就拿督导评教的分数作为同行评教分数
                          $Dscore = $ddata_2->sum('scorce');//总分
                          $Tmean_2 = sprintf("%1\$.2f", $Dscore/count($ddata_2));//保留两位小数
                      }
                      //督导
                      $Dscore = $ddata_2->sum('scorce');//总分
                      $Dmean_2 = sprintf("%1\$.2f", $Dscore/count($ddata_2));//保留两位小数
                      
                      //最终总分：学生占比60%，同行占比15%，督导占比15%
                      $last = ($mean_2*0.6)+($Tmean_2*0.15)+($Dmean_2*0.15);
                      $lastScore_2  = sprintf("%1\$.2f", $last);//保留两位小数
                      $colData = Desc::where('college',session('user.college'))->get();
                      $colTotal = $colData->sum('score');
                      $colMean_2 = sprintf("%1\$.2f", $colTotal/count($colData)); //学院平均分
                      
                      $majorData = Desc::where('major',session('user.major'))->get();
                      $majorTotal = $majorData->sum('score');
                      $majorMean_2 = sprintf("%1\$.2f", $majorTotal/count($majorData)); //专业平均分
                  }
                  $lastScore_1 = 0;$colMean_1 = 0;$majorMean_1 = 0;
              }
            }
            return view('admin.teacher.result',compact('course_name','sTotal','mean','Tmean','Dmean','lastScore','context','desc','majordesc','studentsum','process',
                'lastScore_1','colMean_1','majorMean_1','lastScore_2','colMean_2','majorMean_2','lastScore_3','colMean_3','majorMean_3','lastScore_4','colMean_4','majorMean_4'));
          }else {
             return back()->with('msg','该课程暂未有评教数据!');
         }         
           
    }
    
}
