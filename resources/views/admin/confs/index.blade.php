@extends('layouts.admin')
@section('content')
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/index')}}">首页</a> &raquo;全部配置
    </div>
    <!--面包屑导航 结束-->

<div class="result_wrap">
    <div class="result_title">
        @if(session('msg'))
        <div class="mark">
        <p>{{session('msg')}}</p>
        </div>
        @endif
    </div>
</div>
    <!--搜索结果页面 列表 开始-->
    
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/confs/create')}}"><i class="fa fa-plus"></i>新增配置</a>
                    <a href="{{url('admin/confs')}}"><i class="fa fa-recycle"></i>全部配置</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>
  
  	 <form action="{{url('admin/confs/changeconfig')}}" method="post">      
        <div class="result_wrap">
        {{csrf_field()}}
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                    	<th class="tc" width="5%">排序</th>
                        <th>名称</th>
                        <th>标题</th>
                        <th>内容</th>
                        <th>操作</th>
                      
                    </tr>
                    @foreach ($data as $val)
                    <tr>
                        <td class="tc">
                            <input type="text" onchange="changeOrder(this,{{$val['conf_id']}})" 
                            value="{{$val['conf_order']}}">
                        </td>                   
                        <input type="hidden" name="conf_id[]" value="{{$val['conf_id']}}">
                        <td >
                            <a href="#">{{$val->conf_name}}</a>
                        </td>
                        <td>{{$val->conf_title}}</td>
                        <td>{!!$val['_html']!!}</td>                               
                        <td>
                            <a href="{{url('admin/confs/'.$val['conf_id'].'/edit')}}">修改</a>
                            <a href="javascript::" onclick="delConf({{$val['conf_id']}})">删除</a>
                        </td>
                    </tr>
                    @endforeach
                </table>


                <style>
                     .result_content ul li span{padding:6px 12px;text-decoration:none}
                </style>
               <div class="page_list">
                	<ul>
						{{$data->links()}}
                	</ul>
                </div>
				<div class="btn_group">
					<input type="submit" value="提交">
                    <input type="button" class="back" onclick="history.go(-1)" value="返回">
				</div>

            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->



</body>
<script type="text/javascript">
//修改排序
function changeOrder(obj,conf_id){
	var conf_order = $(obj).val();

	$.ajax({
		type:"post",
		url:"{{url('admin/confs/changeorder')}}",
		data:{_token:'{{csrf_token()}}',conf_order:conf_order,conf_id:conf_id},
		success:function(data){
			if(data.status==0){
				layer.msg(data.msg, {icon: 6});
			}else{
				layer.msg(data.msg, {icon: 5});
			}
		}
	});
}
//删除分类
function delConf(conf_id){
	layer.confirm('您确定要删除该配置项吗？',{
		btn:['确定','取消']
	},function(){
		$.ajax({
			type:"post",
			url:"{{url('admin/confs/"+conf_id+"')}}",
			data:{_token:'{{csrf_token()}}',_method:'delete',conf_id:conf_id},
			success:function(data){
				if(data.status==0){
					location.href = location.href;
					layer.msg(data.msg, {icon: 6});
				}else{
					layer.msg(data.msg, {icon: 5});
				}
			   }
			});
		});
}
</script>
@endsection
</html>