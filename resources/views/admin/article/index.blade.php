@extends('layouts.admin')
@section('content')
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/index')}}">首页</a> &raquo;文章管理
    </div>
    <!--面包屑导航 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/article/create')}}"><i class="fa fa-plus"></i>新增文章</a>
                    <a href="{{url('admin/article')}}"><i class="fa fa-recycle"></i>全部文章</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">ID</th>
                        <th>标题</th>
                        <th>作者</th>
                        <th>点击次数</th>
                        <th>发布时间</th>
                        <th>操作</th>
                      
                    </tr>
                    @foreach ($data as $val)
                    <tr>
                        <td class="tc">{{$val->art_id}}</td>
                        <td >
                            <a href="#">{{$val->art_title}}</a>
                        </td>
                        <td>{{$val->art_author}}</td>
                        <td>{{$val->art_views}}</td>
                        <td>{{$val->art_time}}</td>                                
                        <td>
                            <a href="{{url('admin/article/'.$val['art_id'].'/edit')}}">修改</a>
                            <a href="javascript::" onclick="delArticle({{$val['art_id']}})">删除</a>
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
<<script type="text/javascript">
//删除分类
function delArticle(art_id){
	layer.confirm('您确定要删除该文章吗？',{
		btn:['确定','取消']
	},function(){
		$.ajax({
			type:"post",
			url:"{{url('admin/article/"+art_id+"')}}",
			data:{_token:'{{csrf_token()}}',_method:'delete',art_id:art_id},
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