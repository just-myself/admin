<?php
require('00_init.php');
@$id_val = $_REQUEST["id_val"];
@$arr_id_val = explode('_',$id_val); 
$id = @$arr_id_val[0];
$val= @$arr_id_val[1];
$sql = "UPDATE  xz_order  SET  status = '$val'  WHERE aid = $id";
$result = mysqli_query($conn,$sql);
if($result){
 echo '{"code":1,"msg":"更新成功"}';
}else{
 echo '{"code":-1,"msg":"更新失败"}';    
}
