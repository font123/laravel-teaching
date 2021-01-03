@extends('layouts.admin')
@section('content')
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/index')}}">首页</a> &raquo; <a href="{{url('admin/navas')}}">导航管理</a> &raquo; 添加导航
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
                <a href="{{url('admin/navas/create')}}"><i class="fa fa-plus"></i>新增导航</a>
                <a href="{{url('admin/navas')}}"><i class="fa fa-recycle"></i>全部导航</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/navas')}}" method="post">
        {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th><i class="require">*</i>导航名称：</th>
                        <td>
                            <input type="text" name="nava_name">
                            <input type="text" class="sm" name="nava_alias" value='导航别名'>
                        </td>
                    </tr>           
                    <tr>
                        <th><i class="require">*</i>导航网址：</th>
                        <td>
                            <input type="text" class="lg" name="nava_url">
                        </td>
                    </tr>
                     <tr>
                        <th>导航排序：</th>
                        <td>
                            <input type="text" name="nava_order">
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