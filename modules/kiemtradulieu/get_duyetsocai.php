<?php
include("../../config.php");
$matk = $_GET['matk'];
$OBJCT = new  ketoantonghop();
$sql = "select sodu as duno from duyetsocai where matk='".$matk."' ORDER BY sott DESC LIMIT 1;";
$result = $OBJCT->re_query($sql);
$num_row = $OBJCT->re_num_rows($result);
if($num_row>0){
	$data = $OBJCT->re_fetch($result);
	echo json_encode(["status" => "success", "data" => $data]);
}else{
	echo json_encode(["status" => "fail", "data" => 0]);
}