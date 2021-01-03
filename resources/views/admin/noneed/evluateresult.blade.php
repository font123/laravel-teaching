<!DOCTYPE html>

<html>
	<head>
		<title>评教系统-评教结果</title>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		    
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
		<link rel="stylesheet" href="{{asset('resources/views/admin/style/font/icon1/iconfont.css')}}">
		<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/bootstrap.css')}}">
	  <link rel="stylesheet" href="{{asset('resources/views/admin/style/css/style2.css')}}">
	<script type="text/javascript" src="{{asset('resources/views/admin/style/js/lee_loading.js')}}"></script>
		<script src="https://cdn.staticfile.org/echarts/4.3.0/echarts.min.js"></script>
		
		<style type="text/css">
		    body{
					  margin: 0;
					  padding-bottom: 70px;
					  padding-top: 70px;
					  text-decoration:none;
				  }
				  a{
					  text-decoration:none;
					  }
		    .footer {
			     height: 7%;
		        border-top: 1px solid #EAFFEA;
		        color: #777;
		      
		        background-color: #76bbd8;
		    }
		   
					#list  li{
					  list-style:none;
					  display:inline-block;
					  /* margin:0px; */
					  padding:0px 19px 0px 19px;
					  
					  background-color:#76bbd8;
					  
					  }
					  #list  li.active{
					    background-color: white;
					  }
				  
				 .media{
					background:rgba(118,187,216,0.5);
					border-radius: 5px;
					
					padding: 15px; 
					width: 100%;
					/* box-shadow: 2px 4px 6px #000000; */
					   
				 }
				 .demo {
				     width: 100%;
				     margin: 50px auto 10px auto;
				     padding: 10px;
					
				 }
				 
				     .demo p {
				         line-height: 30px;
				     }
				 
				     .demo h3 {
				         font-size: 24px;
				         text-align: center;
				         padding: 10px;
				     }
				 
				 @media (max-width: 480px) {
				     .demo {
				         width: 80px;
				         margin: 50px auto 10px auto;
				         padding: 2px;
				     }
				 
				         .demo img {
				         width: 90%;
				         }
				 
				         .demo h3 {
						 font-size: 1.5em;
						 line-height: 1.9em;
				         }
				 
						 .navbar{
						background-color: #76bbd8;
							
						 }
					}
						 
		</style>
	</head>
	<body>
		<div class="navbar navbar-fixed-top" style="background-color: #76bbd8;">
		     <div class="container">
		         <div class="row footer-bottom">
		             <div style="display: inline-block;" >
		             	<ul style="margin: 0;">
		             		<a href="{{url('admin/tsee')}}"><span class="iconfont icon-fanhui" style="font-size: 30px;color: white;"></span></a>
		             	</ul>
		             </div>
		            <div style="display: inline-block;margin-left: 20px;">
		            	<ul class="">
		            		  <h3  style="color: white; ">评教结果</h3>
		            	</ul>
		            </div>
					
						  <hr style="margin: 0px 0px 0px 0px;">
		         </div>
		     </div>
			 </div>
			 
		
		<div class="container" >
		     
		  <!-- 左对齐 -->
		  <div class="media">
			  <div >
			  	<h4><span class="iconfont icon-qiandao" style="font-size: 25px;color: white;margin-right: 10px;"></span>xxx年-xxx年第x学期 {{$course_name}}</h4>
			  </div>
			  <hr >
			
		    <div class="media-left">
		      <h3>平均分：<h1>{{$mean}}</h1></h3>
		    </div>
		   
		     
		    <input type="hidden" id="score" value="{{$mean}}"/>
		      
		    <div class="media-right">
		       <h3>评价学生人数：<h1 style="text-align: center;">{{$total}}</h1></h3>
		    </div>
			<hr >
			<div class="media-left">
				<h4 style="color: #666666;">评价良好</h4>
			</div>
		  </div>
		  
		  <div class="media">
		  			  <div >
		  				<h4><span class="iconfont icon-qiandao" style="font-size: 25px;color: white;margin-right: 10px;"></span>单项评分占比</h4>
		  			  </div>
		  			  <hr >
		    <div id="main" style="width: 300px;height:200px;"></div>
		  </div>
		  
		  <div class="media">
			  <div >
				<h4><span class="iconfont icon-qiandao" style="font-size: 25px;color: white;margin-right: 10px;"></span>平均分占比</h4>
			  </div>
			  <hr >
		    <div id="main1" style="width: 300px;height:200px;"></div>
		  </div>
		 
		  
		</div>
		
		<div class="footer navbar-fixed-bottom">
		    <div class="container">
		        <div class="row footer-bottom">
		            <hr style="margin: 0px 0px 0px 0px;">
		           <a href="{{url('admin/tperson')}}"><button type="button" class="btn btn-primary" style="width: 100%;height:50px;">返回</button></a>
		        </div>
		    </div>
		</div>
		<script type="text/javascript">
		        // 基于准备好的dom，初始化echarts实例
		       var myscore=document.getElementById('score').value;
		         console.log(myscore);
		        var myChart1 = echarts.init(document.getElementById('main1'));
		        console.log(myChart1);
		        // 指定图表的配置项和数据
		        var myChart = echarts.init(document.getElementById('main'), 'light'); // dark 可尝试修改为 light
		         
		                myChart.setOption({
		                    series : [
		                        {
		                            name: '访问来源',
		                            type: 'pie',    // 设置图表类型为饼图
		                            radius: '55%',  // 饼图的半径，外半径为可视区尺寸（容器高宽中较小一项）的 55% 长度。
		                            data:[          // 数据数组，name 为数据项名称，value 为数据项值
		                                {value:235, name:'学院平均分'},
		                                {value:274, name:'我的平均分'}
		                                
		                            ]
		                        }
		                    ]
		                })
				
				var option1 = {
				    legend: {},
				    tooltip: {},
				    dataset: {
				        // 提供一份数据。
				        source: [
				            ['product', '平均分占比'],
				            ['2017', '80'],
				            ['2018', '90'],
				            ['2019', '85'],
				            ['2020', myscore]
				        ]
				    },
				    // 声明一个 X 轴，类目轴（category）。默认情况下，类目轴对应到 dataset 第一列。
				    xAxis: {type: 'category'},
				    // 声明一个 Y 轴，数值轴。
				    yAxis: {},
				    // 声明多个 bar 系列，默认情况下，每个系列会自动对应到 dataset 的每一列。
				    series: [
				        {type: 'bar'},
				     
				    ]
				};
		 
		        // 使用刚指定的配置项和数据显示图表。
		      
				myChart1.setOption(option1);
				
		    </script>
	</body>
</html>
