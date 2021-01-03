<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">   	
	<meta name="_token" content="{{ csrf_token() }}"/>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>	  
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/font/icon1/iconfont.css')}}">
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/common.css')}}">
    <script type="text/javascript" src="{{asset('resources/views/admin/style/js/alertPopShow.js')}}"></script>
    <link rel="stylesheet" href="{{asset('resources/views/admin/style/css/bootstrap.css')}}">
	  <link rel="stylesheet" href="{{asset('resources/views/admin/style/css/style2.css')}}">
	<!-- <script type="text/javascript" src="{{asset('resources/views/admin/style/js/lee_loading.js')}}"></script>  -->
    <title>评教表单</title>
	<style type="text/css">
	   body{
	   			  margin: 0;
	   			  padding-bottom: 70px;
	   			 background-color: #eff1fc;	   			
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
	   			  padding:0px 5% 0px 5%;	   			  	   			 
	   			  
	   			  }
	   
		  #list li.active{
			  background-color: white;
		  }
	  
	 
	
	   
	       .sample span {
	           line-height: 30px;
	       	   
	       	   font-size:14px;
	       	   
	       }
	   
	       
	   
	   @media (max-width: 380px) {
	       .sample {
	           width: 320px;
	           margin: 50px 0px 0px 0px;
	           padding: 10px;
	       }
	   
	           .sample img {
	               width: 90%;
	           }
	   
	          .navbar{
	   				 background-color: #fefefe;
	   					
	   				 }
	   }
        .stars{
	          
	           padding: 5px;
	           margin-bottom: 10px;
	       }
	       .stars span{
	           display: inline-block;
	           width: 20px;
	           height: 20px;
	        
	           margin-right: 10px;
			   font-size:20px;
	       }
	       /* 显示评分数 */
	       span.active{
	          color: #f2c94d;
	       }
	       .panel-body{
	       	   background-color:#4385f5;
	       	   
	       }
	       .panel-group{
	       	color:#fefefe;
	       }
	       .panel-heading{
	       	   background-color:#f5f5f5;
	       	   color:#000;
	       }
	       .subtn{
	       	padding-left: 35%;
	       }
	       .cal{
	       	padding-left:15%;
	       }
	       .course{
	       	padding-left:8%;
	       }
	</style>
    

</head>
<body>
   <!-- Pre Loader -->
