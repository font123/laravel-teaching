<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>评教系统选择未听课完成页</title>
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
             <div class="logo d-flex align-items-center"><h4 style="margin-top: 10px;margin-left: 35px;">待听课</h4></div>
            <div class="right_detail">
              <div class="row d-flex align-items-center justify-content-end">
                <div class="col-xl-12 col-12 d-flex justify-content-end">
                  <div class="right_bar_top d-flex align-items-center"> 
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
			      <input type="text" class="form-control" required placeholder="如:web" id="search-text" value=""/>
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
    <div class="content_wrapper bg_homebefore" style="padding-top: 5px;">
      <div class="container-fluid">
    
		
		<div class="breadcrumbbar">
		  <!-- Start row -->
		  <div class="row">
			  
			  <div class="col-md-6 col-lg-6 col-xl-3">
			    <div class="card text-white bg-primary m-b-30">
			      <div class="card-header">{{session('user.dudao_name')}}（督导）</div>
			      <div class="card-body">
			         <h5 class="card-title text-white">本学期主要任务：</h5>
			       <p class="card-text">听课并对听的课程进行评分</p>
			  		 <p class="card-text"><i class="feather icon-send mr-2" style="color: red;"></i>已听课：{{$oksum}}</p>
					 <p class="card-text"><i class="feather icon-send mr-2" style="color: red;"></i>应听课：{{$selectsum}}</p>		 
			      </div>
			    </div>
			  </div>
			   <div class="col-md-6 col-lg-6 col-xl-3">
			 <div class="page-header">
			     <h5 style="color: #0069D9;">以下课程未完成听课
			        
			     </h5>
				 <hr >
			 </div>
			</div>
			  <div class="col-md-6 col-lg-6 col-xl-4">
			   @if(session('msg'))
                <div class="tip">
                <p>{{session('msg')}}</p>
                </div>
                @endif
			  @foreach($data as $val)
			  <form action="{{url('admin/dsign')}}" method="post">
			 {{csrf_field()}}
			  <ul id="lists" style="list-style: none;">
	 		  	<li class="in">
			    <div class="card m-b-30">
			      <div class="card-header bg-primary-rgba">
			        <h5 class="card-title text-primary">{{$val->college}}</h5>
			      </div>
			      <div class="card-body">
			        <h5 class="card-title font-18">{{$val->name}}</h5>
					<div class="row align-items-center no-gutters">
					  <div class="col-8">
					   <p class="card-text" style="margin:0px 0px 0px 0px">授课教师：{{$val->teacher}}</p>
					   <p class="card-text" style="margin:0px 0px 0px 0px">授课时间：{{$val->time}}</p>
					   <p class="card-text" style="margin:0px 0px 0px 0px">授课地点：{{$val->place}}</p>
					   <p class="card-text">起止时间：{{$val['start']}}至{{$val['stop']}}</p>
					   <input type="hidden" name="start" value="{{$val->start}}">
			          <input type="hidden" name="stop" value="{{$val->stop}}">
			          <input type="hidden" name="course_id" value="{{$val->id}}">
					  </div>
					  <div class="col-4 text-right"><img src="{{asset('resources/views/admin/style/img/btnn1.png')}}" style="width: 120px;"></span> </div>
					</div>
			       <div class="row align-items-center no-gutters">
			       <button type="submit" class="btn btn-primary"><i class="feather socicon-zapier mr-2"></i>签到</button>
			        
			        </div>
			        </div>
			      
			    </div>
			    </li>
			    </ul>
			    </form>
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
</div>
<footer class="am-menu am-cf" >
	<button type="button" class="btn btn-primary btn-lg btn-block" onclick="history.go(-1)">返回</button>
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

</script>
</html>
