@extends('layouts.sperson')
@section('content')
<!DOCTYPE html>
<html>
   <head>
      <title>评教系统</title>
	   <meta charset="UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- 引入 Bootstrap -->
       <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
       
		<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/person.css')}}">
	  <style type="text/css">
	      body{
			  margin: 0;
			  padding-bottom: 70px;
			  
			  text-decoration:none;
		  }
		  a{
			  text-decoration:none;
			  }
	      .footer {
			  height: 11%;
	          border-top: 1px solid #EAFFEA;
	          color: #777;
	        
	         background-color: #76bbd8;
	      }
	     
			#list  li{
			  list-style:none;
			  display:inline-block;
			  /* margin:0px; */
			  padding:0px 12% 0px 12.7%; 
			  
			 
			  }
			  #list  li.active{
				  background-color: white;
			  }
		  .palne{
			  background-color: rgba(255,255,255,0.3);
			  margin-top: 15%;
		  }
		 .peo{
			 padding:1%;
		 }
		 .navbar{
		 		background-color: #76bbd8;
		 					
		 }
        .media{
			 background-color: #76bbd8;
			 border-radius: 10px;
			    padding: 6px; 
			    width: 100%;
				box-shadow: 2px 2px 4px #000000;	   
		      }
	  </style>
   </head>
   <body>
	<div class="navbar navbar-fixed-top">
	    <div class="container">
	        <div class="row footer-bottom">
	            
	           <ul class="list-inline text-center" id="list">
	           	    <h3 class ="text-center" style="color: white;">个人中心</h3>
	           </ul>
					
	        </div>
	    </div>
	</div>
	  
     <div class="palne">
		 <div class="peo">
		<a href="#"><span class="iconfont icon-icon-test center-block" style="font-size: 40px;width:50px;height: 50px;"></span></a>
		 	 
			  <p class ="text-center" style="color: white;">姓名:{{session('user.teacher_name')}}</p>
			   <p class ="text-center" style="color: white;">工号:{{session('user.teacher_id')}}</p>
		 </div>
       
     </div>
     
	 <div class="container" style="margin-top: 5%;">

	   <!-- 左对齐 -->
	   <div class="media">
	     <div class="media-left">
	       <a href="#"><span class="iconfont icon-cailiaozhidao" style="font-size: 30px;color:#b48bb5"></span></a>
	     </div>
	     <div class="media-body">
	           <h4 style="color: white;margin-left: 5%;">我的消息</h4>
	     </div>
		 
		 <div class="media-right">
		   <a href="#"><span class="iconfont icon-jiantou" style="font-size: 30px;color: white;"></span></a>
		 </div>
	   </div>
	   <hr>
	   
	   
	   <div class="media">
	     <div class="media-left">
	      
		   <a href="#"><span class="iconfont icon-hegui" style="font-size: 30px;color: #b48bb5;"></span></a>
	     </div>
	     <div class="media-body">
	         <h4 style="color: white;margin-left: 5%;">修改资料</h4>
	     </div>
		 <div class="media-right">
		   <a href="#"><span class="iconfont icon-jiantou" style="font-size: 30px;color: white;"></span></a>
		 </div>
	   </div>
	    <hr>
	
	   <div class="media">
	     <div class="media-left">
	   		   <a href="{{url('admin/logout')}}"><span class="iconfont icon-moban" style="font-size: 30px;color:#b48bb5"></span></a>
	     </div>
	     <div class="media-body">
	        <a href="{{url('admin/logout')}}"><h4 style="color: white;margin-left: 5%;">退出登录</h4></a>
	     </div>
		 
		 <div class="media-right">
		   <a href="{{url('admin/logout')}}"><span class="iconfont icon-jiantou" style="font-size: 30px;color: white;"></span></a>
		 </div>
	   </div>
	     
	   
	 </div>
		<hr style="border:none;border-top-width:50px;border-top-style:solid;border-top-color:rgba(118,187,216,0.5);;">
<div class="container" style="margin-buttom: 10%;">

	   <!-- 左对齐 -->
	   <div class="media">
	     <div class="media-left">
	       <a href="#"><span class="iconfont icon-shuju-shujuxueyuan-01" style="font-size: 30px;color:#b48bb5"></span></a>
	     </div>
	     <div class="media-body">
	           <a href="{{url('admin/nplan')}}"><h4 style="color: white;margin-left: 5%;">听课计划</h4></a>
	     </div>
		 
		 <div class="media-right">
		   <a href="#"><span class="iconfont icon-jiantou" style="font-size: 30px;color: white;"></span></a>
		 </div>
	   </div>
	   <hr>
	   
	   
	   <div class="media">
	     <div class="media-left">
	      
		   <a href="#"><span class="iconfont icon-tuisong-moxing-01" style="font-size: 30px;color: #b48bb5;"></span></a>
	     </div>
	     <div class="media-body">
	         <a href="{{url('admin/tsee')}}"><h4 style="color: white;margin-left: 5%;">评教结果</h4></a>
	     </div>
		 <div class="media-right">
		   <a href="#"><span class="iconfont icon-jiantou" style="font-size: 30px;color: white;"></span></a>
		 </div>
	   </div>
	    <hr>
	
	   
	     
	 </div>


	<div class="footer navbar-fixed-bottom">
	     <div class="container">
	         <div class="row footer-bottom">
	             <hr style="margin: 0px 0px 0px 0px;">
	            <ul class="list-inline text-center" id="list">
	            	<li class=""><a href="{{url('admin/tclass')}}"><span class="iconfont icon-B" style="font-size: 30px;"></span><p>首页</p></a></li>
	            	<li class=""><a href="{{url('admin/tlisten')}}"><span class="iconfont icon-gongzhang" style="font-size: 30px;"></span><p>听课</p></a></li>
	            	<li class="active"><a href="#"><span class="iconfont icon-yaoqing" style="font-size: 30px;"></span><p>我的</p></a></li>
	            </ul>
	         </div>
	     </div>
	 </div>
	 
	 <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	 
	 <script type="text/javascript">
	 	
			var li = document.querySelectorAll('#list li');
			
			    for (var i = 0; i < li.length; i++)
			
			        li[i].onclick = function () {
			
			            for (var i = 0; i < li.length; i++) li[i].className = '';
			
			            this.className='active'
			
			        }
	 </script>
      <!-- jQuery (Bootstrap 的 JavaScript 插件需要引入 jQuery) -->
       
     
   
	 
   </body>
</html>
@endsection