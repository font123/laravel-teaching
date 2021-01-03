@extends('layouts.admin')
@section('content')
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<style>
</style>
</head>
<body>
<div class="gridcontainer">
    <div class="gridwrapper">
        <div class="gridbox gridheader">
            <div class="header">
				<div class="row justify-content-center">
					<img alt="" src="https://www.gdqy.edu.cn/dfiles/11334/viscms/r/cms/test/default/images/logo/logo1.jpg" style="height:90px;width:90px;border-radius:50px;">
					
				</div>
				<h1 style="padding-top: 8px; text-align:center;">广东轻工职业技术学院</h1>
			</div>
        </div>
		<div class="row justify-content-center">
        <div class="card col-md-5 col-sm-5 col-10">
        
			<form action="" method="post">
				 {{csrf_field()}}
				<h2 class="mt-4">评教系统</h2>
				@if(session('msg'))
				<div class="row justify-content-center">
					<span class="" style="color:red">{{session('msg')}}</span>
				</div>
				@endif
				<div class="form-group row mt-4">
				<div class="col-12">
						<div class="user"><img src="{{asset('resources/views/admin/style/img/person.png')}}"></div>
					  <input type="text" class="form-control required" id="inputUsername" name="username" placeholder="账号">
				</div>
				</div>
				<div class="form-group row">
				<div class="col-12">
				<div class="pw"><img src="{{asset('resources/views/admin/style/img/pw.png')}}"></div>
					<input type="password" class="form-control required" id="inputPassword" name="password" placeholder="密码">
				</div>
				</div>
				<div class="form-group row">
					<div class="col-8">
					<div class="code"><img src="{{asset('resources/views/admin/style/img/code.png')}}"></div>
						<input type="text" class="form-control required" id="inputCode" name="code" placeholder="验证码">
					</div>
					<div class="col-2">
						<img alt="" src="{{url('admin/code')}}" onclick="this.src='{{url('admin/code')}}?'+Math.random()">
					</div>
				</div>
				
				<select name="select" id="select">
                    <option value="2" selected>督导</option>
                    <option value="3">教师</option>
                    <option value="4">学生</option>
                </select>
				<div class="form-group mt-4">
				<div class="login row ">
					<div class="col-12 ">
						<button type="submit" class="btn  btn-block">立即登录</button>
					</div>
				</div>
				</div>
			</form>
        </div>
		</div>
    </div>
</div>
</body>
</html>
@endsection