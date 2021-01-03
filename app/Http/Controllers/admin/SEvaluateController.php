<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Course;
use SebastianBergmann\Environment\Console;
use App\Http\Model\Info;
use App\Http\Model\Student;
use App\Http\Model\Start;

class SEvaluateController extends Controller
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
        $data = Course::where('Scourse_class','like','%'.session('user.student_class').'%')->where('Scourse_term',$term)->get(); //模糊查找匹配班级、学期
        $info = Info::orderBy('id')->get();
        
        $data_1 = Student::where('student_id',session('user.student_id'))->select('photo')->get();
        $img = $data_1[0]->photo;
        
        if(count($info)<0){
            $suminfo=0;
        }else {
            $suminfo = count($info);
            
        }
        return view("admin.student.evaluate",compact('data','info','suminfo','img'));



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
