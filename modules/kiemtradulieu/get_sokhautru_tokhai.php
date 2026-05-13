<?php
include("../../config.php");
$matk = $_GET['matk'];
$DenNgay = $_GET["denngay"];
$Thang = date("n", strtotime($DenNgay));
$T = "12-";
$Q = "IV-";
if($Thang==3){
	$T = "3-";
	$Q = "I-";
}else if($Thang==6){
	$T = "6-";
	$Q = "II-";
}else if($Thang==9){
	$T = "9-";
	$Q = "III-";
}else{
	$T = "12-";
	$Q = "IV-";
}
$OBJCT = new  ketoantonghop();
$sql = "select thue as duno from tokhaithue where (thang='"$T.$_SESSION['NienDo']."' or thang='"$Q.$_SESSION['NienDo']."') and matkhai='VI42' ORDER BY loaitokhai ASC LIMIT 1;";
$result = $OBJCT->re_query($sql);
$num_row = $OBJCT->re_num_rows($result);
if($num_row>0){
	$data = $OBJCT->re_fetch($result);
	echo json_encode(["status" => "success", "data" => $data]);
}else{
	echo json_encode(["status" => "fail", "data" => 0]);
}