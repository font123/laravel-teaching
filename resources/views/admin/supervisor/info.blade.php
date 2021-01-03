<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>个人信息</title>
<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/plugins.css')}}">
<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/style4.css')}}">
<!-- Favicon -->
<!-- <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico"> -->
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
<script src="{{asset('resources/views/admin/style/js/ajaxfileupload.js')}}"></script> 
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
	#dc_accordion li{
		
		height: 50px;
		margin-bottom: 1px;
		background-color: white;
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
       <div class="" style="margin-left: 10px;"> <a href="{{url('admin/dperson')}}" ><img src="{{asset('resources/views/admin/style/img/back.png')}}" ></a> </div>
            <div class="logo d-flex align-items-center justify-content-center"> <h4 style="margin-top: 10px;margin-right: 60px;">个人信息</h4></div>
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
  <div class="container_full">
   
    <div class="content_wrapper bg_homebefore">
      <div class="container-fluid">
        <div class="content-bar"> 
          <div class="row"> 
            <div class="col-lg-12 col-xl-3">
            @foreach($data as $val)
			  <ul id="dc_accordion" class="sidebar-menu tree" >
			    <li class="menu_sub" > <a href="#"> <span style="color: #6C757D;">头像</span> <img contentEditable="true" style="width: 20%;float: right;" src="{{asset($val->photo)}}" class="img-circle mCS_img_loaded" alt=""> </a>	    	
			    </li>
			  <li class="menu_sub"> <a href="#"> <span style="color: #6C757D;">用户名</span> <p contentEditable="true"  style="float: right;"><b>{{$val->dudao_name}}</b></p> </a>
			  </li>
			  <li class="menu_sub"> <a href="#"> <span style="color: #6C757D;">ID</span> <p contentEditable="true"   style="float: right;"><b>{{$val->dudao_id}}</b></p>   </a>
			  </li>
			    <li class="menu_sub"> <a href="#"> <span style="color: #6C757D;">所属学院</span><p  contentEditable="true"  style="float: right;"><b>{{$val->college}}</b></p>  </a>
			    </li>
				<li class="menu_sub"> <a href="#"> <span style="color: #6C757D;">身份</span><p   contentEditable="true"  style="float: right;"><b>督导</b></p> </a>
				</li> 
			  </ul>
			  @endforeach
            </div>
            <!-- End col --> 
			
			
          </div>
          <!-- End row --> 
          <!-- Start row -->
          <div class="row customers">
            
          </div>
          <!-- End row -->
          
        </div>
        <!-- End Rightbar --> 
      </div>
    </div>
  </div>
</div>


</body>
</html>
