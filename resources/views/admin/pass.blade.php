
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<style>
    body{
    	background-color: #eff1fc;	  
    }
    input{
	  /*  box-shadow: 2px 2px 2px #eff1fc; */
    	border-radius: 6px;
    	line-height:30px;
    }
</style>
</head>
<body>


<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>修改密码</h3>
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
    </div>
</div>
<!--结果集标题与导航组件 结束-->

<div class="result_wrap">
    <form method="post" action="" onsubmit="return changePass()">
        {{csrf_field()}}
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
                    <button type="submit" value="提交" style="margin-right:30px;">确认修改</button>
                    <button type="button" class="back" onclick="history.go(-1)" value="返回">返回</button>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
</body>

