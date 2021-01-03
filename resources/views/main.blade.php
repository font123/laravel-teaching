<html>
<style>
.body{
	width:205px;
	background:skyblue;
}
.header{
	width:205px;
	background:white;
}
</style>
<body>
<h1>foreach循环</h1>
<div class="body">
<table border=1>
    <tr class="header">
    <td>id</td><td>name</td><td>sex</td><td>dormitoryno</td>
    </tr>
@foreach($user as $no)
     <tr>
        <td>{{$no->id}}</td><td>{{$no->name}}</td>
        <td>{{$no->sex}}</td><td>{{$no->dormitoryno}}</td>
     </tr>
@endforeach
</table>
</div>
</body>
</html>

