<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Course;
use App\Http\Model\Result;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Sevaluate;
use App\Http\Model\Start;

class StableController extends Controller
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
       /*  //
       $score = $_POST["lab"];
       $result = Sevaluate::create($score); */
        
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
    public function edit($Scourse_id)
    {
        //
        
        $data = Course::find($Scourse_id);
        $course_name = $data->Scourse_name;
         $result = Sevaluate::where('course_name',$course_name)->where('student_id',session('user.student_id'))->get();
        $start = Start::orderBy('id')->get();
        $rad = $start[0]->status;

           if ($rad == 0){
             return back()->with('msg','评教未开始!')->withInput();
         }else {
             if (count($result)>0){
                 
                 return back()->with('msg','该课程已完成评教!')->withInput();
                 
             }else {
                 
                 $art = Course::find($Scourse_id);
                 return view('admin.student.evaluatetable',compact('art'));
                 
             }  
         } 
       
        
         
        
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
