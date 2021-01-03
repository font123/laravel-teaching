<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>评教系统个人</title>
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
input.files  {
 margin-left:-245px;
 font-size:22px;
 cursor:pointer;
 filter:alpha(opacity=0);
 opacity:0;
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
            <div class="logo d-flex align-items-center justify-content-center"><h4 style="margin-top: 10px;margin-left:65px;">个人中心</h4> </div>     
          </div>
        </div>
      </div>
    </header>
  </div>
  <!-- header_End --> 
  <!-- Content_right -->
  <div class="container_full">
    
    <div class="content_wrapper bg_homebefore" style="padding:0px;">
      <div class="container-fluid">
        
        <div class="content-bar"> 
         
          <div class="row"> 
           
          </div>
          
          <div class="row"> 
       		<div class="user-panel">
                <div class="user_image"> 
     			 <img class="img-circle mCS_img_loaded" onclick="houseImgOne(this)" name="house_img_one" id="house_img_one" src="{{asset($img)}}">
				<input type="file" name="house_img_one1" id="house_img_one1" style="display:none;">   			 
                </div>
                <div class="info">
                  <p style="color: #000000;">{{session('user.teacher_name')}}(老师)</p>
                  <a href="#" style="color: #000000;"> <i class="fa fa-circle text-success" ></i> 在线</a>
                   </div>
              </div>
            <div class="col-lg-12 col-xl-3">
              		  
			  <ul id="dc_accordion" class="sidebar-menu tree">
			   
			    <li class="menu_sub"> <a href="#"><img src="{{asset('resources/views/admin/style/img/listen.png')}}" style="padding-bottom: 4px;"> <span>听课计划</span> <span class="ti ti-angle-down styleicon"></span> </a>
			      <ul class="down_menu">
			      <li><a href="{{url('admin/nplan')}}">待听课</a></li>
			        <li><a href="{{url('admin/teval')}}">待评教</a></li>
			        <li><a href="{{url('admin/yplan')}}">已完成</a></li>	        
			      </ul>
			    </li>
		   		
			    <hr >
			     <li> <a href="{{url('admin/tsee')}}"> <img src="{{asset('resources/views/admin/style/img/report.png')}}" style="padding-bottom: 2px;"><span style="padding-left:5px;">评教报告</span> <span class="ion ion-ios-arrow-forward styleicon"></span></a> </li>
			      <li> <a href="{{url('admin/tinfo')}}"> <img src="{{asset('resources/views/admin/style/img/info.png')}}" style="padding-bottom: 2px;"><span style="padding-left:5px;">简介 </span><span class="ion ion-ios-arrow-forward styleicon"></span></a> </li>			   
			      <li> <a href="#"> <img src="{{asset('resources/views/admin/style/img/help.png')}}" style="padding-bottom: 2px;"><span style="padding-left:5px;">帮助 </span><span class="ion ion-ios-arrow-forward styleicon"></span></a> </li>
			       <li> <a href="{{url('admin/tpass')}}"><img src="{{asset('resources/views/admin/style/img/set.png')}}" style="padding-bottom: 2px;"><span style="padding-left:5px;">修改密码</span><span class="ion ion-ios-arrow-forward styleicon"></span></a> </li>
			      <li> <a href="{{url('admin/logout')}}"> <img src="{{asset('resources/views/admin/style/img/out.png')}}" style="padding-bottom: 2px;"><span style="padding-left:5px;">退出登录</span><span class="ion ion-ios-arrow-forward styleicon"></span> </a> </li>
	   
			    
			  </ul>
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
      <a href="{{url('admin/tnews')}}">
        <span><img src="{{asset('resources/views/admin/style/img/new2.png')}}" width="30px"></span>
      </a>
	   </li>
    </div>
    <div class="am-menu-column my" id="my">
	<li>
      <a href="#">
        <span><img src="{{asset('resources/views/admin/style/img/user2.png')}}" width="30px"></span>
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

<script src="{{asset('resources/views/admin/style/js/ajaxfileupload.js')}}"></script> 
<script type="text/javascript">
//下面用于图片上传预览功能
function houseImgOne(_this){

	  $('#house_img_one1').click();
	  $("#house_img_one1").change(function () {
		  var docObj=document.getElementById("house_img_one1");

		  var imgObjPreview=document.getElementById("house_img_one");
		  if(docObj.files &&docObj.files[0])
		  {

		  //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
		    imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
		  }
		  else
		  {
		  //IE下，使用滤镜
		    docObj.select();
		    var imgSrc = document.selection.createRange().text;
		    var localImagId = document.getElementById("localImag");
		  //必须设置初始大小
		    localImagId.style.width = "150px";
		    localImagId.style.height = "180px";
		  //图片异常的捕捉，防止用户修改后缀来伪造图片
		    try{
		      localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
		      localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;

		    }
		    catch(e)
		    {
		      alert("您上传的图片格式不正确，请重新选择!");
		      return false;
		    }
		    imgObjPreview.style.display = 'none';
		    document.selection.empty();
		  }
		  ajaxFileUpload(); //上传图片
	      return true; 
	  });
      
	}


 function ajaxFileUpload() {

	    $.ajaxFileUpload
	    (
	            {
	            	type:"post",
	                url: "{{url('admin/tupImg')}}", //用于文件上传的服务器端请求地址
	                secureuri: false, //是否需要安全协议，一般设置为false
	                data:{_token:'{{csrf_token()}}'}, //csrf验证
	                fileElementId: 'house_img_one1', //file的id
	                dataType: 'json',
 	    		  	success : function(data, status) {
 	    	            console.log('请求成功！');
 	    	        },
 	    	        error : function(data, status, e) {
 	    	        	console.log('请求失败！');
	    	        }
	            }
	    );
	    return false;
	} 
</script>

</body>
</html>
