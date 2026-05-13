<?php
include("../../config.php");
$OBJCT = new  ketoantonghop();
$sql = "select (sum(vongop)+sum(vongoptrongky)) as duco from psvoncsh;";
$result = $OBJCT->re_query($sql);
$num_row = $OBJCT->re_num_rows($result);
if($num_row>0){
	$data = $OBJCT->re_fetch($result);
	echo json_encode(["status" => "success", "data" => $data]);
}else{
	echo json_encode(["status" => "fail", "data" => 0]);
}