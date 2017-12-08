<?php
require('00_init.php');
@$lid = $_REQUEST["lid"];
//ALTER TABLE xz_laptop ADD expire ENUM('0','1') NOT NULL DEFAULT '0';
$sql = "UPDATE  xz_laptop  SET  expire = '1'  WHERE lid = $lid";
@$result = mysqli_query($conn,$sql);
if($result){
    echo '{"code":1,"msg":"删除成功"}';
}else{
    echo '{"code":-1,"msg":"删除失败"}';
}