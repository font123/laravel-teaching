<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\http\model\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index(Request $request)
    {
        //1.获取当前页数
        if($request->has('page')){
            $curr_page = $request->input('page');
            $curr_page = $curr_page <= 0 ? 1:$curr_page;
        }else {
            $curr_page = 1;
        }
        
        //2.每页分类及偏移量
        $perPage = 5;
        $offset = ($curr_page-1)*$perPage;
        
        //3.将class_tree中的所有分类按页数分割，并统计总分类数
        $cate = new Category();
        $class_tree = $cate->tree();
        $items = array_slice($class_tree, $offset, $perPage);
        $total = count($class_tree);
        
        //4.手动创建分页并发送到视图
        $category = new LengthAwarePaginator($items, $total, $perPage, $curr_page,[
                'path'=>Paginator::resolveCurrentPath(),
                'pageName'=>'page',
        ]);
        //显示全部分类
        return view('admin.category.index')->with('data',$category);
    }
    
    //排序
    public function changeOrder(){
        $input = Input::all();
        $cate = Category::find($input['cate_id']);
        $cate->cate_order = $input['cate_order'];
        $result = $cate->update();
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
        //创建分类
        $data = (new Category())->tree();
        return view('admin.category.add')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //提交分类
        $input = Input::except('_token');
        $rules = [
                'cate_name'=>'required',
                'cate_title'=>'required',
                'cate_order'=>'required|numeric',
        ];
        $message = [           
                'cate_name.required'=>'分类名称不能为空',            
                'cate_title.required'=>'分类标题不能为空',
                'cate_order.required'=>'分类排序不能为空',
                'cate_order.numeric'=>'分类排序必须为数字',
        ]; 
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            $result = Category::create($input);
            if($result){
                
                return redirect('admin/category');
                
            }else{
                
                return back()->with('msg','添加分类失败!');
                
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
    public function edit($id)
    {
        //编辑分类
        $cate_info = Category::find($id);
        $class_tree = (new Category())->tree();
        return view('admin.category.edit')->with('cate_info',$cate_info)->with('class_tree',$class_tree);
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
        //更新分类
        $class_set = (new Category())->class_set($id);
        $input = Input::except('_token','_method');
        $flag = false;
        foreach ($class_set as $class_id){
            if($class_id==$input['cate_pid']){
                $flag = true;
            }
        }
        if($flag){
            return back()->with('msg','父级设置分类不合法！');
        }else {
            $rules = [
                'cate_name'=>'required',
                'cate_title'=>'required',
                'cate_order'=>'required|numeric',
            ];
            $message = [
                'cate_name.required'=>'分类名称不能为空',
                'cate_title.required'=>'分类标题不能为空',
                'cate_order.required'=>'分类排序不能为空',
                'cate_order.numeric'=>'分类排序必须为数字',
            ];
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                $result = Category::find($id)->update($input);
                if($result){
                    
                    return redirect('admin/category');
                    
                }else{
                    
                    return back()->with('msg','修改分类失败!');
                    
                }
            }else{
                
                return back()->withErrors($validator);
            }
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
        //删除分类
       $input = Input::all();
       $cate_set = array($input['cate_id']);
       $all_class = Category::orderBy('cate_order','asc')->get();//获取所有分类信息
       (new Category())->get_cate_set($input['cate_id'], $all_class, $cate_set);
       $flag = true;
       //遍历删除分类及其所以子类
       foreach ($cate_set as $cate){
           $result = Category::where('cate_id',$cate)->delete();
           if(!$result){
               $flag = false;           
           }
       }
       if($flag){
           $data = [
                    'status'=>0,
                    'msg'=>'分类删除成功'
           ];
       }else {
           $data = [
                   'status'=>1,
                   'msg'=>'分类删除失败'
           ];
       }
       return $data;
    }
    
}
