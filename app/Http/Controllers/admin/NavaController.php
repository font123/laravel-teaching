<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Nava;
use Illuminate\Support\Facades\Validator;

class NavaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //显示全部导航
        $data = Nava::orderBy('nava_id','desc')->paginate(2);
        return view("admin.navas.index",compact('data'));
    }

    //排序
    public function changeOrder(){
        $input = Input::all();
        $nava = Nava::find($input['nava_id']);
        $nava->nava_order = $input['nava_order'];
        $result = $nava->update();
        if($result){
            $data = [
                'status'=>0,
                'msg'=>'排序更新成功'
            ];
        }else{
            $data = [
                'status'=>1,
                'msg'=>'排序更新失败'
            ];
        }
        return $data;
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //创建导航
        return view('admin.navas.add');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //提交添加导航
        $input = Input::except('_token');
        $rules = [
            'nava_name'=>'required',
            'nava_url'=>'required',
        ];
        $message = [
            'nava_name.required'=>'导航名称不能为空',
            'nava_url.required'=>'导航网址不能为空',
        ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            $result = Nava::create($input);
            if($result){
                
                return redirect('admin/navas');
                
            }else{
                
                return back()->with('msg','添加导航失败!');
                
            }
        }else{
            
            return back()->withErrors($validator);
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
    public function edit($nava_id)
    {
        //编辑导航
        $nava = Nava::find($nava_id);
        return view('admin.navas.edit',compact('nava',$nava));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nava_id)
    {
        //更新导航
        $input = Input::except('_token','_method');
        $result = Nava::find($nava_id)->update($input);
        if($result){
            
            return redirect('admin/navas');
            
        }else{
            
            return back()->with('msg','更新导航失败!');
            
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nava_id)
    {
        //删除导航
        $input = Input::all();
        $res = Nava::where('nava_id',$input['nava_id'])->delete();//获取导航的nava_id
        if($res){
            $data = [
                'status'=>0,
                'msg'=>'导航删除成功'
            ];
        }else {
            $data = [
                'status'=>1,
                'msg'=>'导航删除失败'
            ];
        }
        return $data;
        
    }
}