<div id="dvLoading"></div>
	<form action="{{url('admin/dyes')}}" method="post">
				 {{csrf_field()}}
	<div class="navbar navbar-fixed-top">
	     <div class="container">
	         <div class="row footer-bottom">
	             <div style="display: inline-block;" >
	             	<div style="margin-top:10px;margin-left:15px;">
	             		<a href="{{url('admin/deval')}}"><span class="iconfont icon-fanhui" style="font-size: 30px;color: #000;"></span></a>
	             	</div>
	             </div>
	            <div style="display: inline-block;margin-left: 45px;">
	            	<ul class="">
	            		  <div style="font-size: 24px;">督导评教</div>
	            	</ul>
	            </div>
	            <div style="display: inline-block;margin-left: 15px;" >
                     <h5>已评总分:  <input type='text' name='scorce' id="lab" readonly="readonly" style="width: 30px;color:#f5f5f5; background:#4385f5;border-radius:6px;border: solid 1px #4385f5;">分</h5> 
                </div>
                 <input type="hidden" value="" name="act_time" id="time">
                 <input type="hidden" value="{{$art->college}}" name="college">
                  <input type="hidden" value="{{$art->teacher_id}}" name="teacher_id">
                <input type="hidden" value="{{$art->time}}" name="time">
                <input type="hidden" value="{{$art->place}}" name="place">
                <input type="hidden" value="{{$art->id}}" name="evl_id">
                <input type="hidden" value="{{$art->photo}}" name="photo">
                  <input type="hidden" value="{{$art->address}}" name="address">
                  <input type="hidden" value="{{$art->term}}" name="term">
				<input type="hidden" value="" id="att" name="att">
				<input type="hidden" value="" id="con" name="con">
				<input type="hidden" value="" id="met" name="met">
				<input type="hidden" value="" id="eff" name="eff">
				<input type="hidden" value="" id="ord" name="ord">	  
	         </div>
	     </div>
		 </div>
	 </div>
	
	<div id="main" class="container">
	<div class="row"  style="text-align: center;margin-top: 5%;">
	
	    <div class="sample" >
	    	<span style="color: #0069d9;" >教师:</span><input type="text" readonly="readonly" name="teacher" value="{{$art->teacher}}" style="width: 60px;">	          	 
    	  <span style="color: #0069d9" class="course">课程：</span><input type="text" readonly="readonly" name="course" value="{{$art->name}}" style="width: 100px;">			 
    	  </div>
	</div>
	</div>

 <div class="container">
   	

   <div class="panel-group" id="accordion" style="width: 100%;">
	   <div class="stars-wrapper">
   	<div class="panel panel-default">
   		<div class="panel-heading">
   			<h4 class="panel-title">
   				<a data-toggle="collapse" data-parent="#accordion" 
   				   href="#collapseOne">
   					<b>教学态度共20分（点击可收缩，请打分）</b>
   				</a>
   			</h4>
			
   		</div>
		
   		<div id="collapseOne" class="panel-collapse collapse">
   			<div class="panel-body">
   				<div class="container">
   				  <div id="root">
   
   				    
   				      <div>
   				          <p><b>1：</b>课程标准、授课计划、教案等教学文件齐全</p>
						    
							  <div class="stars">
								  <span>★</span>
								  <span>★</span>
								  <span>★</span>
								  <span>★</span>
								  <span>★</span>
								  <p id="dir"></p>
							  </div>
							 <!-- <div>
								<p id="dir"></p>
							  </div> -->
						  
   				      </div>
   				      <!------------------------------------------------------->
					  <hr >
					  <div>
					      <p><b>2：</b>为人师表、治学严谨、以身作则、教书育人</p>
						  
							<div class="stars">
								<span>★</span>
								<span>★</span>
								<span>★</span>
								<span>★</span>
								<span>★</span>
							   <p id="dir"></p>
							</div>
					   
					  </div>
					  <!------------------------------------------------------->
					  <hr >
					  <div>
					      <p><b>3：</b>严格课堂管理、作业布置合理批改及时，辅导耐心</p>
					      <div class="stars">
					      	<span>★</span>
					      	<span>★</span>
					      	<span>★</span>
					      	<span>★</span>
					      	<span>★</span>
					         <p id="dir"></p>
					      </div>
					      
					  </div>
					  <!------------------------------------------------------->
					  <hr >
					  <div>
					      <p><b>4：</b>提前到达教室，准备相关设备和教具</p>
					     <div class="stars">
					     	<span>★</span>
					     	<span>★</span>
					     	<span>★</span>
					     	<span>★</span>
					     	<span>★</span>
					        <p id="dir"></p>
					     </div>
					     
					  </div>
					  <!------------------------------------------------------->
					  <hr >
   				  </div>
   				 </div>
   			</div>
   		</div>
   	</div>
   	<div class="panel panel-default">
   		<div class="panel-heading">
   			<h4 class="panel-title">
   				<a data-toggle="collapse" data-parent="#accordion" 
   				   href="#collapseTwo">
   					<b>教学内容共20分（点击可收缩，请打分）</b>
   				</a>
   			</h4>
   		</div>
			
   		<div id="collapseTwo" class="panel-collapse collapse">
   			<div class="panel-body">
   				<div>
   				    <p><b>5：</b>严格执行课程标准及授课计划，误差不超过正负2课时  </p>
   				   <div class="stars">
   				   	<span>★</span>
   				   	<span>★</span>
   				   	<span>★</span>
   				   	<span>★</span>
   				   	<span>★</span>
   				      <p id="dir"></p>
   				   </div>
   				   
   				</div>
				<!------------------------------------------------------->
				<hr >
				<div>
				    <p><b>6：</b>合理选用优秀新版教材，专业课注重开发和选用工学结合教材  </p>
				    <div class="stars">
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				       <p id="dir"></p>
				    </div>
				    
				</div>
				<!------------------------------------------------------->
				<hr >
				
				<div>
				    <p><b>7：</b>授课内容符合课程标准要求，基本知识讲解清楚，重点难点突出    </p>
				    <div class="stars">
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				       <p id="dir"></p>
				    </div>
				    
				</div>
				<!------------------------------------------------------->
				<hr >
				
				
				<div>
				    <p><b>8：</b>根据课程特点突出职业能力培养，寓职业素质教育于课堂教学之中 </p>
				    <div class="stars">
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				       <p id="dir"></p>
				    </div>
				    
				</div>
				
   			</div>
   		</div>
   	</div>
   	<div class="panel panel-default">
   		<div class="panel-heading">
   			<h4 class="panel-title">
   				<a data-toggle="collapse" data-parent="#accordion" 
   				   href="#collapseThree">
   					<b>教学方法共30分（点击可收缩，请打分）</b>
   				</a>
   			</h4>
   		</div>
   		<div id="collapseThree" class="panel-collapse collapse">
   			<div class="panel-body">
   				<div>
   				    <p><b>9：</b>课件、板书设计合理、条理清晰 </p>
   				    <div class="stars">
   				    	<span>★</span>
   				    	<span>★</span>
   				    	<span>★</span>
   				    	<span>★</span>
   				    	<span>★</span>
   				       <p id="dir"></p>
   				    </div>
   				    
   				</div>
   				<!------------------------------------------------------->
   				<hr >
				<div>
				    <p><b>10：</b>语言表达清晰、准确，逻辑性强 </p>
				    <div class="stars">
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				       <p id="dir"></p>
				    </div>
				    
				</div>
				<!------------------------------------------------------->
				<hr >
				
				<div>
				    <p><b>11：</b>理论联系实际，注重培养学生分析问题和解决问题的综合能力 </p>
				    <div class="stars">
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				       <p id="dir"></p>
				    </div>
				    
				</div>
				<!------------------------------------------------------->
				<hr >
				
				<div>
				    <p><b>12：</b>根据课程特点，充分利用信息化教学手段</p>
				    <div class="stars">
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				       <p id="dir"></p>
				    </div>
				    
				</div>
				<!------------------------------------------------------->
				<hr >
				
				<div>
				    <p><b>13：</b>根据课程特点，设计教学组织流程，设计教、学、做为一体的情境教学法，教学手段灵活</p>
				    <div class="stars">
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				       <p id="dir"></p>
				    </div>
				    
				</div>
				<hr >
				
				<div>
				    <p><b>14：</b>根据学生对课程的接受能力，适当调整授课方式 </p>
				    <div class="stars">
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				       <p id="dir"></p>
				    </div>
				    
				</div>
				<!------------------------------------------------------->
   			</div>
   		</div>
   	</div>
   	<div class="panel panel-defalut">
   		<div class="panel-heading">
   			<h4 class="panel-title">
   				<a data-toggle="collapse" data-parent="#accordion" 
   				   href="#collapseFour">
   					<b>教学效果共20分（点击可收缩，请打分）</b>
   				</a>
   			</h4>
   		</div>
   		<div id="collapseFour" class="panel-collapse collapse ">
   			<div class="panel-body">
   				<div>
   				    <p><b>15：</b>达到课程标准规定教学目标，学生掌握了本堂课的主要教学内容 </p>
   				    <div class="stars">
   				    	<span>★</span>
   				    	<span>★</span>
   				    	<span>★</span>
   				    	<span>★</span>
   				    	<span>★</span>
   				       <p id="dir"></p>
   				    </div>
   				    
   				</div>
   				<!------------------------------------------------------->
   				<hr >
				
				<div>
				    <p><b>16：</b>学生对教学的综合反映较好，激发了学生学习兴趣 </p>
				    <div class="stars">
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				       <p id="dir"></p>
				    </div>
				    
				</div>
				<!------------------------------------------------------->
				<hr >
				
				<div>
				    <p><b>17：</b>学生掌握了本堂课的重点内容，提高了相关职业技能和职业素质 </p>
				    <div class="stars">
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				       <p id="dir"></p>
				    </div>
				    
				</div>
				<hr >
				
				<div>
				    <p><b>18：</b>注意引导、培养学生学习兴趣，注重学生能力培养 </p>
				    <div class="stars">
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				       <p id="dir"></p>
				    </div>
				    
				</div>
				<!------------------------------------------------------->
   			</div>
   		</div>
   	</div>
	
	<div class="panel panel-defalut">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" 
				   href="#collapsefive">
					<b>教学秩序共10分（点击可收缩，请打分）</b>
				</a>
			</h4>
		</div>
		<div id="collapsefive" class="panel-collapse collapse">
			<div class="panel-body">
				<div>
				    <p><b>19：</b>学生到课率高，迟到率低</p>
				    <div class="stars">
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				       <p id="dir"></p>
				    </div>
				    
				</div>
				<!------------------------------------------------------->
				<hr >
				
				<div>
				    <p><b>20：</b>课堂秩序良好，学生听课认真 </p>
				    <div class="stars">
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				    	<span>★</span>
				       <p id="dir"></p>
				    </div>
				    
				</div>
				<!------------------------------------------------------->
				
			</div>
		</div>
	</div>
   </div>
   </div>
    
      </div>
  	<div class="col-md-6 col-lg-6 col-xl-3">
			  <div class="card text-white bg-primary m-b-30">
			    <div class="card-header" style="padding-left: 10px;"><b>评语*（<span id="show">0</span> /20）</b></div>
			    <div class="card-body" style="padding: 0px 10px 5px 10px;">
					
					<!--这是你的表单--> 
					<textarea id="content" name="context" onkeyup="CountWords(this,'show')" style="width: 100%;height: 100px;border-radius: 10px;color: #000000;border: none;"></textarea> 

			          </div>
					<div class="card-body" style="padding: 0px 10px 10px 10px;">
						<span id="test" class="label label-default" onclick="changeinfo(this)">负责任</span>
						<span  class="label label-primary" onclick="changeinfo(this)">细心</span>
						<span  class="label label-success" onclick="changeinfo(this)">耐心</span>
						<span  class="label label-info" onclick="changeinfo(this)">可爱</span>
						<span  class="label label-warning" onclick="changeinfo(this)">严格要求</span></a>
						
					</div>	  
			  </div>
			</div>
	<div class="container" style="margin-top: 25px;">
	<div class="row subtn">
	   <button type="submit" class="btn btn-primary btn-lg" id="submit">确认</button>
	   <button type="button" class="btn btn-default btn-lg">取消</button>
	</div>
	
   </div>
   </form>
   <script type="text/javascript">
   	$(function () { $('#collapseFour').collapse('toggle')});
   	$(function () { $('#collapseTwo').collapse('toggle')});
   	$(function () { $('#collapseThree').collapse('toggle')});
   	$(function () { $('#collapseOne').collapse('toggle')});
   	$(function () { $('#collapsefive').collapse('toggle')});
   </script>  

   
   <script type="text/javascript">
   	
