<html>
<body>
<style>
.content{
	background:skyblue;
	width:300px;
}
</style>
<div class="content">
    <h1>for循环</h1>
  <table broder=1>
  @for($i = 0;$i < count($student);$i++)
      @if($i%4 == 0) 
      <br>
      @endif
      {{$student[$i]}} 
    @endfor 
  </table>  
</div>
</body>
</html>
