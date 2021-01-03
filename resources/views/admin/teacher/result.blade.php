<?php
  Header("Cache-Control: must-revalidate");
  $offset = 0;
  $ExpireString = "Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
  Header($ExpireString);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>评教系统评教报告页</title>
<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/plugins.css')}}">
<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/style4.css')}}">
<link rel="stylesheet" href="{{asset('resources/views/admin/style/font/icon1/iconfont.css')}}">
<script src="https://cdn.staticfile.org/echarts/4.3.0/echarts.min.js"></script>

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
    #div1 {position:relative; width:100%;height:300px; margin: 20px auto 0; }
    #div1 a {position:absolute; top:0px; left:0px; font-family: Microsoft YaHei; color:#fff; font-weight:bold; text-decoration:none; padding: 3px 6px; }

.leaderboard__profile {
  display: grid;
  grid-template-columns: 1fr 3fr 1fr;
  align-items: center;
  padding: 10px 30px 10px 10px;
  overflow: hidden;
  border-radius: 10px;
  box-shadow: 0 5px 7px -1px rgba(51, 51, 51, 0.23);
  cursor: pointer;
  transition: transform 0.25s cubic-bezier(0.7, 0.98, 0.86, 0.98), box-shadow 0.25s cubic-bezier(0.7, 0.98, 0.86, 0.98);
  background-color: #fff;
}
.leaderboard__profile:active {
  transform: scale(1.02);
  box-shadow: 0 9px 47px 11px rgba(51, 51, 51, 0.18);
}
.leaderboard__picture {
  max-width: 100%;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  box-shadow: 0 0 0 10px #ebeef3, 0 0 0 25px #f3f4f6;
}

