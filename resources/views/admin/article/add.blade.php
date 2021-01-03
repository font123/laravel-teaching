@extends('layouts.admin')
@section('content')
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/index')}}">首页</a> &raquo; <a href="{{url('admin/article')}}">文章管理</a> &raquo; 添加文章
    </div>
    <!--面包屑导航 结束-->

 <div class="result_wrap">
    <div class="result_title">
        @if(count($errors)>0)
        <div class="mark">
        @foreach($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
        </div>
        @endif
        @if(session('msg'))
        <div class="mark">
        <p>{{session('msg')}}</p>
        </div>
        @endif
    </div>
</div>
	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/article/create')}}"><i class="fa fa-plus"></i>新增文章</a>
                <a href="{{url('admin/article')}}"><i class="fa fa-recycle"></i>全部文章</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/confs')}}" method="post">
        {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120"><i class="require">*</i>文章分类：</th>
                        <td>
                            <select name="cate_id">
                                <option value="0">==顶级分类==</option>
                                 @foreach($class_tree as $class)
                                	<option value="{{$class['cate_id']}}">{{$class['seperator']}}{{$class['cate_name']}}</option>
                                @endforeach	
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>文章标题：</th>
                        <td>
                            <input type="text" class="lg" name="art_title">
                        </td>
                    </tr>
                    <tr>
                        <th>文章作者：</th>
                        <td>
                            <input type="text" name="art_author">
                        </td>
                    </tr>
                    <tr>
                        <th>缩略图：</th>
                        <td><input type="text" size=50 name="art_photo">
                        <input id="file_upload"  type="file" multiple="true">
                        	<script type="text/javascript" src="{{asset('resources/views/org/uploadify/jquery.uploadify.min.js')}}"></script>
                        	<link rel="stylesheet" type="text/css" href="{{asset('resources/views/org/uploadify/uploadify.css')}}">
                        	<style>
                            .uploadify{display:inline-block;}
                            .uploadify-button{border:none; border-radius:5px;margin-top:8px;}
                            table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}
                            </style>
                        	<script type="text/javascript">
							<?php $timestamp = time();?>
							$(function(){
								$('#file_upload').uploadify({
									'buttonText' : '上传图片',
									'formData'		: {
											'timestamp' : '<?php echo $timestamp;?>',
											'_token' : "{{csrf_token()}}"
										},
									'swf' : "{{asset('resources/views/org/uploadify/uploadify.swf')}}",
									'uploader' : "{{url('admin/upload')}}",
									//将uploadify上传的文件在指定位置显示出来
									'onUploadSuccess' : function(file, data, response) {
										$("input[name='art_photo']").val(data);
										$("#small_img").attr("src",'/laravel/app/storage/'+data);
									}
								});
							});
                        	</script>
                        </td>
                    </tr>
                    <tr>
                    	<th></th>
                    	<td>
                    		<img id="small_img" style="max-width: 200px;max-height:100px">
                    	</td>
                    </tr>
                    <tr>
                        <th>关键字：</th>
                        <td>
                            <input type="text" name="art_keywords">
                        </td>
                    </tr>
                    <tr>
                        <th>描述：</th>
                        <td>
                            <textarea name="art_description"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>详细内容：</th>
                        <td>
                            <script type="text/javascript" charset="utf-8" src="{{asset('resources/views/org/ueditor/ueditor.config.js')}}"></script>
                            <script type="text/javascript" charset="utf-8" src="{{asset('resources/views/org/ueditor/ueditor.all.min.js')}}"></script>
                            <script type="text/javascript" charset="utf-8" src="{{asset('resources/views/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                            <script type="text/plain" id="editor" name="art_content" style="width:800px;height:300px;"></script>
                            <style>
                             .edui-default{line-height:28px;}
                                div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                                {overflow: hidden; heifht:20px;}
                                div.edui-box{overflow: hidden; height:22px;}
                            </style>
                            <script type="text/javascript">
								var ue = UE.getEditor('editor');
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

</body>
@endsection
</html>