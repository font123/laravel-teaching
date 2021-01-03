<!DOCTYPE html>
<html>
   <head>
      <title>评教系统-听课计划</title>
	  <meta charset="UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

	 <link rel="stylesheet" href="{{asset('resources/views/admin/style/font/icon1/iconfont.css')}}">
	  <link rel="stylesheet" href="{{asset('resources/views/admin/style/css/style.css')}}">
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
			  height: 11%;
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
			background-color: #76bbd8;
			border-radius: 25px;
			
			padding: 15px; 
			width: 100%;
			box-shadow: 2px 4px 6px #000000;
			   
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
				 .inpu{
					 margin-bottom:2%;
					 
				 }
	  </style>
   </head>
   <body>
	   
	   <div class="navbar navbar-fixed-top" style="background-color: #76bbd8;">
	        <div class="container">
	            <div class="row footer-bottom">
	                <div style="display: inline-block;" >
	                	<ul style="margin: 0;">
	                		<a href="{{url('admin/tlisten')}}"><span class="iconfont icon-fanhui" style="font-size: 30px;color: white;"></span></a>
	                	</ul>
	                </div>
	               <div style="display: inline-block;">
	               	<ul class="" style="margin-left: 25px;">
	               		  <h3  style="color: white; ">听课计划</h3>
	               	</ul>
	               </div>
	   			
	   				  <hr style="margin: 0px 0px 0px 0px;">
	            </div>
	        </div>
	   	 </div>
	  
	  <div class="inpu" >
	  <p>
	     <a href="{{url('admin/yplan')}}"><button type="button" class="btn btn-primary btn-lg" style="width: 180px; background-color: #76bbd8;">未完成</button></a>
		 <button type="button" class="btn btn-primary btn-lg" style="width: 180px; background-color: #b48bb5;">已完成</button>
	  </p>
	    </div>
	  
	  <div id="main" class="container">
	  <div class="row" style="margin-top: 20px;+">
	  	

		  
		  </div>
	  </div>
    
	 <div class="container" >
          <div class="scope fr">
          <div class="option">
	   <!-- 左对齐 -->
	   <div class="media">
	     <div class="media-left">
	       <a href="#"><span class="iconfont icon-icon-test" style="font-size: 30px;"></span></a>
	     </div>
	     <div class="media-body" >
	         <h4 class="media-heading">web前端-付老师</h4>
	               <p>周一1-4节C203|周二7-20节D304</p>
	     </div>
		 
		 <div class="media-right">
		  <button type="button" class="btn" style="background-color: #b48bb5;border-radius: 10px;"
		      data-toggle="button"> 评教
		  </button>
		 </div>
	   </div>
	   
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	
	<script type="text/javascript">
		
				var li = document.querySelectorAll('#list li');
				
				    for (var i = 0; i < li.length; i++)
				
				        li[i].onclick = function () {
				
				            for (var i = 0; i < li.length; i++) li[i].className = '';
				
				            this.className='active'
				
				        }
						
				 var btns = document.querySelectorAll('.inpu button');
				    for (var i = 0; i < btns.length; i++) {
				        btns[i].onclick=function () {
				            console.log(i);
				            for (var j=0;j<btns.length;++j){
				                btns[j].style.backgroundColor='#76bbd8';
				            }
				            this.style.backgroundColor='#b48bb5';
				        }
				    }
				$(function(){
				
				$("#filterName").keyup(function(){
				
				$(".option div").hide().filter(":contains('"+($(this).val())+"')").show();
				
				}).keyup();
				
				$(".option div").click(function(){
				
				var _txt=$(this).text();
				
				$("#filterName").val(_txt);
				
				})
				
				})
							
	</script>
	
   </body>
</html>