<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>评教系统评教历史页</title>
<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/plugins.css')}}">
<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/style4.css')}}">

<style type="text/css">
	body{
			margin: 0;
			padding-bottom: 50px;
			text-decoration:none;
	}
	.user-panel{
			width:100%; 
			height:; 
			FILTER: progid:DXImageTransform.Microsoft.Gradient(gradientType=0,startColorStr=# #e3eaef,endColorStr=#fafafa); /*IE*/ 
			background:-moz-linear-gradient(top, #e3eaef,#fafafa);/*火狐*/ 
			background:-webkit-gradient(linear, 0% 0%, 0% 100%,from( #e3eaef), to(#fafafa));/*谷歌*/ 
		 
			
			background-image: -webkit-gradient(linear,left bottom,left top,color-start(0,  #e3eaef),color-stop(1, #fafafa));/* Safari & Chrome*/
			filter:  progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=' #e3eaef', endColorstr='#fafafa'); /*IE6 & IE7*/
			-ms-filter: "progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=' #e3eaef', endColorstr='#fafafa')"; /* IE8 */

	}

	.am-menu {
	
	  position: fixed;
	  bottom: 0;
	  width: 100%;
	  background: white;
	  text-align: center;

	  overflow: hidden;
	  z-index: 98;
	  border-top: 1px solid #ddd;
	}
	
	.am-menu-column {
	  width: 25%;
	  float: left;
	  font-size:16px;
	  margin-top:15px;
	}
	
	/*new footer*/
	/*因为都是用的字体图标可能显示不出来，但是字体颜色会有变化*/
	.index i:before {
	  content: "\e602";
	  color: #999;
	}
	.explore i:before {
	  content: "\e607";
	  color: #999;
	}
	.life i:before {
	  content: "\e600";
	  color: #999;
	}
	.my i:before {
	  content: "\e605";
	  color: #999;
	}
	.index-active i:after {
	  content: "\e603";
	  color: #32B5E5;
	}
	.explore-active i:after {
	  content: "\e608";
	  color: #32B5E5;
	}
	.life-active i:after {
	  content: "\e601";
	  color: #32B5E5;
	}
	.my-active i:after {
	  content: "\e606";
	  color: #32B5E5;
	}
	
	
	.index a span,
	.explore a span,
	.life a span,
	.my a span {
	  display: block;
	  color: #999;
	}
	
	.index-active a span,
	.explore-active a span,
	.life-active a span,
	.my-active a span {
	  display: block;
	  color: #32b4e5;
	}
	
	
</style>
</head>

<body>
<!-- Pre Loader -->
<div id="dvLoading"></div>
<div class="wrapper"> 
  <!-- header -->
  <div class="header-bg">
    <header class="main-header">
      <div class="container_header phone_view border_top_bott">
        <div class="row">
          <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div class="menu-icon"> <a href="javascript:void(0)" class="menu-toggler sidebar-toggler"></a> </div>
            <div class="logo d-flex align-items-center justify-content-center"> <a href="javascript:void(0)"> <h4 style="margin-top: 10px;margin-left: 45px;">评教历史</h4><strong class="logo_icon">  </strong> <span class="logo-default"> </span> </a> </div>
            <div class="right_detail">
              <div class="row d-flex align-items-center justify-content-end">
                <div class="col-xl-12 col-12 d-flex justify-content-end">
                  <div class="right_bar_top d-flex align-items-center"> 
                    
                    <!-- notification_Start -->
                    <div class="dropdown dropdown-notification"> 
					<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> <i class="fa fa-bell"></i> <span class="badge_coun"> 6 </span> </a>
                      <ul class="dropdown-menu scroll_auto height_fixed" >
                        <li class="bigger">
                          <h3><span class="bold">Notifications</span></h3>
                          <span class="notification-label">新消息 6</span> </li>
                        <li>
                          <ul class="dropdown-menu-list">
                            <li> <a href="javascript:void(0)"> <span class="time">just now</span> <span class="details"> <span class="notification-icon deepPink-bgcolor"> <i class="fa fa-check"></i> </span>11111111 </span> </a> </li>
                            <li> <a href="javascript:void(0)"> <span class="time">3 mins</span> <span class="details"> <span class="notification-icon purple-bgcolor"> <i class="fa fa-user o"></i> </span> <b>2234 </b>333333 </span> </a> </li>
                            <li> <a href="javascript:void(0)"> <span class="time">7 mins</span> <span class="details"> <span class="notification-icon blue-bgcolor"> <i class="fa fa-comments-o"></i> </span> <b>44444 </b>44444 </span> </a> </li>
                            <li> <a href="javascript:void(0)"> <span class="time">12 mins</span> <span class="details"> <span class="notification-icon pink"> <i class="fa fa-heart"></i> </span> <b>5 </b>5555 </span> </a> </li>
                            <li> <a href="javascript:void(0)"> <span class="time">15 mins</span> <span class="details"> <span class="notification-icon yellow"> <i class="fa fa-warning"></i> </span> 警告 </span> </a> </li>
                            <li> <a href="javascript:void(0)"> <span class="time">10 hrs</span> <span class="details"> <span class="notification-icon red"> <i class="fa fa-times"></i> </span> 555555 </span> </a> </li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                    <!-- notification_End --> 
                    
                    <!-- Dropdown_User -->
                    <div class="dropdown dropdown-user"> <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="true"> <img class="img-circle pro_pic" src="{{asset('resources/views/admin/style/img/toux.png')}}" alt=""> </a>
                      <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                          <div class="user-panel">
                            <div class="user_image"> <img src="{{asset('resources/views/admin/style/img/toux.png')}}" class="img-circle mCS_img_loaded" alt=""> </div>
                            <div class="info">
                              <p style="color: #000000;"> {{session('user.dudao_name')}}（督导）</p>
                              <a href="#"  style="color: #000000;"> 学号：{{session('user.dudao_id')}}</a> </div>
                          </div>
                        </li>
                        <li> <a href="#"> <i class="icon-user"></i>简介 </a> </li>
                        <li> <a href="#"> <i class="icon-settings"></i> 设置 </a> </li>
                        <li> <a href="#"> <i class="icon-directions"></i> 帮助 </a> </li>
                        <li class="divider"></li>
                       
                        <li> <a href="{{url('admin/logout')}}"> <i class="icon-logout"></i> 退出登录 </a> </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
  </div>
  <!-- header_End --> 
  <!-- Content_right -->
  <div class="container_full">
    <div class="side_bar scroll_auto">
		<div class="col-lg-6">
			<div class="user-panel">
			  <div class="user_image"> <img src="{{asset('resources/views/admin/style/img/s.png')}}" class="img-circle mCS_img_loaded" alt=""> </div>
			  <div class="info">
			    <p style="color: #000000;"> 搜索历史记录</p>
			    
				 </div>
			</div>
		  <div class="card1" style="margin-bottom: 50px;">
		   
		      <form class="" action="#">
			  <div class="form-group">
			    <label style="color: #0069D9;">课程关键字</label>
			    <div>
			      <input type="text" id="pass2" class="form-control" required placeholder="如:web"/>
			    </div>
			   
			  </div>
		     <div class="form-group">
		       <div>
		         <button type="submit" class="btn btn-primary waves-light"> 搜索 </button>
		         <button type="reset" class="btn btn-light waves-effect m-l-5"> 取消 </button>
		       </div>
		     </div>
		    </form>
		  </div>
		</div>
     
	  
    </div>
    <div class="content_wrapper bg_homebefore">
      <div class="container-fluid">
       
		
		<div class="breadcrumbbar">
		  <!-- Start row -->
		  <div class="row">
			  
			<div class="col-md-6 col-lg-6 col-xl-4">
			@foreach($data as $val)
			  <div class="card m-b-30">
			    <div class="card-header bg-primary-rgba"  style="padding: 10px 0px 0px 20px;">
					<span>
			      <h5 class="card-title text-primary">{{$val->college}}</h5>
				 
				  </span>
			    </div>
			    <div class="card-body">
					<h5 class="card-title font-18">{{$val->course_name}}</h5>
			      <div class="row align-items-center no-gutters">
					  
			        <div class="col-8">
			         <p class="card-text" style="margin:0px 0px 0px 0px">授课教师：{{$val->teacher_name}}</p>
			         <p class="card-text" style="margin:0px 0px 0px 0px">授课时间：{{$val->time}}</p>
			         <p class="card-text">授课地点：{{$val->place}}</p>
					 <p  style="color: red; font-size: 15px;"><img src="{{asset('resources/views/admin/style/img/time.png')}}" >  评教时间：{{$val->act_time}} </p>
					 
			        </div>
					
			<div class="col-12">
				<hr >
				<ul id="dc_accordion" class="sidebar-menu tree">
				   <li class="menu_sub"> <a href="#"> <img src="{{asset('resources/views/admin/style/img/xian.png')}}" > <span>评教总分(分)：{{$val->scorce}}</span><span class="ti ti-angle-down styleicon"></span> </a>
				    <ul class="down_menu">
				      <li><div class="table-rep-plugin">
                 <div class="table-responsive" data-pattern="priority-columns">
                   <table class="table" >
                   	
                      <thead>
                         <tr>
						<th>教学态度(分)</th>
						<th>教学内容(分)</th>
                   		 <th>教学方法(分)</th>
                   		 <th>教学效果(分)</th>
                   		 <th>教学秩序(分)</th>
                         </tr>
                      </thead>
                      <tbody>
                         <tr>
                            <td>{{$val->att}}</td>
                            <td>{{$val->con}}</td>
                   		    <td>{{$val->met}}</td>
                   		    <td>{{$val->eff}}</td>
                   		    <td>{{$val->ord}}</td>
                         </tr>
                      </tbody>
                   </table>
                 </div>
               </div>
             </li>
				    </ul>
				  </li>
				 
				</ul>
           </div>
			        
			      <button type="button" class="btn btn-primary" style="margin-top: 10px;"><i class="feather icon-send mr-2"></i> 删除</button> </div>
			    
			  </div>
			</div>
			@endforeach
		  </div>
		</div>
        <div class="content-bar"> 
         
         <div class="row">
     
         </div>
          <div class="row"> 
            <!-- End col --> 
          </div>
          <!-- End row --> 
          <!-- Start row -->
          <!-- <div class="row customers">
            -->
          <!-- End row -->
          
        </div>
        <!-- End Rightbar --> 
      </div>
    </div>

  </div>
</div>
<footer class="am-menu am-cf" >
	<button type="button" class="btn btn-primary btn-lg btn-block" onclick="history.go(-1)">返回</button>
</footer>
</div>

<!-- NEW -->



<!--jquery js --> 
<script src="{{asset('resources/views/admin/style/js/jquery-min.js')}}"></script> 
<script src="{{asset('resources/views/admin/style/js/popper.min.js')}}"></script> 
<!--jquery js --> 
<script src="{{asset('resources/views/admin/style/js/bootstrap.min.js')}}"></script> 
<!--jquery js --> 
<script src="{{asset('resources/views/admin/style/js/plugins.js')}}"></script> 
<!--mCustomScrollbar js --> 
<script src="{{asset('resources/views/admin/style/js/jquery.mCustomScrollbar.concat.min.js')}}"></script> 
<!--Fontawesome js --> 
<script src="{{asset('resources/views/admin/style/js/fontawesome.js')}}"></script> 
<!--Dcjqaccordion js --> 
<script src="{{asset('resources/views/admin/style/js/jquery.dcjqaccordion.js')}}"></script> 
<!--Charts js --> 
<script src="{{asset('resources/views/admin/style/js/apexcharts.min.js')}}"></script> 

<script src="{{asset('resources/views/admin/style/js/custom.js')}}"></script> 


  <script src="{{asset('resources/views/admin/style/js/Chart.min.js')}}"></script>
<!--wizard initialization-->
<script src="{{asset('resources/views/admin/style/js/jquery.sparkline.js')}}"></script>
<script src="{{asset('resources/views/admin/style/js/sparkline-init.js')}}"></script>
</body>
</html>
