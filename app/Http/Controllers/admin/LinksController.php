<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\MOdel\links;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class linksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //显示全部友情链接
        $data = links::orderBy('link_id','desc')->paginate(2);
        return view("admin.links.index",compact('data'));
    }
    
    //排序
    public function changeOrder(){
        $input = Input::all();
        $link = links::find($input['link_id']);
        $link->link_order = $input['link_order'];
        $result = $link->update();
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
        //创建友情链接
        return view('admin.links.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //提交添加链接
        $input = Input::except('_token');
        $rules = [
            'link_title'=>'required',
            'link_name'=>'required',
            'link_url'=>'required',
        ];
        $message = [
            'link_title.required'=>'链接标题不能为空',
            'link_name.required'=>'链接名称不能为空',
            'link_url.required'=>'链接网址不能为空',
        ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            $result = links::create($input);
            if($result){
                
                return redirect('admin/links');
                
            }else{
                
                return back()->with('msg','添加链接失败!');
                
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
    public function edit($link_id)
    {
        //编辑链接
        $link = links::find($link_id);
        return view('admin.links.edit',compact('link',$link));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $link_id)
    {
        //更新链接
        $input = Input::except('_token','_method');
        $result = links::find($link_id)->update($input);
        if($result){
            
            return redirect('admin/links');
            
        }else{
            
            return back()->with('msg','更新链接失败!');
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除链接
        $input = Input::all();
        $res = links::where('link_id',$input['link_id'])->delete();//获取链接的link_id
        if($res){
            $data = [
                'status'=>0,
                'msg'=>'链接删除成功'
            ];
        }else {
            $data = [
                'status'=>1,
                'msg'=>'链接删除失败'
            ];
        }
        return $data;
        
    }

}
