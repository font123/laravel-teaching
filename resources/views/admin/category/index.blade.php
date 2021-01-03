@extends('layouts.admin')
@section('content')
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/index')}}">首页</a> &raquo;分类管理
    </div>
    <!--面包屑导航 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/category/create')}}"><i class="fa fa-plus"></i>新增分类</a>
                    <a href="{{url('admin/category')}}"><i class="fa fa-recycle"></i>全部分类</a>
                    <a href="{{url('admin/category')}}"><i class="fa fa-refresh"></i>更新排序</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%"><input type="checkbox" name=""></th>
                        <th class="tc">排序</th>
                        <th class="tc">ID</th>
                        <th>分类名称</th>
                        <th>标题</th>
                        <th>点击次数</th>
                        <th>操作</th>
                      
                    </tr>
                    @foreach ($data as $val)
                    <tr>
                        <td class="tc"><input type="checkbox" name="id[]" value="{{$val['cate_order']}}"></td>
                        <td class="tc">
                            <input type="text" name="ord[]" onchange="changeOrder(this,{{$val['cate_id']}})" value="{{$val['cate_order']}}">
                        </td>
                        <td class="tc">{{$val['cate_id']}}</td>
                        <td>
                            <a href="#">{{$val['seperator']}}{{$val['cate_name']}}</a>
                        </td>
                        <td>{{$val['cate_title']}}</td>
                        <td>{{$val['cate_view']}}</td>
                       
                        <td>
                            <a href="{{url('admin/category/'.$val['cate_id'].'/edit')}}">修改</a>
                            <a href="javascript::" onclick="delCate({{$val['cate_id']}})">删除</a>
                        </td>
                    </tr>
                    @endforeach
                </table>


                <style>
                     .result_content ul li span{padding:6px 12px;text-decoration:none}
                </style>
                <div class="page_list">
                	{!! $data->appends(request()->input())->render() !!}
                </div>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->



</body>
<<script type="text/javascript">
//修改排序
function changeOrder(obj,cate_id){
	var cate_order = $(obj).val();

	$.ajax({
		type:"post",
		url:"{{url('admin/cate/changeorder')}}",
		data:{_token:'{{csrf_token()}}',cate_order:cate_order,cate_id:cate_id},
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
function delCate(cate_id){
	layer.confirm('您确定要删除分类及其下所有子类吗？',{
		btn:['确定','取消']
	},function(){
		$.ajax({
			type:"post",
			url:"{{url('admin/category/"+cate_id+"')}}",
			data:{_token:'{{csrf_token()}}',_method:'delete',cate_id:cate_id},
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