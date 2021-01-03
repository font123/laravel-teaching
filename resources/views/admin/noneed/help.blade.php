<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>获取地理位置</title>
    <style type="text/css">#iCenter{width:300px; height: 280px; border:1px #000 solid;margin:20px auto;}</style>
    <script type="text/javascript" src="http://webapi.amap.com/maps?v=1.4.3&key=393c4fcefc5bc2e6162abeb63ccf0314"></script>
</head>
<body>

<div id="iCenter"></div>

<script type="text/javascript">
    var mapObj = new AMap.Map('iCenter',{
   		 mapStyle: 'amap://styles/fd337b55cfaad736f0d8679ff7ee2f1d', 
		 zoom:10
   	 });
    mapObj.plugin('AMap.Geolocation', function () {
        geolocation = new AMap.Geolocation({
            enableHighAccuracy: true, // 是否使用高精度定位，默认:true
            timeout: 10000,           // 超过10秒后停止定位，默认：无穷大
            maximumAge: 0,            // 定位结果缓存0毫秒，默认：0
            convert: true,            // 自动偏移坐标，偏移后的坐标为高德坐标，默认：true
            showButton: true,         // 显示定位按钮，默认：true
            buttonPosition: 'LB',     // 定位按钮停靠位置，默认：'LB'，左下角
            buttonOffset: new AMap.Pixel(10, 20), // 定位按钮与设置的停靠位置的偏移量，默认：Pixel(10, 20)
            showMarker: true,         // 定位成功后在定位到的位置显示点标记，默认：true
            showCircle: true,         // 定位成功后用圆圈表示定位精度范围，默认：true
            panToLocation: true,      // 定位成功后将定位到的位置作为地图中心点，默认：true
            zoomToAccuracy:true       // 定位成功后调整地图视野范围使定位位置及精度范围视野内可见，默认：false
        });
        mapObj.addControl(geolocation);
        geolocation.getCurrentPosition();
        AMap.event.addListener(geolocation, 'complete', onComplete); // 返回定位信息
        AMap.event.addListener(geolocation, 'error', onError);       // 返回定位出错信息
    });

    function onComplete(obj){
        var res = '经纬度：' + obj.position + 
                '\n精度范围：' + obj.accuracy + 
                '米\n定位结果的来源：' + obj.location_type + 
                '\n状态信息：' + obj.info + 
                '\n地址：' + obj.formattedAddress + 
                '\n地址信息：' + JSON.stringify(obj.addressComponent, null, 4);
        console.log(obj.formattedAddress);
    }

    function onError(obj) {
        alert(obj.info + '--' + obj.message);
        console.log(obj);
    }
</script>
</body>
</html>
