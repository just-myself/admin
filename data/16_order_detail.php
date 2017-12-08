<?php
require("00_init.php");
@$id = $_REQUEST["id"];
//ALTER TABLE xz_laptop ADD expire ENUM('0','1') NOT NULL DEFAULT '0';
$sql = "SELECT * FROM xz_order  WHERE aid = $id";
@$result = mysqli_query($conn,$sql);
@$row = mysqli_fetch_assoc($result);
echo json_encode($row);
