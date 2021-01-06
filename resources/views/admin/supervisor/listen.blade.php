<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>评教系统听课页</title>
<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/plugins.css')}}">
<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/style4.css')}}">
<style type="text/css">
	body{
			margin: 0;
			padding-bottom: 70px;
		
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
	  height: 70px;
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
	
.card:active{
 transform: scale(1.02);
 box-shadow: 0 9px 47px 11px rgba(51, 51, 51, 0.18);
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
            <div class="logo d-flex align-items-center justify-content-center"> <a href="javascript:void(0)"> <h4 style="margin-top: 10px;margin-left: 45px;">听课计划</h4><strong class="logo_icon">  </strong> <span class="logo-default"> </span> </a> </div>
            <div class="right_detail">
              <div class="row d-flex align-items-center justify-content-end">
                <div class="col-xl-12 col-12 d-flex justify-content-end">
                  <div class="right_bar_top d-flex align-items-center"> 
                    
                    <!-- notification_Start -->
                    <div class="dropdown dropdown-notification"> 
                    @if($suminfo)
					<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> <i class="fa fa-bell"></i> <span class="badge_coun">{{$suminfo}}</span> </a>
					
                      <ul class="dropdown-menu scroll_auto height_fixed" >
                        <li class="bigger">
                          <h3><span class="bold">系统消息</span></h3>
                          <span class="notification-label">新消息 {{$suminfo}}</span> </li>
                        <li>
                     @elseif($suminfo==0)
                     <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> <i class="fa fa-bell"></i> <span class="badge_coun">{{$suminfo}}</span> </a>
					
                      <ul class="dropdown-menu scroll_auto height_fixed" >
                        <li class="bigger">
                          <h3><span class="bold">系统消息</span></h3>
                          <span class="notification-label">新消息 {{$suminfo}}</span> </li>
                        <li>        
                    @endif
                          <ul class="dropdown-menu-list">
                           @foreach($info as $new )
                            <li> <a href="javascript:void(0)"> <span class="details"> <span class="notification-icon blue-bgcolor"> <i class="fa fa-comments-o"></i> </span>{{$new->info}} </span> </a> </li>                         
                            @endforeach
                          </ul>
                        </li>
                      </ul>
                    </div>
                    <!-- notification_End --> 
                    
                    <!-- Dropdown_User -->
                    <div class="dropdown dropdown-user"> <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="true"> <img class="img-circle pro_pic" src="{{asset($img)}}" alt=""> </a>
                      <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                          <div class="user-panel">
                            <div class="user_image"> <img src="{{asset($img)}}" class="img-circle mCS_img_loaded" alt=""> </div>
                            <div class="info">
                              <p style="color: #000000;">{{session('user.dudao_name')}}（督导）</p>
                              <a href="#"  style="color: #000000;"> 教工号：{{session('user.dudao_id')}}</a> </div>
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
      <div class="user-panel">
        <div class="user_image"> <img src="{{asset($img)}}" class="img-circle mCS_img_loaded" alt=""> </div>
        <div class="info">
          <p style="color: #000000;">{{session('user.dudao_name')}}(督导)</p>
          <a href="#" style="color: #000000;"> <i class="fa fa-circle text-success" ></i> 在线</a> </div>
      </div>
      <ul id="dc_accordion" class="sidebar-menu tree">
         <li> <a href="{{url('admin/dindex')}}" class=" active"><img src="{{asset('resources/views/admin/style/img/csy.png')}}" style="padding-right:5px"><span>首页</span></a> </li>
        <li class="menu_sub"> <a href="#"> <img src="{{asset('resources/views/admin/style/img/cpost.png')}}" style="padding-right:5px"> <span>听课计划</span> <span class="badge badge-pill badge-danger float-right">New</span> </a>
          <ul class="down_menu">
            <li><a href="{{url('admin/dno')}}">已完成</a></li>
            <li><a href="{{url('admin/dyes')}}">未完成</a></li>
          </ul>
        </li>
              
        <li> <a href="{{url('admin/dyes')}}"><img src="{{asset('resources/views/admin/style/img/chistory.png')}}" style="padding-right:5px">评教历史<span class="ion ion-ios-arrow-forward styleicon"></span></a> </li>

      </ul>
    </div>
    <div class="content_wrapper bg_homebefore">
      <div class="container-fluid">
       
        <div class="content-bar"> 
         
         <div class="row">
			 
			 
			 <div class="col-md-6 col-lg-6 col-xl-3">
			   <div class="card text-white bg-primary m-b-30">
			     <div class="card-header">{{session('user.dudao_name')}}（督导）</div>
			     <div class="card-body">
			       <h5 class="card-title text-white">本学期主要任务：</h5>
			       <p class="card-text">听课并对听的课程进行评分</p>
				  
			     </div>
			   </div>
			 </div>
           <!-- Start col -->
           <div class="col-lg-12 col-xl-3">
			   <a href="#">
             <div class="card" style="margin-bottom: 20px;">
               <div class="card-body">
                 <div class="row">
                   <div class="col-12">
                     <div class="float-right"> <img src="{{asset('resources/views/admin/style/img/loading.png')}}" > </div>
                     <h3 class="text-info">当前学期听课进度</h3>
                     <p class="card-subtitle text-muted fw-500">2020-2021第一学期</p>
                   </div>
                   <div class="col-12">
                     <div class="progress mt-3 mb-1" style="height: 6px;">
                       <div class="progress-bar bg-info" role="progressbar" style="width:{{$process}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> </div>
                     </div>
                     <div class="text-muted f12"> <span>百分比</span> <span class="float-right">{{$process}}%</span> </div>
                   </div>
                 </div>
               </div>
             </div>
			 </a>
			 
			  <a href="{{url('admin/dno')}}">
             <div class="card m-b-20">
               <div class="card-body">
                 <div class="row align-items-center no-gutters">
                   <div class="col-8">
                     <p class="font-15">听课课程</p>
                     <h4 class="card-title mb-0 border-0">{{$selectsum}}</h4>
                   </div>
                   <div class="col-4 text-right"><img src="{{asset('resources/views/admin/style/img/weiwangc.png')}}" ></span> </div>
                 </div>
               </div>
             </div>
			 </a>
		 <a href="{{url('admin/deval')}}">
             <div class="card m-b-20">
               <div class="card-body">
                 <div class="row align-items-center no-gutters">
                   <div class="col-8">
                     <p class="font-15">待评教</p>
                     <h4 class="card-title mb-0 border-0">{{$nosum}}</h4>
                   </div>
                   <div class="col-4 text-right"><img src="{{asset('resources/views/admin/style/img/deval.png')}}" ></span> </div>
                 </div>
               </div>
             </div>
			 </a>			 
			 <a href="{{url('admin/dyes')}}">
             <div class="card m-b-20">
               <div class="card-body">
                 <div class="row align-items-center no-gutters">
                   <div class="col-8">
                     <p class="font-15">已完成听课</p>
                     <h4 class="card-title mb-0 border-0">{{$oksum}}</h4>
                   </div>
                   <div class="col-4 text-right"><img src="{{asset('resources/views/admin/style/img/yiwangc.png')}}" ></span> </div>
                 </div>
               </div>
             </div>
			 </a>			 
           </div>
        
         </div>
          
          <div class="row"> 
            <!-- End col --> 
          </div>
          <!-- End row --> 
          <!-- Start row -->
          <!-- <div class="row customers">
            
     
          
        </div>
        <!-- End Rightbar --> 
      </div>
    </div>
  </div>
</div>
<footer class="am-menu am-cf" >
	 <ul class="list-inline text-center" id="list">
    <div class="am-menu-column index" id="index">
      <li class="active">
		<a href="{{url('admin/dindex')}}">
        <span><img src="{{asset('resources/views/admin/style/img/frist1.png')}}" width="30px"></span>
      </a>
	  </li>
    </div>
    <div class="am-menu-column explore" id="explore">
		 <li>
      <a href="#">
        <span><img src="{{asset('resources/views/admin/style/img/add2.png')}}" width="30px"></span>
      </a>
	  </li>
    </div>
	
    <div class="am-menu-column life" id="life">
		 <li>
      <a href="{{url('admin/dnews')}}">
        <span><img src="{{asset('resources/views/admin/style/img/new2.png')}}" width="30px"></span>
      </a>
	   </li>
    </div>
    <div class="am-menu-column my" id="my">
		 <li>
      <a href="{{url('admin/dperson')}}">
        <span><img src="{{asset('resources/views/admin/style/img/user1.png')}}" width="30px"></span>
      </a>
	   </li>
    </div>
	</ul>
</footer>
</div>

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
<!--Custom Dashboard js --> 

<!--jquery js --> 
<script src="{{asset('resources/views/admin/style/js/custom.js')}}"></script>
<!-- <script src="js/buttom.js"></script> -->

</body>
</html>
