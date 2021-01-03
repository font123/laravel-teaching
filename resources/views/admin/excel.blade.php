

<body> 
<form action="/laravel/admin/import" method='post' enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input id="fileId1" type="file" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" name="file"/>
    <input type="submit" value="确认">
    
</form>
</body>


