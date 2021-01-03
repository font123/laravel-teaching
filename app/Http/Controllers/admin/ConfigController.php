<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\http\model\Conf;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //显示全部配置项
        $data = Conf::orderBy('conf_id','desc')->paginate(2);
       // 遍历blog_conf数据表将配置内容以radio|input|textarea方式显示出来
       foreach ($data as $k=>$v){
           switch ($v->field_type){
               case 'input':
                   //增加一个数组元素用于存放配置内容
                   $data[$k]->_html = '<input type="text" class="lg" name="conf_content[]" value="'.$v->conf_content.'" >';
                   break;
               case 'textarea':
                   $data[$k]->_html = '<textarea name="conf_content[]">'.$v->conf_content.'</textarea>';
                   break;
               case 'radio':
                   $str = '';            
                   $arr = explode(',', $v->field_value);  
                   foreach($arr as $m=>$n){                      
                       $r = explode('|', $n);
                       $status = $v->conf_content==$r[0] ? 'checked':'';                       
                       $str .= '<input type="radio" name="conf_content[]" value="'.$r[0].'" '.$status.'>'.$r[1].'　';                       
                   }
                   $data[$k]->_html = $str;
                   break;
           }
       }
        return view("admin.confs.index",compact('data'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //创建配置项
        return view('admin.confs.add');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //提交添加配置项
        $input = Input::except('_token');
        $rules = [
            'conf_name'=>'required',
            'conf_title'=>'required',
        ];
        $message = [
            'conf_name.required'=>'配置项名称不能为空',
            'conf_title.required'=>'配置项标题不能为空',
        ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            $result = Conf::create($input);
            if($result){
                
                return redirect('admin/confs');
                
            }else{
                
                return back()->with('msg','添加配置项失败!');
                
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
    public function edit($conf_id)
    {
        //编辑配置项
        $conf = Conf::find($conf_id);
        return view('admin.confs.edit',compact('conf',$conf));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $conf_id)
    {
        //更新配置项
        $input = Input::except('_token','_method');
        $result = Conf::find($conf_id)->update($input);
        if($result){
            
            return redirect('admin/confs');
            
        }else{
            
            return back()->with('msg','更新配置项失败!');
            
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
        //删除配置项
        $input = Input::all();
        $res = Conf::where('conf_id',$input['conf_id'])->delete();//获取链接的conf_id
        $this->putConfigFile(); //调用putConfigFile()方法更新配置项文件
        if($res){
            $data = [
                'status'=>0,
                'msg'=>'配置项删除成功'
            ];
        }else {
            $data = [
                'status'=>1,
                'msg'=>'配置项删除失败'
            ];
        }
        return $data;
        
    }
    
    //排序
    public function changeOrder(){
        $input = Input::all();
        $conf = Conf::find($input['conf_id']);
        $conf->conf_order = $input['conf_order'];
        $result = $conf->update(); //调用putConfigFile()方法更新配置项文件
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
    
    //修改配置项内容
    public function changeConfig(){
        $input = Input::all();
        foreach ($input['conf_id'] as $k=>$v){
            Conf::where('conf_id',$v)->update(['conf_content'=>$input['conf_content'][$k]]);
        }
        $this->putConfigFile();
        return back()->with('msg','更新配置项成功！');
    }
    //将配置项内容写入文件myConfig.php
    public function putConfigFile(){
        $conf = Conf::pluck('conf_content','conf_name')->all();
        $path = base_path()."\config\myConfig.php"; //设置配置文件存放路径
        $str = "<?php return ".var_export($conf,true).";"; //设置配置文件格式，其中的var_export()方法可将数组转换为字符串
        file_put_contents($path, $str);  //利用file_put_content()写入文件
        //echo Config::get('myConfig.web_name'); //读取配置文件中的数据
    }
    
}
