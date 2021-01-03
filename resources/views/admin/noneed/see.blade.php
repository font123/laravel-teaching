<!DOCTYPE html>
<html>
   <head>
      <title>评教系统-教师听课</title>
	   <meta charset="UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	  <link rel="stylesheet" href="{{asset('resources/views/admin/style/font/icon1/iconfont.css')}}">	  
	   <script type="text/javascript" src="{{asset('resources/views/admin/style/js/jquery.min.js')}}"></script>
	   <script type="text/javascript" src="{{asset('resources/views/admin/style/js/index.js')}}"></script>
	
	  <style type="text/css">
        body{
			  margin: 0;
			  padding-bottom: 70px;
			  padding-top: 70px;
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
			  padding:0px 5% 0px 5%;			  
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
			 margin-bottom:15px;  
		 }
        .demo {
		     width: 360px;
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
		         padding: 10px;
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
             
            	 margin-left: 25%; 
               }
               
				 .list-count{
					 color: #969896;
					 margin-left: 43%;
					  
				 }
				
				 li {
				   transition-property: margin, background-color, border-color;
				   transition-duration: .4s, .2s, .2s;
				   transition-timing-function: ease-in-out, ease, ease;
				 }
				
				 ul{
					 margin: 0px 0px 0px;
					 padding: 0px 0px 0px 0px;
					 float:left;
					 width:100%;
					 
					 padding:0;
					 position:relative;
				 }
				 
				 
				 ul:before {
				   
				   position:absolute;
				  
				   font-size:2em;
				   text-align:right;
				   top:1.5em;
				   color:#ededed;
				   font-weight:bold;
				   font-family: 'Microsoft YaHei','Lantinghei SC','Open Sans',Arial,'Hiragino Sans GB','STHeiti','WenQuanYi Micro Hei','SimSun',sans-serif;
				   transform:rotate(-90deg);
				 }

             .search{
                 width: 50%;            
               
                 display: flex;
                 /*border: 1px solid red;*/
             }
             .search input{
                 float: left;//左浮动
                 flex: 4;
                 height: 30px;
                 outline: none;
                 border: 3px solid #76bbd8;
                 box-sizing: border-box;//盒子模型，怪异IE盒子模型，width=content+border*2+padding*2
                 padding-left: 10px;
        border-radius: 20px;
             }
               
	  </style>
   </head>
   <body>
	   
	   <div class="navbar navbar-fixed-top" style="background-color: #76bbd8;">
	        <div class="container">
		         <div class="row footer-bottom">
		             <div style="display: inline-block;" >
		             	<div style="margin-left: 30px;">
		             		<a href="{{url('admin/tperson')}}"><span class="iconfont icon-fanhui" style="font-size: 30px;color: white;"></span></a>
		             	</div>
		             </div>
		            <div style="display: inline-block;margin-left: 80px;" class="text-center">		            	
	              	     
	              	    <h3 style="color: white;">查看评教</h3>
	                          		
		            </div>
					
						  <hr style="margin: 0px 0px 0px 0px;">
		         </div>
		     </div>
	   </div>
	  
	  
	  
	 <section class="list-wrap">
	  <div id="main" class="container">
	  <div class="row" style="margin-top: 20px;">
	  	
		<div class="inpu" >
		<div class="search">
              <input type="text" placeholder="输入关键字" name="" id="search-text" value="" />                
           </div>
	</div>
	<span class="list-count"></span>
		  
		  </div>
	  </div>
	  @foreach ($data as $val)  
	 <form action="{{url('admin/tresult')}}" method="post">
        {{csrf_field()}}
	 <div class="container" >
          <div class="scope fr">
          <div class="option">
	   <!-- 左对齐 -->
	   
	<ul id="lists" style="list-style: none;">
	   <li class="in">
	   <div class="media" style="margin-bottom: 15px;">
	     <div class="media-left">
	       <a href="#"><span class="iconfont icon-icon-test" style="font-size: 30px;"></span></a>
	     </div>
	     <div class="media-body" >
	          <h4 class="media-heading">{{$val['course_name']}}-{{$val['class_id']}}</h4>
	          
	           <p>{{$val->time}}|{{$val->place}}</p>
	           <input class="hidden" name="coursename" value="{{$val->course_name}}">
	           <input class="hidden" name="teacher" value="{{$val->class_id}}">
	           <input class="hidden" name="time" value="{{$val->time}}">
	           <input class="hidden" name="place" value="{{$val->place}}">            
	     </div>
		 
		 <div class="media-right">
		  <!-- <a href="{{url('admin/yplan/'.$val['id'].'/edit')}}"> -->
		  <button type="submit" class="btn" style="background-color: #b48bb5;border-radius: 10px;"data-toggle="button">查看</button>
		  <!-- </a> -->
		 </div>
   </div>
    </li>
   </ul>
   </div>
   </div>
	 </div>
	
	</form>
	</section>
	@endforeach
	
	
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	
	<script type="text/javascript">
		
				var li = document.querySelectorAll('#list li');
				
				    for (var i = 0; i < li.length; i++)
				
				        li[i].onclick = function () {
				
				            for (var i = 0; i < li.length; i++) li[i].className = '';
				
				            this.className='active'
				
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