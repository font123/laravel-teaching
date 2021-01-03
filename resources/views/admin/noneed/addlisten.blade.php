<!DOCTYPE html>
<html>
   <head>
      <title>评教系统-教师听课</title>
	   <meta charset="UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	  <link rel="stylesheet" href="{{asset('resources/views/admin/style/font/css/iconfont.css')}}">
	<!--   <link rel="stylesheet" href="{{asset('resources/views/admin/style/css/style1.css')}}"> -->
	 
	  
	  
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
			   padding:0px 45px 0px 47px;			  
			  
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
             .tip{
             	text-align:center;
             	color:red;		 
             }
	 </style>
   </head>
   <body>
	   
	   <div class="navbar navbar-fixed-top" style="background-color: #76bbd8;">
	       <div class="container">
			   
	           <div class="row footer-bottom">
	               
	              <ul class="list-inline text-center" id="list">
	              	    <h3 class ="text-center" style="color: white;">教师听课</h3>
	              </ul>
				  <hr style="margin: 0px 0px 0px 0px;">
	           </div>
	       </div>
	   </div>
        
        <section class="list-wrap">
	  <div id="main" class="container">
	  <div class="row" style="margin-top: 8px;">	  
		  </div>
	  </div>
	  
	 <form action="{{url('admin/add')}}" method="post">
        {{csrf_field()}}
	 <div class="container" >
          <div class="scope fr">
          <div class="option">
	   <!-- 左对齐 -->
	   @if(session('msg'))
        <div class="tip">
        <p>{{session('msg')}}</p>
        </div>
        @endif
	   <div class="inpu" >
		<div class="search">
              <input type="text" placeholder="输入关键字" name="" id="search-text" value="" />                
           </div>
	</div>
	<span class="list-count"></span>
	   @foreach ($data as $val)  
	     <ul id="lists" style="list-style: none;">
	   <li class="in">
	   <div class="media" >
	     <div class="media-left">
	       <a href="#"><span class="iconfont icon-icon-test" style="font-size: 30px;"></span></a>
	     </div>
	     <div class="media-body" >
	          <h4 class="media-heading">{{$val['name']}}-{{$val['teacher']}}</h4>
	           <p>{{$val->time}}|{{$val->place}}</p>
	           <input class="hidden" name="coursename" value="{{$val->name}}">
	           <input class="hidden" name="teacher" value="{{$val->teacher}}">
	           <input class="hidden" name="time" value="{{$val->time}}">
	           <input class="hidden" name="place" value="{{$val->place}}">            
	     </div>
		 
		 <div class="media-right">
		  <!-- <a href="{{url('admin/yplan/'.$val['id'].'/edit')}}"> -->
		  <button type="submit" id="btn" class="btn" style="background-color: #b48bb5;border-radius: 10px;"data-toggle="button"> 添加听课</button>
		  <!-- </a> -->
		 </div>
   </div>
    </li>
   </ul>
   @endforeach
   
   </div>
   </div>
	 </div>
	
	</form>
	</section>
	<div class="footer navbar-fixed-bottom">
	    <div class="container">
	        <div class="row footer-bottom">
	            <hr style="margin: 0px 0px 0px 0px;">
	           <ul class="list-inline text-center" id="list">
	           	<li><a href="{{url('admin/tclass')}}"><span class="iconfont icon-B" style="font-size: 30px;"></span><p>首页</p></a></li>
	           
	           	<li class="active"><a href="#"><span class="iconfont icon-gongzhang" style="font-size: 30px;"></span><p>听课</p></a></li>
	           	<li><a href="{{url('admin/tperson')}}"><span class="iconfont icon-yaoqing" style="font-size: 30px;"></span><p>我的</p></a></li>
	           </ul>
	        </div>
	    </div>
	</div>
	 
	 <script type="text/javascript" src="{{asset('resources/views/admin/style/js/jquery.min.js')}}"></script>
	  <script type="text/javascript" src="{{asset('resources/views/admin/style/js/index.js')}}"></script>
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	
	<script type="text/javascript">
		
				var li = document.querySelectorAll('#list li');
				
				    for (var i = 0; i < li.length; i++)
				
				        li[i].onclick = function () {
				
				            for (var i = 0; i < li.length; i++) li[i].className = '';
				
				            this.className='active'
				
				        }
				
				
				
					
	</script>
	
   </body>
</html>