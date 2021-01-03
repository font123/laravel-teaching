@extends('layouts.admin')
@section('content')
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/index')}}">首页</a> &raquo; <a href="{{url('admin/confs')}}">全部配置</a> &raquo; 修改配置
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/confs/create')}}"><i class="fa fa-plus"></i>新增配置</a>
                <a href="{{url('admin/confs')}}"><i class="fa fa-recycle"></i>全部配置</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
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
    <div class="result_wrap">
        <form action="{{url('admin/confs/'.$conf->conf_id)}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="put">
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th><i class="require">*</i>名称：</th>
                        <td>
                            <input type="text" name="conf_name" value="{{$conf->conf_name}}">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>标题：</th>
                        <td>
                            <input type="text" name="conf_title" value="{{$conf->conf_title}}">
                        </td>
                    </tr>
                    <tr>
                        <th>类型：</th>
                        <td>
                            <input type="radio" name="field_type" value="input" onclick="showOption()" @if($conf->filed_type=='input') checked @endif>input
                            <input type="radio" name="field_type" value="textarea" onclick="showOption()"  @if($conf->filed_type=='textarea') checked @endif>textarea
                            <input type="radio" name="field_type" value="radio" onclick="showOption()" @if($conf->filed_type=='radio') checked @endif>radio
                            <span><i class="fa fa-exclamation-circle yellow"></i>类型为input|textarea|radio</span>
                        </td>
                    </tr>
                    <tr class="field_value">
                        <th>类型值：</th>
                        <td>
                            <input type="text" name="field_value" value="{{$conf->field_value}}">
                            <span><i class="fa fa-exclamation-circle yellow"></i>当类型为radio,格式为:0|关闭,1|开启</span>
                        </td>
                    </tr>
                     <tr>
                        <th>排序：</th>
                        <td>
                            <input type="text" name="conf_order" value="{{$conf->conf_order}}">
                        </td>
                    </tr>
                    <tr>
                        <th>说明：</th>
                        <td>
                            <textarea rows="" cols="" name="conf_tips">{{$conf->conf_tips}}</textarea>
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
<script type="text/javascript">
//JS函数showOption()，用于将类型与类型值关联，只有当类型为radio时，才显示类型值输入框。
showOption();
function showOption(){
	var myOption = $("input[name=field_type]:checked").val();
	if(myOption=="radio"){
		$(".field_value").show();
	}else{
		$(".field_value").hide();
	}
}
</script>
@endsection
</html>