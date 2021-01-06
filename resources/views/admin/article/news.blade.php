<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>评教系统新闻页</title>
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
            <div class="logo d-flex align-items-center justify-content-center"> <a href="javascript:void(0)"> <h4 style="margin-top: 10px;margin-left: 45px;">轻院新闻</h4><strong class="logo_icon">  </strong> <span class="logo-default"> </span> </a> </div>
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
                              <p style="color: #000000;">{{session('user.teacher_name')}}（老师）</p>
                              <a href="#"  style="color: #000000;"> 教工号：{{session('user.teacher_id')}}</a> </div>
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
          <p style="color: #000000;">{{session('user.teacher_name')}}（老师）</p>
          <a href="#" style="color: #000000;"> <i class="fa fa-circle text-success" ></i> 在线</a> </div>
      </div>
      <ul id="dc_accordion" class="sidebar-menu tree">
        <li> <a href="index.html" class=" active"> <i class="ti-home"></i> <span>首页</span></a> </li>
        <li class="menu_sub"> <a href="#"> <i class="ti-blackboard"></i> <span>听课计划</span> <span class="ti ti-angle-down styleicon"></span></a>
          <ul class="down_menu">
            <li><a href="{{url('admin/yplan')}}">已完成</a></li>
            <li><a href="{{url('admin/nplan')}}">未完成</a></li>
          </ul>
        </li>
      
       <li> <a href="{{url('admin/tsee')}}"> <i class="icon-user"></i>评教报告 <span class="ion ion-ios-arrow-forward styleicon"></span></a> </li>
      	 <li> <a href="{{url('admin/yplan)}}"> <i class="icon-user"></i>评教历史<span class="ion ion-ios-arrow-forward styleicon"></span></a> </li>
      </ul>
    </div>
        <div class="content_wrapper bg_homebefore">
      <div class="container-fluid">
		
		<div class="breadcrumbbar">
		  <!-- Start row -->
		  <div class="row">
			  
		    <div class="col-md-5 col-lg-5">
				
		      <h4 class="page-title"><span><img src="{{asset('resources/views/admin/style/img/xinwen%20(1).png')}}" ></span>Hi,欢迎来看轻院新闻</h4>
		      <div class="breadcrumb-list">

		      </div>
		    </div>
		    <div class="col-md-4 col-lg-4 mr-0">
		      <div class="widgetbar">
		        <button class="btn btn-primary" style="width: 100%;"><i class="ri-refresh-line mr-2"></i>刷新</button>
		      </div>
		    </div>
		  </div>
		</div>
        <div class="content-bar"> 
         
         <div class="row">
           <div class="col-12">
             <div class="card">
               <div class="table-rep-plugin">
                 <div class="table-responsive" data-pattern="priority-columns">
                   <table id="tech-companies-1" class="table  table-striped">
                     <thead>
                       <tr>
                         <th>新闻标题</th>
                         <th data-priority="5">新闻时间</th>
                         <th data-priority="3">新闻地点</th>
						 <th data-priority="3">新闻简图</th>
   
                        
                       </tr>
                     </thead>
                     <tbody>
                       <tr>
                         <th>大功率通报</th>
                         <td>2020.11.13 周二2:12</td>
                         <td>宿舍区域</td>
                          <td>1</td>
                         
                       </tr>
                       <tr>
                         <th>社团活动</th>
                         <td>2020.11.13 周二2:12</td>
                         <td>图书馆</td>
                          <td>1</td>
                       </tr>
                       <tr>
                         <th>比赛</th>
                         <td>2020.11.13 周二2:12</td>
                         <td>图书馆</td>
                          <td ><img src="{{asset('resources/views/admin/style/img/girl_1.png')}}"  style="width:40px "></td>
                       </tr>
                       <tr>
                        
                       </tr>
                       <tr>
                         
                       </tr>
                       <tr>
                        
                       </tr>
                       <tr>
                         
                       </tr>
                       <!-- Repeat -->
                       <tr>
                         
                       </tr>
                       <tr>
                        
                       </tr>
                       <tr>
                         
                       </tr>
                       <tr>
                        
                       </tr>
                       <tr>
                         
                       </tr>
                       <tr>
                         
                       </tr>
                       <tr>
                        
                       </tr>
                       <!-- Repeat -->
                       <tr>
                        
                       </tr>
                       <tr>
                         
                       </tr>
                       <tr>
                        
                       </tr>
                       <tr>
                        
                       </tr>
                       <tr>
                         
                       </tr>
                       <tr>
                         
                       </tr>
                       <tr>
                         
                       </tr>
                       <!-- Repeat -->
                       <tr>
                         
                       </tr>
                       
                     </tbody>
                   </table>
                 </div>
               </div>
             </div>
           </div>
         </div>
          <div class="row"> 
            <!-- End col --> 
          </div>
    
          
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
		<a href="{{url('admin/tclass')}}">
        <span><img src="{{asset('resources/views/admin/style/img/frist1.png')}}" width="30px"></span>
      </a>
	  </li>
    </div>
    <div class="am-menu-column explore" id="explore">
		 <li>
      <a href="{{url('admin/tlisten')}}">
        <span><img src="{{asset('resources/views/admin/style/img/add1.png')}}" width="30px"></span>
      </a>
	  </li>
    </div>
	
    <div class="am-menu-column life" id="life">
		 <li>
      <a href="#">
        <span><img src="{{asset('resources/views/admin/style/img/new1.png')}}" width="30px"></span>
      </a>
	   </li>
    </div>
    <div class="am-menu-column my" id="my">
		 <li>
      <a href="{{url('admin/tperson')}}">
        <span><img src="{{asset('resources/views/admin/style/img/user1.png')}}" width="30px"></span>
      </a>
	   </li>
    </div>
	</ul>
</footer>

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
<!-- <script src="{{asset('resources/views/admin/style/js/custom-dashboard.js')}}"></script>  -->
<!--jquery js --> 
<script src="{{asset('resources/views/admin/style/js/custom.js')}}"></script> 

</body>
</html>
