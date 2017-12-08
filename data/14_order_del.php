<?php
require('00_init.php');
@$id = $_REQUEST["id"];
//ALTER TABLE xz_laptop ADD expire ENUM('0','1') NOT NULL DEFAULT '0';
$sql = "UPDATE  xz_order  SET  expire = '1'  WHERE aid = $id";
@$result = mysqli_query($conn,$sql);
//echo mysqli_error($conn);
if($result){
    echo '{"code":1,"msg":"删除成功"}';
}else{
    echo '{"code":-1,"msg":"删除失败"}';
}