var li = document.querySelectorAll('#list li');

    for (var i = 0; i < li.length; i++)

        li[i].onclick = function () {

            for (var i = 0; i < li.length; i++) li[i].className = '';

            this.className='active'

        }
		

		window.onload = function(){
		    stars(5) //  满分 5 分 根据 html 自定义星星数
		   	
		   	
		    var date = new Date();
    		var year =date.getFullYear(); //获取完整的年份(4位)

    		var month1 = date.getMonth(); //获取当前月份(0-11,0代表1月)

    		var day = date.getDate(); // //获取当前日(1-31)

    		var month2 = month1+1
    		
    		document.getElementById("time").value = year+"/"+month2+"/"+day;
		      }
		      function stars(size){
		       var m = document.getElementsByName('dirs')
		       var scores1 = 0
		        //获取总的星星数
		        var stars = document.querySelectorAll('.stars> span')
		        // 得分数组
		         var scores=[]
		        // 评分项数组
		        var starArrs = []
		        //数组分割
		        for(var i = 0; i<Math.ceil(stars.length/size);i++ ){
		         var start = i*size
		         var end = start+size
		         //初始评分为0
		         scores.push(0)
		         starArrs.push([].slice.call(stars,start,end))
		        }
		        // 事件委托父元素
		        document.querySelector('.stars-wrapper').onclick = function(e){
		         //获取点击的星星 在 总数组中的index
		         var index = [].indexOf.call(stars,e.target)
		         // 如果点击的 不是星星 
		         if(index===-1) return
		         // 判断 该星星归属 评分项数组
		         var i = parseInt(index/size)
		         var starArr =starArrs[ i ]
		       // 计算归属评分项 的评分
		       index = index%size
		       // 评分未更改
		       if(index ===( scores[ i ] - 1)){
		        console.log(scores)
		         return scores
		         }
		         scores[ i ] =  index+1
		         
		         //显示评分红色托马斯基柴夫波娃效果
		         starArr.forEach(function(star,i){
		          if(i<= index){
		           
		        star.classList.toggle('active',true);
		        
		          }else{
		           star.classList.toggle('active',false)
		          }
		         })
		         console.log(scores)
		        
		        	
		        function sum(arr) {
		             var s = 0;
		             for (var i=arr.length-1; i>=0; i--) {
		                 s += arr[i];
		             }
		             return s;
		         }
				function att(arr){
					var att = 0;
					for (var j=0;j < arr.length;j++){
						att = arr[0]+arr[1]+arr[2]+arr[3];
					}
					return att;
				}
				function con(arr){
					var con = 0;
					for (var j=0;j < arr.length;j++){
						con = arr[4]+arr[5]+arr[6]+arr[7];
					}
					return con;
				}
				function met(arr){
					var met = 0;
					for (var j=0;j < arr.length;j++){
						met = arr[8]+arr[9]+arr[10]+arr[11]+arr[12]+arr[13];
					}
					return met;
				}
				function eff(arr){
					var eff = 0;
					for (var j=0;j < arr.length;j++){
						eff = arr[14]+arr[15]+arr[16]+arr[17];
					}
					return eff;
				}
				function ord(arr){
					var ord = 0;
					for (var j=0;j < arr.length;j++){
						ord = arr[18]+arr[19];
					}
					return ord;
				}
				
		        document.getElementById("lab").value = sum(scores); 
		        document.getElementById("att").value = att(scores); 
		        document.getElementById("con").value = con(scores); 
		        document.getElementById("met").value = met(scores);
		        document.getElementById("eff").value = eff(scores); 
		        document.getElementById("ord").value = ord(scores);

		    	var submit = document.getElementById("submit");
		   		submit.onclick = function(event){
						 var un = scores.indexOf(0);
						if(un!=-1){
							webToast("未评完所有项","middle",1000);
							return false;
						}
						if(sum(scores)<60){
							webToast("总分不能低于60分","middle",1000);
							return false;
						}
						
						webToast("评教成功","middle",1000);
						return true;
			   		}
		             
		       }
		       }
		     
		       
		      // 数组分割 可以自定义成一个函数
		     function arrayChunck(arr,size){
		        if(!arr.length) return
		        var arrs = []
		        for(var i=0; i< Math.ceil(arr.length/7);i++){
		         var start = i*size
		         var end = start+size
		         arrs.push([].slice.call(arr,start,end))
		        }
		        return arrs
		       }

		     var maxLength = 20;
		     function changeinfo(obj)
			 {
			 document.getElementById("content").value+=obj.innerHTML+"#";
			var wordLength = document.getElementById("content").value.length;
			
			if(wordLength>maxLength)
			{
			   //如果超过就截取规定长度的内容
			document.getElementById("content").value = document.getElementById("content").value.substring(0,maxLength);
			}else{
				
			document.getElementById('show').innerHTML=wordLength;
			}
			 }
		     function CountWords(obj, show_id){ 
		    	 var fullStr = obj.value; 
		    	 var charCount = fullStr.length; 
		    	 var rExp = /[^A-Za-z0-9]/gi; 
		    	 var spacesStr = fullStr.replace(rExp, ' '); 
		    	 var cleanedStr = spacesStr + ' '; 
		    	 do{ 
		    	  var old_str = cleanedStr; 
		    	  cleanedStrcleanedStr = cleanedStr.replace(' ', ' '); 
		    	 }while( old_str != cleanedStr ); 
		    	  var splitString = cleanedStr.split(' '); 
		    	  

		    	  if(charCount>maxLength)
					{
					   //如果超过就截取规定长度的内容
					document.getElementById("content").value = document.getElementById("content").value.substring(0,maxLength);
					}else{
						document.getElementById(show_id).innerHTML=charCount; 
					}
		    	} 
			
			

		   

   </script>
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
</body>
</html>
