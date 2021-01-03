<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\http\model\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\http\model\Article;


class ArticleController extends CommController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //显示全部文章
        $data = Article::orderBy('art_id','desc')->paginate(2);
        return view("admin.article.index",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //创建文章
        $class_tree = (new Category())->tree();
        return view('admin.article.add')->with('class_tree',$class_tree);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //提交添加文章
        $input = Input::except('_token');
        $input['art_time'] = date("Y-m-d H:i:s");
        $rules = [
            'art_title'=>'required',
        ];
        $message = [
            'art_title.required'=>'文章标题不能为空',
        ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            $result = Article::create($input);
            if($result){
                
                return redirect('admin/article');
                
            }else{
                
                return back()->with('msg','添加文章失败!');
                
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
    public function edit($art_id)
    {
        //编辑文章
        $art = Article::find($art_id);
        $data = (new Category())->tree();
        return view('admin.article.edit',compact('art','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $art_id)
    {
        //更新文章
        $input = Input::except('_token','_method');
        $result = Article::find($art_id)->update($input);
        if($result){
            
            return redirect('admin/article');
            
        }else{
            
            return back()->with('msg','更新文章信息失败!');
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //删除文章
        $input = Input::all();
        $res = Article::where('art_id',$input['art_id'])->delete();//获取文章的art_id
        if($res){
            $data = [
                'status'=>0,
                'msg'=>'文章删除成功'
            ];
        }else {
            $data = [
                'status'=>1,
                'msg'=>'文章删除失败'
            ];
        }
        return $data;
   
    }
}
