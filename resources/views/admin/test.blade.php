
  <form action="{{ URL('schedule') }}" method="POST" enctype="multipart/form-data">
  						{{csrf_field()}}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="class_id" value='{{$classid}}'>
                        <table border='1'>
                            <tr>
                                <th>时间</th>
                                <th>节次</th>
                                <th>周一</th>
                                <th>周二</th>
                                <th>周三</th>
                                <th>周四</th>
                                <th>周五</th>
                                <th>周六</th>
                                <th>周日</th>
                            </tr>
                            
                                
                            
                            <?php 
 
                                for ($i=1; $i <= 8; $i++) {
                                    
                                    $w[$i] = "w".$i; 
                                    echo "<tr>";
                                    for ($k=0; $k < 9; $k++) { 
                                        $t = $i*9+$k;
                                        $sd = 'sd'.$t;//每个select上的坐标，section day简写
                                        if($t == $i*9+1){
                                            echo "<td>".($i)."</td>";
                                        }else if($t == $i*9){
                                            echo "<td>".$time[$w[$i]]."</td>";
                                        }else if($t == $i*9+7 || $t==$i*9+8){
                                            echo "<td>休息</td>";
                                        }else {
                                             echo "<td>";
                                             echo "<select name=".$sd.">";
                                             echo "<option value='1'>请选择</option>";
                                             foreach($teachers as $t){
                                                 echo "<option value=".$t['value'].">";
                                                 echo $t['name'];
                                                 echo "</option>";
                                             }
                                            
                                             echo "</select>";
                                             echo "</td>";
                                       
                                        }
 
                                       
                                        
                                    }
                                    echo "</tr>";
                                }
 
 
                             ?>
                        </table>
                        <input type="submit" value="保存" class='btn btn-success'>
                    </form>