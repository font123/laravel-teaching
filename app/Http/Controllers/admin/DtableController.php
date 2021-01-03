<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\http\model\Tsign;
use App\http\model\Tevaluate;
use App\http\model\Devaluate;
use App\Http\Model\Start;

class DtableController extends Controller
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
        $data_2 = Start::select('term')->get();
        $term = $data_2[0]->term;   //匹配学期
        $data = Tsign::find($id)->select('name')->get();
        $course_name = $data[count($data)-1]->name;
        $result = Devaluate::where('course_name',$course_name)
        ->where('user_id',session('user.dudao_id'))->where('term',$term)->get();
        
        if (count($result)>0){
            
            return back()->with('msg','该课程已完成评教!')->withInput();
            
        }else {
            
            $art = Tsign::find($id);
            return view('admin.supervisor.evaluatetable',compact('art'));
            
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
