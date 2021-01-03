<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>排行榜</title>
<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/plugins.css')}}">
<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/style4.css')}}">
<!-- Favicon -->
<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/style5.css')}}">
<link rel="stylesheet" href="{{asset('resources/views/admin/style/font/icon1/iconfont.css')}}">

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
	
	
</style>
</head>

<body>
<!-- Pre Loader -->
<div id="dvLoading"></div>
<div class="wrapper" > 
  <!-- header -->
  <div class="header-bg">
    <header class="main-header">
      <div class="container_header phone_view border_top_bott">
        <div class="row">
          <div class="col-md-12 d-flex justify-content-between align-items-center">
            <div style="margin-top:0px;margin-left:12px;">
	             		<a href="javascript:window.history.go(-1)"><span class="iconfont icon-fanhui" style="font-size: 30px;color: #000;"></span></a>
	             	</div>
            <div class="logo d-flex align-items-center justify-content-center"> <a href="javascript:void(0)"> <h4 style="margin-top: 10px;padding-right:132px;">排行榜</h4></a> </div>
            
          </div>
        </div>
      </div>
    </header>
  </div>
  <!-- header_End --> 
  <!-- Content_right -->
  <div class="container_full">
    
    <article class="leaderboard">
    @foreach($desc as $k => $val)
    @if($k==0)
      <header>
    	<div id="">
    		  <img src="{{asset($val->photo)}}" style=" width:375px ;" >
    	</div>
    
        <h1 class="leaderboard__title"><span class="leaderboard__title--top">{{$val->teacher_name}}占领了封面</span><span class="leaderboard__title--bottom">第{{$val->term}}学期</span> <img src="{{asset('resources/views/admin/style/img/荣誉.png')}}" style="width: 80px;margin-left: 30px;margin-top: 20px;" ></h1>
      
      </header>
      @endif
       @endforeach
      <main class="leaderboard__profiles">
		
		 @foreach($desc as $k => $val)
		 @if($val->teacher_id==session('user.teacher_id'))
		 <article class="leaderboard__profile" style="margin-bottom:20px;">   		
    		<img src="{{asset($val->photo)}}" alt="" class="leaderboard__picture">
              <span class="leaderboard__name">{{$val->teacher_name}}<span style="color: #35d8ac">(我)</span></span>
              <span class="leaderboard__value">{{$val->score}}<span>分</span> <span>第{{$k+1}}名</span></span>             
              </article>

              @endif
        @endforeach
		 @foreach($desc as $k => $val)
		  
    	
         	 @if($k==0)
         	 <article class="leaderboard__profile">
    	    <img src="{{asset('resources/views/admin/style/img/名次1.png')}}" class="leaderboard__picture1" >
    	    <img src="{{asset($val->photo)}}" alt="" class="leaderboard__picture">
          <span class="leaderboard__name">{{$val->teacher_name}}</span>
          <span class="leaderboard__value">{{$val->score}}<span>分</span><span>第{{$k+1}}名</span></span>
            </article>
    	    @endif
			@if($k==1)
			<article class="leaderboard__profile">
			<img src="{{asset('resources/views/admin/style/img/名次2.png')}}" class="leaderboard__picture1" >
			<img src="{{asset($val->photo)}}" alt="" class="leaderboard__picture">
          <span class="leaderboard__name">{{$val->teacher_name}}</span>
          <span class="leaderboard__value">{{$val->score}}<span>分</span><span>第{{$k+1}}名</span></span>
            </article>
			@endif
			@if($k==2)
			<article class="leaderboard__profile">
			<img src="{{asset('resources/views/admin/style/img/名次3.png')}}" class="leaderboard__picture1" >
			<img src="{{asset($val->photo)}}" alt="" class="leaderboard__picture">
          <span class="leaderboard__name">{{$val->teacher_name}}</span>
          <span class="leaderboard__value">{{$val->score}}<span>分</span><span>第{{$k+1}}名</span></span>
            </article>
			@endif
			       
        @endforeach
   
      </main>
      </article>
    </div>
    
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

<script src="{{asset('resources/views/admin/style/js/custom.js')}}"></script> 

<!-- <script src="js/buttom.js"></script> -->

</body>
</html>
