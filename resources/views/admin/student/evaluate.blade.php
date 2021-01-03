<!DOCTYPE html>
<html>
   <head>
      <title>评教系统</title>
	   <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- 引入 Bootstrap -->
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
.tip{
 	text-align:center;
 	color:red;		 
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
            <div class="logo d-flex align-items-center justify-content-center"> <a href="javascript:void(0)"> <h4 style="margin-top: 10px;margin-left: 45px;">选择评教</h4><strong class="logo_icon">  </strong> <span class="logo-default"> </span> </a> </div>
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
                          <h3><span class="bold">Notifications</span></h3>
                          <span class="notification-label">新消息 {{$suminfo}}</span> </li>
                        <li>
                     @elseif($suminfo==0)
                     <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> <i class="fa fa-bell"></i> <span class="badge_coun">{{$suminfo}}</span> </a>
					
                      <ul class="dropdown-menu scroll_auto height_fixed" >
                        <li class="bigger">
                          <h3><span class="bold">Notifications</span></h3>
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
                              <p style="color: #000000;">{{session('user.student_name')}}(学生)</p>
                              <a href="#"  style="color: #000000;"> 学号：{{session('user.student_id')}}</a> </div>
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
<section class="list-wrap">
  <div class="container_full">
 
    <div class="side_bar scroll_auto">
    <div class="user-panel">
			  <div class="user_image"> <img src="{{asset('resources/views/admin/style/img/s.png')}}" class="img-circle mCS_img_loaded" alt=""> </div>
			  <div class="info">
			    <p style="color: #000000;"> 搜索课程</p>
			    
				</div>
			</div>
			
		<div class="col-lg-6">
			
		  <div class="card1" style="margin-bottom: 50px;">
		   
		      <form class="" action="#">
			  <div class="form-group">
			    <label style="color: #0069D9;">课程关键字</label>
			    <div>
			      <input type="text"  class="form-control" required placeholder="如:web" id="search-text" value=""/>
			    </div>
			   
			  </div>
		     <div class="form-group">
		       <div>
		         <button type="submit" class="btn btn-primary waves-light" id="research"> 搜索 </button> 
		         <a href="javascript:location.reload();"><button type="button" class="btn btn-light waves-effect m-l-5"> 取消 </button></a>
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
               @if(session('msg'))
                <div class="tip">
                <p>{{session('msg')}}</p>
                </div>
                @endif
               @foreach ($data as $val)
			   <ul id="lists" style="list-style: none;">
	 		  <li class="in">
			    <div class="card m-b-30">
			      <div class="card-header bg-primary-rgba">
			         <h5 class="card-title text-primary">{{$val['Scourse_college']}}</h5> 
			      </div>
			      <div class="card-body">
			        <h5 class="card-title font-18">{{$val['Scourse_name']}}</h5>
			        <p class="card-text" style="margin:0px 0px 0px 0px">授课教师：{{$val['Scourse_teacher']}}</p>
					<p class="card-text" style="margin:0px 0px 0px 0px">授课时间：{{$val->Scourse_time}}</p>
					<p class="card-text">授课地点：{{$val->Scourse_place}}</p>				
			        <a href="{{url('admin/stable/'.$val['Scourse_id'].'/edit')}}"><button type="submit" class="btn btn-primary" id="btn"><i class="feather icon-send mr-2"></i>评教</button></a>
			        </div>
			      <div class="card-footer bg-primary-rgba text-primary">在线评教 </div>
			    </div>
			    </li>
			    </ul>
			   @endforeach
		   	
		</div>
		  </div>
		</div>
        <div class="content-bar"> 
         
         <div class="row">
     
         </div>
          <div class="row"> 
            <!-- End col --> 
          </div>
          
          
        </div>
        <!-- End Rightbar --> 
      </div>
    </div>
   
  </div>
   </section>
	 
	
	<footer class="am-menu am-cf" >
	 <ul class="list-inline text-center" id="list">
    <div class="am-menu-column index" id="index">
      <li class="active">
		<a href="{{url('admin/sclass')}}">
        <span><img src="{{asset('resources/views/admin/style/img/frist1.png')}}" width="30px"></span>
      </a>
	  </li>
    </div>
    <div class="am-menu-column explore" id="explore">
		 <li>
      <a href="{{url('admin/sevaluate')}}">
        <span><img src="{{asset('resources/views/admin/style/img/evl2.png')}}" width="30px"></span>
      </a>
	  </li>
    </div>
	
    <div class="am-menu-column life" id="life">
		 <li>
      <a href="{{url('admin/snews')}}">
        <span><img src="{{asset('resources/views/admin/style/img/new2.png')}}" width="30px"></span>
      </a>
	   </li>
    </div>
    <div class="am-menu-column my" id="my">
		 <li>
      <a href="{{url('admin/sperson')}}">
        <span><img src="{{asset('resources/views/admin/style/img/user1.png')}}" width="30px"></span>
      </a>
	   </li>
    </div>
	</ul>
</footer>

</div>	 
	 
	 
	  
	 <script type="text/javascript">
	 	
	 		
	 </script>

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

<!-- NEW -->
<script src="{{asset('resources/views/admin/style/js/Chart.min.js')}}"></script> 
<!--sparkline chart--> 
<script src="{{asset('resources/views/admin/style/js/jquery.sparkline.js')}}"></script> 
<script src="{{asset('resources/views/admin/style/js/sparkline-init.js')}}"></script>

 <script type="text/javascript" src="{{asset('resources/views/admin/style/js/index.js')}}"></script>	
 
</body>
</html>