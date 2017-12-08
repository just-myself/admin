<?php
require('00_init.php');
@$uid = $_REQUEST["uid"];
@$old_pwd = $_REQUEST["old_pwd"];
@$new_pwd = $_REQUEST["new_pwd"];
//echo "|".$new_pwd."|";
$sql = "SELECT * FROM xz_user WHERE upwd = '$old_pwd'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if($row==null){
    echo '{"code":-1,"msg":"旧密码有误"}';
    exit; 
}else{
    $sql = "UPDATE  xz_user  SET  upwd = '$new_pwd'  WHERE uid = $uid";
    $result = mysqli_query($conn,$sql);
    echo '{"code":1,"msg":"更新成功"}';
}
