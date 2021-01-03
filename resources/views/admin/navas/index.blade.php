@extends('layouts.admin')
@section('content')
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/index')}}">首页</a> &raquo;导航管理
    </div>
    <!--面包屑导航 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/navas/create')}}"><i class="fa fa-plus"></i>新增导航</a>
                    <a href="{{url('admin/navas')}}"><i class="fa fa-recycle"></i>全部导航</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                    	<th class="tc" width="5%">排序</th>
                        <th class="tc" width="5%">ID</th>
                        <th>导航名称</th>
                        <th>导航别名</th>
                        <th>导航网址</th>
                        <th>操作</th>
                      
                    </tr>
                    @foreach ($data as $val)
                    <tr>
                        <td class="tc">
                            <input type="text" onchange="changeOrder(this,{{$val['nava_id']}})" 
                            value="{{$val['nava_order']}}">
                        </td>
                        <td class="tc">{{$val['nava_id']}}</td>
                        <td >
                            <a href="#">{{$val['nava_name']}}</a>
                        </td>
                        <td>{{$val['nava_alias']}}</td>
                        <td>{{$val['nava_url']}}</td>                               
                        <td>
                            <a href="{{url('admin/navas/'.$val['nava_id'].'/edit')}}">修改</a>
                            <a href="javascript::" onclick="delNava({{$val['nava_id']}})">删除</a>
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
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->



</body>
<script type="text/javascript">
//修改排序
function changeOrder(obj,nava_id){
	var nava_order = $(obj).val();

	$.ajax({
		type:"post",
		url:"{{url('admin/navas/changeorder')}}",
		data:{_token:'{{csrf_token()}}',nava_order:nava_order,nava_id:nava_id},
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
function delNava(nava_id){
	layer.confirm('您确定要删除该导航吗？',{
		btn:['确定','取消']
	},function(){
		$.ajax({
			type:"post",
			url:"{{url('admin/navas/"+nava_id+"')}}",
			data:{_token:'{{csrf_token()}}',_method:'delete',nava_id:nava_id},
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