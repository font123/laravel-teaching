<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>评教系统选择听课签到页</title>
<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/plugins.css')}}">
<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/style4.css')}}">
<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.4.3&key=393c4fcefc5bc2e6162abeb63ccf0314"></script>
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
#iCenter{width:300px; height: 280px; border:1px #000 solid;margin:20px auto;}
	
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
            <div class="logo d-flex align-items-center justify-content-center"> <a href="javascript:void(0)"> <h4 style="margin-top: 10px;margin-left: 45px;">签到听课</h4><strong class="logo_icon">  </strong> <span class="logo-default"> </span> </a> </div>
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
                    <div class="dropdown dropdown-user"> <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="true"> <img class="img-circle pro_pic" src="{{asset('resources/views/admin/style/img/girl_1.png')}}" alt=""> </a>
                      <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                          <div class="user-panel">
                            <div class="user_image"> <img src="{{asset('resources/views/admin/style/img/girl_1.png')}}" class="img-circle mCS_img_loaded" alt=""> </div>
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
    <div class="content_wrapper bg_homebefore">
      <div class="container-fluid">
       
		
		<div class="breadcrumbbar">
		  <!-- Start row -->
		  <div class="row">
			  <div class="col-md-12">
			    <div class="card">
			      <h4 class="m-t-0 header-title"></h4>
			      <p class="text-muted m-b-30 font-13" ><img src="{{asset('resources/views/admin/style/img/sign.png')}}" style="margin-left: 10px;">请完善以下签到信息完成签到 </p>
			      <div class="pull-in">
			        <form id="basic-form" action="{{url('admin/deval')}}" method="post" enctype="multipart/form-data">
			        	{{csrf_field()}}
			          <div>
			            <h3>基本课程信息</h3>
			            <section>
			              <div class="form-group clearfix">
			                <label class="control-label " for="userName" >学院</label>
			                <div class="">
			                  <input class="form-control required" id="college" name="college" type="text" value="{{$art->college}}" readonly="readonly">
			                </div>
			              </div>
			              <div class="form-group clearfix">
			                <label class="control-label " for="password"> 课程名称</label>
			                <div class="">
			                  <input id="password" name="coursename" type="text" class="required form-control" value="{{$art->name}}" readonly="readonly">
			                </div>
			              </div>
						  <div class="form-group clearfix">
						    <label class="control-label " for="confirm">授课教师</label>
						    <div class="">
						      <input id="confirm" name="teacher" type="text" class="required form-control" value="{{$art->teacher}}" readonly="readonly">
						    </div>
						  </div>
			              <div class="form-group clearfix">
			                <label class="control-label " for="confirm">授课时间</label>
			                <div class="">
			                  <input id="confirm" name="time" type="text" class="required form-control" value="{{$art->time}}" readonly="readonly">
			                </div>
			              </div>
						  <div class="form-group clearfix">
						    <label class="control-label " for="confirm">授课地点</label>
						    <div class="">
						      <input id="confirm" name="place" type="text" class="required form-control" value="{{$art->place}}" readonly="readonly">
						    </div>
						  </div>
		
			            </section>
			          <h3>位置定位</h3>
			            
			            <section>
			            
			              <div class="form-group clearfix">
			                <div id="iCenter"></div>
			                <div id="locationInfo">定位中...</div>
			                <input type="hidden" id="addresstext" name="address" value="">
			              </div>
			            </section>
			            
			            <h3>上传听课图片</h3>
			            <section>
			              <div class="form-group clearfix">
			                
			                   <div class="layui-form-item" style="width: 100px">
                                  <label class="layui-form-label">图片地址</label>
                                  <div class="layui-input-block">
                                      <input type="hidden" id="img_url" value="{{ csrf_token() }}">
                                      <input type="file"  id="img_file" name="photo">                            
                    				</div>
			                   </div> 
			               
			              </div>
			              <input id="confirm" name="signid" type="hidden" value="{{$art->id}}">
			              <input name="teacher_id" type="hidden" value="{{$art->teacher_id}}">
			              <input type="hidden" name="term" value="{{$art->term}}">
			            </section>
			           
			          </div>
			        </form>
			      </div>
			    </div>
			  </div>
			   
			  <div class="col-md-6 col-lg-6 col-xl-4">
			    
			  </div>
		    
			
			<div class="col-md-6 col-lg-6 col-xl-4">
			  
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
</div>
<footer class="am-menu am-cf" >
	<button type="button" class="btn btn-primary btn-lg btn-block" onclick="history.go(-1)">返回</button>
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

<script src="{{asset('resources/views/admin/style/js/custom.js')}}"></script> 


  <script src="{{asset('resources/views/admin/style/js/jquery.steps.min.js')}}"></script>
<!--wizard initialization-->
<script src="{{asset('resources/views/admin/style/js/jquery.wizard-init.js')}}"></script>
<script type="text/javascript">
	
	 var mapObj = new AMap.Map('iCenter',{
		 mapStyle: 'amap://styles/macaron', 
		 zoom:10
	 });
	    mapObj.plugin('AMap.Geolocation', function () {
	        geolocation = new AMap.Geolocation({
	            enableHighAccuracy: true, // 是否使用高精度定位，默认:true
	            timeout: 10000,           // 超过10秒后停止定位，默认：无穷大
	            maximumAge: 0,            // 定位结果缓存0毫秒，默认：0
	            convert: true,            // 自动偏移坐标，偏移后的坐标为高德坐标，默认：true
	            showButton: true,         // 显示定位按钮，默认：true
	            buttonPosition: 'LB',     // 定位按钮停靠位置，默认：'LB'，左下角
	            buttonOffset: new AMap.Pixel(10, 20), // 定位按钮与设置的停靠位置的偏移量，默认：Pixel(10, 20)
	            showMarker: true,         // 定位成功后在定位到的位置显示点标记，默认：true
	            showCircle: true,         // 定位成功后用圆圈表示定位精度范围，默认：true
	            panToLocation: true,      // 定位成功后将定位到的位置作为地图中心点，默认：true
	            zoomToAccuracy:true      // 定位成功后调整地图视野范围使定位位置及精度范围视野内可见，默认：false
	        });
	        mapObj.addControl(geolocation);
	        geolocation.getCurrentPosition();
	        AMap.event.addListener(geolocation, 'complete', onComplete); // 返回定位信息
	        AMap.event.addListener(geolocation, 'error', onError);       // 返回定位出错信息
	    });

	    function onComplete(obj){
	        var res = '经纬度：' + obj.position + 
	                '\n精度范围：' + obj.accuracy + 
	                '米\n定位结果的来源：' + obj.location_type + 
	                '\n状态信息：' + obj.info + 
	                '\n地址：' + obj.formattedAddress + 
	                '\n地址信息：' + JSON.stringify(obj.addressComponent, null, 4);
	        document.getElementById('locationInfo').innerHTML=obj.formattedAddress;
	        document.getElementById('addresstext').value = obj.formattedAddress;
	    }

	    function onError(obj) {
	        alert(obj.info + '--' + obj.message);
	        console.log(obj);
	    }
	    
	  
</script>

</body>
</html>
