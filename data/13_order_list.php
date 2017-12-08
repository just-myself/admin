<?php
require('00_init.php');
/**
*分页显示所有的笔记本商品信息
*/
@$kw = $_REQUEST['kw'];
@$pno = $_REQUEST['pno'];
if(!$pno){
  $pno = 1;
}else {
  $pno = intval($pno);
}





@$pageSize = $_REQUEST['pageSize'];
if(!$pageSize){
  $pageSize = 10;
}else {
  $pageSize = intval($pageSize);
}

$output = [
  'recordCount' => 0,     //满足条件的总记录数
  'pageSize' => $pageSize,        //每页大小，即每页最多可以显示的记录数量
  'pageCount' => 0,       //总页数
  'pno' => $pno,          //当前数据所在页号
  'data' => null          //当前页中的数据
];

//获取总记录数
$sql = "SELECT COUNT(*) FROM xz_order WHERE 1=1 ";
if($kw){
  $kw = urldecode($kw);
  $sql .= " AND status = $kw";
}

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
$output['recordCount'] = intval($row[0]);

//计算总页数
$output['pageCount'] = ceil($output['recordCount']/$output['pageSize']);

//获取指定页中的数据
$start = ($output['pno']-1)*$output['pageSize'];
$count = $output['pageSize'];


$sql =  "SELECT o.expire,o.aid,u.uname,a.receiver,o.status,o.order_time,p.name ";
$sql .=  " FROM  xz_laptop p,xz_order o,xz_order_detail d,";
$sql .=  " xz_receiver_address a,xz_user u";
$sql .=  " WHERE d.product_id =  p.lid AND ";
$sql .=  " o.address_id = a.aid AND";
$sql .=  " u.uid = o.user_id AND ";
$sql .=  " o.aid = d.order_id ";
if($kw){
 $sql .= " AND status = $kw";
}
$sql .=  " ORDER BY o.aid DESC LIMIT $start,$count";
$result = mysqli_query($conn,$sql);
 if(!$result){       //SQL语句执行失败
   echo('{"code":500, "msg":"db execute err"}');
   echo mysqli_error($conn);
 }else {
   $list = mysqli_fetch_all($result, MYSQLI_ASSOC);
   $output['data'] = $list;
   echo json_encode($output);
}