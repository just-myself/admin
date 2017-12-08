<?php
require("00_init.php");
$title = $_REQUEST['title'];
$subtitle = $_REQUEST['subtitle'];
$price = $_REQUEST['price'];
$promise = $_REQUEST['promise'];
$spec = $_REQUEST['spec'];
$lname = $_REQUEST['lname'];
$os = $_REQUEST['os'];
$memory = $_REQUEST['memory'];
$resolution = $_REQUEST['resolution'];
$video_card = $_REQUEST['video_card'];
$cpu = $_REQUEST['cpu'];
$video_memory = $_REQUEST['video_memory'];
$category = $_REQUEST['category'];
$disk = $_REQUEST['disk'];
$is_onsale = $_REQUEST['is_onsale'];
$details = $_REQUEST['details'];


// array(16) {
//     ["title"]=>
//     string(9) "apple mac"
//     ["subtitle"]=>
//     string(3) "air"
//     ["price"]=>
//     string(8) "10000.90"
//     ["promise"]=>
//     string(12) "保修一年"
//     ["spec"]=>
//     string(5) "13寸"
//     ["lname"]=>
//     string(15) "苹果笔记本"
//     ["os"]=>
//     string(6) "osx 11"
//     ["memory"]=>
//     string(5) "128gb"
//     ["resolution"]=>
//     string(4) "1400"
//     ["video_card"]=>
//     string(7) "daxu001"
//     ["cpu"]=>
//     string(6) "arm 11"
//     ["video_memory"]=>
//     string(3) "11m"
//     ["category"]=>
//     string(9) "笔记本"
//     ["disk"]=>
//     string(3) "1tb"
//     ["is_onsale"]=>
//     string(1) "1"
//     ["details"]=>
//     string(18) "苹果苹果苹果"
//   }
  

// | lid          | int(11)       | NO   | PRI | NULL    | auto_increment |
// | family_id    | int(11)       | YES  |     | NULL    |                |
// | title        | varchar(128)  | YES  |     | NULL    |                |
// | subtitle     | varchar(128)  | YES  |     | NULL    |                |
// | price        | decimal(10,2) | YES  |     | NULL    |                |
// | promise      | varchar(64)   | YES  |     | NULL    |                |
// | spec         | varchar(64)   | YES  |     | NULL    |                |
// | name         | varchar(32)   | YES  |     | NULL    |                |
// | os           | varchar(32)   | YES  |     | NULL    |                |
// | memory       | varchar(32)   | YES  |     | NULL    |                |
// | resolution   | varchar(32)   | YES  |     | NULL    |                |
// | video_card   | varchar(32)   | YES  |     | NULL    |                |
// | cpu          | varchar(32)   | YES  |     | NULL    |                |
// | video_memory | varchar(32)   | YES  |     | NULL    |                |
// | category     | varchar(32)   | YES  |     | NULL    |                |
// | disk         | varchar(32)   | YES  |     | NULL    |                |
// | details      | varchar(1024) | YES  |     | NULL    |                |
// | shelf_time   | bigint(20)    | YES  |     | NULL    |                |
// | sold_count   | int(11)       | YES  |     | NULL    |                |
// | is_onsale    | tinyint(1)    | YES  |     | NULL    |                |
// | expire 

$sql = "INSERT INTO xz_laptop VALUES(null,";
$sql .=" 1,'$title','$subtitle',$price,'$promise',";
$sql .=" '$spec','$lname','$os','$memory','$resolution',";
$sql .=" '$video_card','$cpu','$video_memory','$category',";
$sql .=" '$disk','$details',UNIX_TIMESTAMP(),1,'$is_onsale','0'";
$sql .=" )";
//echo $sql;
$result = mysqli_query($conn,$sql);
if($result==true){
    echo '{"code":1,"msg":"添加成功"}';
}else{
    echo mysqli_error();
    echo '{"code":-1,"msg":"添加失败"}';
}