.leaderboard__name {
  color: #979cb0;
  font-weight: 600;
  font-size: 15px;
  letter-spacing: 0.64px;
  margin-left: 22px;
}
.leaderboard__value {
  color: #35d8ac;
  font-weight: 600;
  font-size: 15px;
  text-align: center;
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
           <div style="margin-top:0px;margin-left:12px;">
	             		<a href="javascript:window.history.go(-1)"><span class="iconfont icon-fanhui" style="font-size: 30px;color: #000;"></span></a>
	             	</div>
             <div class="logo d-flex align-items-center "><h4 style="margin-top: 10px;margin-left:25px;">评教报告</h4></div>
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

    <div class="content_wrapper bg_homebefore">
      <div class="container-fluid">
        
        <div class="content-bar"> 
         
         <div class="row">
			 
			 <div class="col-md-6 col-lg-6 col-xl-3">
			    <div class="card text-white bg-primary m-b-30">
			      <div class="card-header">{{session('user.teacher_name')}}（教师）</div>
			      <div class="card-body">
			        <h5 class="card-title text-white">当前课程：</h5>
			        <p class="card-text">{{$course_name}}</p>
				   <button type="button" class="exportbtn" style="background-color: #fefefe"><i class="feather icon-send mr-2"></i> 导出评教报告</button>
			     </div>
			   </div>
			 </div>
           <!-- Start col -->
           <div class="col-lg-12 col-xl-3">
			   
			
			    <div class="card">
			      <div class="card-body">
			        <div class="row">
			          <div class="mb-3 col-12"></div>
			          <div class="col-7 ">
			            
			            <p><img src="{{asset('resources/views/admin/style/img/xinwen%20(1).png')}}" >已评教学生人数：</p>
						<h5 style="color: red;" id="process">未完成</h5>
						<input type="hidden" id="sum" value="{{$studentsum}}"/>  
			          </div>
			          <div class="col-5">
			            <div class="ep_1" data-percent="{{$process}}"> <span >{{$sTotal}}</span></div>
			            <input type="hidden" id="total" value="{{$sTotal}}"/>
			          </div>
			        </div>
			      </div>
			    </div>
			
			
			<div class="card">
			  <div class="card-body">
			    <div class="row">
			      <div class="mb-3 col-12"> </div>
			      <div class="col-7 ">
			       <p><img src="{{asset('resources/views/admin/style/img/xinwen%20(1).png')}}" >学生评教平均分：</p>
			       <h5 style="color: #25BEF6;" id="level">良好</h5>
			      </div>
			      <div class="col-5">
			        <div class="ep_2" data-percent="{{$mean}}"> <span>{{$mean}}</span></div>
			        <input type="hidden" id="score" value="{{$mean}}"/>
			        <input type="hidden" id="lastScore" value="{{$lastScore}}"/>
			       
			      </div>
			    </div>
			  </div>
			</div>
			<div class="card">
			  <div class="card-body">
			    <div class="row">
			      <div class="mb-3 col-12"> </div>
			      <div class="col-7 ">
			        <p><img src="{{asset('resources/views/admin/style/img/xinwen%20(1).png')}}" >同行评教平均分：</p>
			        <h5 style="color: #20C997;" id="tlevel">优秀</h5>
			      </div>
			      <div class="col-5">
			        <div class="ep_3" data-percent="{{$Tmean}}"> <span>{{$Tmean}}</span></div>
			         <input type="hidden" id="tmean" value="{{$Tmean}}"/>
			      </div>
				  
			    </div>
			  </div>
			</div>
			
			<div class="card">
			  <div class="card-body">
			    <div class="row">
			      <div class="mb-3 col-12"> </div>
			      <div class="col-7 ">
			        <p><img src="{{asset('resources/views/admin/style/img/xinwen%20(1).png')}}" >督导评教平均分：</p>
			        <h5 style="color: #20C997;">优秀</h5>
			      </div>
			      <div class="col-5">
			        <div class="ep_3" data-percent="{{$Dmean}}"> <span>{{$Dmean}}</span></div>
			      </div>
				  
			    </div>
			  </div>
			</div>
			<div class="card-group mb-4 mt-3">
			    <div class="card mb-4">
			      
			      
			      <h6 class="mb-3 p-3">评语词云</h6>
			      <div class="table-responsive">
			        <div id="div1">
			      		@foreach($context as $val)
                      <a href="#" style="background-color: #0442ba;">{{$val->context}}</a>
                  		@endforeach
                    </div>
			      </div>
			    </div>
			</div>
			
			       		
			          @foreach($desc as $k => $val)	
			          @if($k==0)         
			          	<a href="{{url('admin/tdesc/'.$val->term)}}">         
			            <article class="leaderboard__profile" >   		
                		<img src="{{asset($val->photo)}}" alt="" class="leaderboard__picture">
                         <span class="leaderboard__name">{{$val->teacher_name}}夺得排行榜冠军</span>  
                         <span class="leaderboard__value">学院</span>          
                         </article>                        
                       </a>
                        @endif
                        @if($val->teacher_id==session('user.teacher_id'))
		 				<input type="hidden" id="mydesc" value="{{$k+1}}"/>           
             			@endif
			        @endforeach
			        	
			         @foreach($majordesc as $k => $val)	
			          @if($k==0)			         
			          <a href="{{url('admin/tmdesc/'.$val->term)}}">		          
			            <article class="leaderboard__profile" style="margin-top:10px;" >   		
                		<img src="{{asset($val->photo)}}" alt="" class="leaderboard__picture">
                         <span class="leaderboard__name">{{$val->teacher_name}}夺得排行榜冠军</span>   
                         <span class="leaderboard__value">专业</span>          
                         </article>
                        </a>
                        @endif
                        @if($val->teacher_id==session('user.teacher_id'))
		 				<input type="hidden" id="majordesc" value="{{$k+1}}"/>           
             			@endif
			        @endforeach
			 <input type="hidden" id="lastScore_1" value="{{$lastScore_1}}"/>    
			 <input type="hidden" id="colMean_1" value="{{$colMean_1}}"/>
			  <input type="hidden" id="majorMean_1" value="{{$majorMean_1}}"/>
			  <input type="hidden" id="lastScore_2" value="{{$lastScore_2}}"/> 
			  <input type="hidden" id="colMean_2" value="{{$colMean_2}}"/>
			  <input type="hidden" id="majorMean_2" value="{{$majorMean_2}}"/>
			  <input type="hidden" id="lastScore_3" value="{{$lastScore_3}}"/> 
			  <input type="hidden" id="colMean_3" value="{{$colMean_3}}"/>
			  <input type="hidden" id="majorMean_3" value="{{$majorMean_3}}"/>
			  <input type="hidden" id="lastScore_4" value="{{$lastScore_4}}"/> 
			  <input type="hidden" id="colMean_4" value="{{$colMean_4}}"/>
			  <input type="hidden" id="majorMean_4" value="{{$majorMean_4}}"/>
			
			<div class="card-group mb-4 mt-3">
			    <div class="card mb-4">
			<h6 class=" p-3"><img src="{{asset('resources/views/admin/style/img/sele.png')}}" >平均分占比统计</h6>
			<div class="table-responsive">
						  <hr >
			  <div id="main1" style="width: 320px;height:350px;"></div>
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
<div class="row word"style="display: none;text-align: center;"> 
            
   <p align="center" style="font-size:20pt;font-weight:bold;">专属于你的评教报告</p >
      <h4><b>前言：</b></h4>
   <h4 style="text-indent:2em;text-align: justify">开展“学生评教”是实现教学质量自我监控的重要环节之一。发挥学生在教学中的主体作用，把教师在教学中存在的问题和不足反映出来，以便帮助和促进教师改进教学工作，不断提高教师的教学水平和教学质量，我校组织开展了学生评教活动。现将教师{{session('user.teacher_name')}}2020-2学年{{$course_name}}课程有关情况总结分析如下</h4>
            <h4><b>正文：</b></h4>
            <h4 style="text-indent:2em;text-align: justify">经过这段时间学生的积极配合，目前已评教学生人数达<span style="color: red">{{$sTotal}}</span>人，班级尚未评教人数xx人，占比xxxx
目前评教总分已达<span style="color: red">{{$lastScore}}</span>分，高于或低于学院平均分xxxx，高于或低于学校平均分xxx，学院排名第<strong id="number" style="color: red"></strong>名，专业排名第<strong id="Mnumber" style="color: red"></strong>名
单项占比评分，如图
部分评语如下
          </h4>
  
    </div>
<footer class="am-menu am-cf" >
	<button type="button" class="btn btn-primary btn-lg btn-block" onclick="history.go(-1)">返回</button>
</footer>
<script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.js"></script>
<script src="https://cdn.bootcss.com/FileSaver.js/2014-11-29/FileSaver.js"></script>
<script src="{{asset('resources/views/admin/style/js/jquery.wordexport.js')}}"></script> 
<script type="text/javascript">
		        // 基于准备好的dom，初始化echarts实例
 		      var lastScore_1=document.getElementById('lastScore_1').value;
  		     var colMean_1=document.getElementById('colMean_1').value;
    		   var majorMean_1=document.getElementById('majorMean_1').value;
    		   var lastScore_2=document.getElementById('lastScore_2').value;
  		     var colMean_2=document.getElementById('colMean_2').value;
    		   var majorMean_2=document.getElementById('majorMean_2').value;
    		   var lastScore_3=document.getElementById('lastScore_3').value;
  		     var colMean_3=document.getElementById('colMean_3').value;
    		   var majorMean_3=document.getElementById('majorMean_3').value;
    		   var lastScore_4=document.getElementById('lastScore_4').value;
  		     var colMean_4=document.getElementById('colMean_4').value;
    		   var majorMean_4=document.getElementById('majorMean_4').value;
 		        var myChart1 = echarts.init(document.getElementById('main1'));

				var option1 = {
				         title: {
				              
				            },
				            tooltip: {
				                trigger: 'axis'
				            },
				            legend: {
				                data: ['学院', '专业', '个人']
				            },
				            grid: {
				                left: '3%',
				                right: '6.5%',
				                bottom: '2%',
				                containLabel: true
				            },

				            xAxis: {
				                type: 'category',
				                boundaryGap: false,
				                data: ['2019-1', '2019-2', '2020-1', '2020-2']
				            },
				            yAxis: {
				                type: 'value'
				            },
				            series: [
				                {
				                    name: '学院',
				                    type: 'line',
				                    
				                    data: [colMean_1, colMean_2, colMean_3, colMean_4]
				                },
				                {
				                    name: '专业',
				                    type: 'line',
				                    
				                    data: [majorMean_1, majorMean_2, majorMean_3, majorMean_4]
				                },
				                {
				                    name: '个人',
				                    type: 'line',
				                   
				                    data: [lastScore_1, lastScore_2, lastScore_3, lastScore_4]
				                }
				            ]
				    };
		 
		        // 使用刚指定的配置项和数据显示图表。
		      
				myChart1.setOption(option1);
				
				var $process = '已完成';
				var $level1 = '不合格';
				var $level2 = '合格';
				var $level3 = '良好';
				var $level4 = '优秀';
				var newscore=document.getElementById('score').value;
				var total = document.getElementById("total").value;
				 var tmean = document.getElementById('tmean').value;
				 var sum = document.getElementById('sum').value;
				 
				if(total == sum){
					document.getElementById("process").innerHTML=$process;
				}
				if(newscore <60){
					document.getElementById("level").innerHTML=$level1;
				}else if(newscore >=60 && newscore <80){
					document.getElementById("level").innerHTML=$level2;
				}else if(newscore >=80 && newscore <90){
					document.getElementById("level").innerHTML=$level3;
				}else{
					document.getElementById("level").innerHTML=$level4;
				}
				if(tmean <60){
					document.getElementById("tlevel").innerHTML=$level1;
				}else if(tmean >=60 && tmean<80){
					document.getElementById("tlevel").innerHTML=$level2;
				}else if(tmean >=80 && tmean <90){
					document.getElementById("tlevel").innerHTML=$level3;
				}else{
					document.getElementById("tlevel").innerHTML=$level4;
				}


				
		        $(function () {
		            $('.exportbtn').click(function (event) {
		                $(".word").wordExport('评教报告文档');
		            });
		        })
		  
		  
		  
		  var $card = $('.card1');
		  var lastCard = $(".card-list .card1").length - 1;
		  
		  $('.next').click(function(){ 
		   var prependList = function() {
		    if( $('.card1').hasClass('activeNow') ) {
		     var $slicedCard = $('.card1').slice(lastCard).removeClass('transformThis activeNow');
		     $('ul').prepend($slicedCard);
		    }
		   }
		   $('li').last().removeClass('transformPrev').addClass('transformThis').prev().addClass('activeNow');
		   setTimeout(function(){prependList(); }, 150);
		  });
		  
		  $('.prev').click(function() {
		   var appendToList = function() {
		    if( $('.card1').hasClass('activeNow') ) {
		     var $slicedCard = $('.card1').slice(0, 1).addClass('transformPrev');
		     $('.card-list').append($slicedCard);
		    }}
		   
		     $('li').removeClass('transformPrev').last().addClass('activeNow').prevAll().removeClass('activeNow');
		   setTimeout(function(){appendToList();}, 150);
		  });

		  var mydesc = document.getElementById("mydesc").value;
		  document.getElementById("number").innerHTML=mydesc;
		  var majordesc = document.getElementById("majordesc").value;
		  document.getElementById("Mnumber").innerHTML=majordesc;
		    </script>

<!--jquery js --> 
 
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

<!--jquery js --> 
<script src="{{asset('resources/views/admin/style/js/custom.js')}}"></script> 

<!-- NEW -->
<script src="{{asset('resources/views/admin/style/js/Chart.min.js')}}"></script> 
<!--sparkline chart--> 
<script src="{{asset('resources/views/admin/style/js/jquery.sparkline.js')}}"></script> 
<script src="{{asset('resources/views/admin/style/js/sparkline-init.js')}}"></script> 

<!--easy pie chart-->
<script src="{{asset('resources/views/admin/style/js/jquery.easy-pie-chart.js')}}"></script>
<script src="{{asset('resources/views/admin/style/js/easy-pie-chart-init.js')}}"></script>
<!--vectormap-->
<script src="{{asset('resources/views/admin/style/js/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('resources/views/admin/style/js/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('resources/views/admin/style/js/vmap-init.js')}}"></script>
<!--Dcjqaccordion js --> 

<!--Custom Toasts js --> 
<script src="{{asset('resources/views/admin/style/js/custom-multinod-toasts.js')}}"></script> 

<!-- Chart JS -->
<script src="{{asset('resources/views/admin/style/js/chart.bundle.js')}}"></script>

<script src="{{asset('resources/views/admin/style/js/miaov.js')}}"></script>

</body>
</html>
