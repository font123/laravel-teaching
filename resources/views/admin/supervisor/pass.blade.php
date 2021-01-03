
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/style4.css')}}">
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/plugins.css')}}">
<style>
    body{
    	background-color: #eff1fc;	
    	 
    }
    input{
	  /*  box-shadow: 2px 2px 2px #eff1fc; */
    	border-radius: 6px;
    	line-height:30px;
    	margin-bottom:10px;
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
	
    .mark{
 	text-align:center;
 	color:red;		 
    } 
    .result_wrap{
    	margin-top:100px;
    }
</style>
</head>
<body>


<div class="wrapper">
<!--结果集标题与导航组件 结束-->
    <header class="main-header">
      <div class="container_header phone_view border_top_bott">
        <div class="row">
          <div class="col-md-12 d-flex justify-content-between align-items-center">
             <div class="" style="margin-left: 10px;"> <a href="{{url('admin/dperson')}}" ><img src="{{asset('resources/views/admin/style/img/back.png')}}" ></a> </div>
            <div class="logo d-flex align-items-center justify-content-center"> <a href="javascript:void(0)"> <h4 style="margin-top: 10px;margin-right: 60px;font-size:18px;">修改密码</h4></a> </div>
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
<div class="result_wrap">
    <form method="post" action="" onsubmit="return changePass()">
        {{csrf_field()}}
        <div class="container-fluid">
        	<div class="breadcrumbbar">
		  <!-- Start row -->
		  <div class="row">
			  
			<div class="col-md-6 col-lg-6 col-xl-4">
			<div class="card m-b-30">
			      @if(count($errors)>0)
                    <div class="mark">
                    @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                    @endforeach
                    </div>
                    @endif
                    @if(session('msg'))
                    <div class="mark">
                    <p>{{session('msg')}}</p>
                    </div>
                    @endif
			    <div class="card-body">
			  <table class="add_tab">
            <tbody>
            <tr>
                <th width="145">原密码：</th><!-- <i class="require">*</i> -->
                <td>
                    <input type="password" name="password_o" placeholder="请输入原始密码">              	
                </td>
            </tr>
            <tr>
                <th>新密码：</th>
                <td>
                    <input type="password" name="password" placeholder="新密码6-13位">
                </td>
            </tr>
            <tr>
                <th>确认密码：</th>
                <td>
                    <input type="password" name="password_a" placeholder="再次输入密码">
                </td>
            </tr>
            <tr">
                <th></th>
                <td  style="padding-top:20px;">
                    <button type="submit" class="btn btn-primary" value="提交" style="margin-right:20px;" id="submit">确认修改</button>
                    <a href="{{url('admin/dperson')}}"><button type="button" class="btn btn-secondary" value="返回">返回</button></a>
                </td>
            </tr>
            </tbody>
        </table>
			    </div>
		   	
		</div>
		  </div>
		</div>
        </div>
    </form>
</div>
</div>


</body>

