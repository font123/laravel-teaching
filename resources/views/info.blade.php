<html>
<head></head>
<body>
@foreach($user as $one)
    {{$one->name}}--{{$one->sex}}<br>
@endforeach
</body>
</html>

