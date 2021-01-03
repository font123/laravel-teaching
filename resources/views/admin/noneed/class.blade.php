<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	 
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/font/css/iconfont.css')}}">
	<script type="text/javascript" src="{{asset('resources/views/admin/style/js/Timetables.min.js')}}"></script>

	
    <title>大学课表</title>
    <style>
        #coursesTable {
            padding: 0px 15px;
			margin-top: 0;
        }

        .Courses-head {
            background-color: #edffff;
        }

        .Courses-head > div {
            text-align: center;
            font-size: 14px;
            line-height: 28px;
        }

        .left-hand-TextDom, .Courses-head {
            background-color: #76bbd8;
        }

        .Courses-leftHand {
            background-color: #76bbd8;
            font-size: 12px;
        }

        .Courses-leftHand .left-hand-index {
            color: #9c9c9c;
            margin-bottom: 4px !important;
        }

        .Courses-leftHand .left-hand-name {
            color: #666;
        }

        .Courses-leftHand p {
            text-align: center;
            font-weight: 900;
        }

        .Courses-head > div {
            border-left: none !important;
        }

        .Courses-leftHand > div {
            padding-top: 5px;
            border-bottom: 1px dashed rgb(219, 219, 219);
        }

        .Courses-leftHand > div:last-child {
            border-bottom: none !important;
        }

        .left-hand-TextDom, .Courses-head {
            border-bottom: 1px solid rgba(0, 0, 0, 0.1) !important;
        }

        .Courses-content > ul {
            border-bottom: 1px dashed rgb(219, 219, 219);
            box-sizing: border-box;
        }

        .Courses-content > ul:last-child {
            border-bottom: none !important;
        }

        .highlight-week {
            color: #02a9f5 !important;
        }

        .Courses-content li {
            text-align: center;
            color: #666666;
            font-size: 14px;
            line-height: 50px;
        }

        .Courses-content li span {
            padding: 6px 2px;
            box-sizing: border-box;
            line-height: 18px;
            border-radius: 4px;
            white-space: normal;
            word-break: break-all;
            cursor: pointer;
        }

        .grid-active {
            z-index: 9999;
        }

        .grid-active span {
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
        }
		
		body{
				margin: 0;
				padding-bottom: 70px;
				background-color: #ffffff;
				text-decoration:none;
		 }
		 a{
				 text-decoration:none;
			}
		 .footer {
			 height: 11%;
		     border-top: 1px solid #EAFFEA;
		     color: #777;
		     background-color: #76bbd8;
		 }
		
		#list  li{
			list-style:none;
			display:inline-block;
				/* margin:0px; */
			padding:0px 12% 0px 12.7%; 
					  
					 
					  }
         #list  li.active{
	        background-color: white;
					  }
		.media{
			 background-color: rgba(255,255,255,0.2);
			border-radius: 25px;
					
			padding: 15px; 
			 width: 100%;
			box-shadow: 2px 4px 6px #000000;
					   
		}

		.demo {
		    width: 360px;
		    margin: 50px auto 0px auto;
		    padding: 10px;
				   
		}

		    .demo p {
		        line-height: 30px;
		    }
		
		    .demo h4 {
		      color: #000;
		    }
		
		@media (max-width: 380px) {
		    .demo {
		        width: 150px;
		        margin: 50px auto 10px auto;
		        padding: 10px;
		    }
		
		        .demo img {
		            width: 90%;
		        }
		
		       .navbar{
							 background-color: #76bbd8;
							
					 }
		}
        table{
                border: 1px solid #ccc;
                border-collapse: collapse;
                text-align: center;
            }
            tr,th,td{
                width: 80px;
                height: 100px;
                border: 1px solid #ccc;
            }
    </style>
</head>
<div class="navbar navbar-fixed-top">
	     <div class="container">
	         <div class="row footer-bottom">
	             
	            <ul class="list-inline text-center" id="list">
	            	  <h3 class ="text-center" style="color: white;">个人课表</h3>
	            </ul>
					  <hr style="margin: 0px 0px 0px 0px;">
	         </div>
	     </div>
	 </div>
	
	<div id="main" class="container">
	<div class="row"  style="text-align: center;">
	
	    <div class="demo col-xs-6 " >
	       <h4>姓名：{{session('user.teacher_name')}}</h4>
	    </div>
			  <div class="demo col-xs-6 ">
			        <h4>工号：{{session('user.teacher_id')}}</h4>
			  </div>
			  </div>
	</div>
	
	<div id="coursesTable" >
	<table  align="center">
			
            <thead style="background:#76bbd8"> 
                <tr>
                    <th>时间\日期</th>
                    <th>周一</th>
                    <th>周二</th>
                    <th>周三</th>
                    <th>周四</th>
                    <th>周五</th>
                </tr>

            </thead>
            <tbody>
            
                <tr>
                    <td style="background:#76bbd8">第1-2节</td>
                    <td>Math</td>
                    <td>English</td>
                    <td>Chinese</td>
                    <td>History</td>
                    <td>Geography</td>
                </tr>
             
                <tr>
					<td style="background:#76bbd8">第3-4节</td>
                    <td>Math</td>
                    <td>English</td>
                    <td>Chinese</td>
                    <td>History</td>
                    <td>Geography</td>
                </tr>
                <tr>
					<td style="background:#76bbd8">第5-6节</td>
                    <td>Math</td>
                    <td>English</td>
                    <td>Chinese</td>
                    <td>History</td>
                    <td>Geography</td>
                </tr>
                <tr>
                    <td style="background:#76bbd8">第7-8节</td>
                    <td>Math</td>
                    <td>English</td>
                    <td>Chinese</td>
                    <td>History</td>
                    <td>Geography</td>
                </tr>
                <tr>
					<td style="background:#76bbd8">第9-10节</td>
                    <td>Math</td>
                    <td>English</td>
                    <td>Chinese</td>
                    <td>History</td>
                    <td>Geography</td>
                </tr>
                <tr>
					<td style="background:#76bbd8">第11-12节</td>
                    <td>Math</td>
                    <td>English</td>
                    <td>Chinese</td>
                    <td>History</td>
                    <td>Geography</td>
                </tr>
                	
            </tbody>
        </table>
	</div>

<div class="footer navbar-fixed-bottom">
	     <div class="container">
	         <div class="row footer-bottom">
	             <hr style="margin: 0px 0px 0px 0px;">
	            <ul class="list-inline text-center" id="list">
	            	<li class="active"><a href="#"><span class="iconfont icon-B" style="font-size: 30px;"></span><p>首页</p></a></li>	            
	            	<li><a href="{{url('admin/tlisten')}}"><span class="iconfont icon-gongzhang" style="font-size: 30px;"></span><p>听课</p></a></li>
	            	<li><a href="{{url('admin/tperson')}}"><span class="iconfont icon-yaoqing" style="font-size: 30px;"></span><p>我的</p></a></li>
	            </ul>
	         </div>
	     </div>
	 </div>
	 
	 
	<script type="text/javascript">
		
				var li = document.querySelectorAll('#list li');
				
				    for (var i = 0; i < li.length; i++)
				
				        li[i].onclick = function () {
				
				            for (var i = 0; i < li.length; i++) li[i].className = '';
				
				            this.className='active'
				
				        }


       


	</script>

  <!-- jQuery (Bootstrap 的 JavaScript 插件需要引入 jQuery) -->
     <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.js"></script>
</body>
</html>
