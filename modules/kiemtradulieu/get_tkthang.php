<?php
include("../../config.php");
$matk = $_GET['matk'];
$DenNgay = $_GET["denngay"];
$Thang = date("n", strtotime($DenNgay));
$OBJCT = new  ketoantonghop();
$sql = "select sum(thanhtientonck) as duno from tkthang where thang='".$Thang."' and matk='".$matk."';";
$result = $OBJCT->re_query($sql);
$num_row = $OBJCT->re_num_rows($result);
if($num_row>0){
	$data = $OBJCT->re_fetch($result);
	echo json_encode(["status" => "success", "data" => $data]);
}else{
	echo json_encode(["status" => "fail", "data" => 0]);
}