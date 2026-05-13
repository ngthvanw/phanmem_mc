<?php
include("../../config.php");
$matk = $_GET['matk'];
$OBJCT = new  ketoantonghop();
$sql = "SELECT 
		mats as macptt,
		nguyengia,
		SUM(tienno) AS khnam,
		gtconlai AS gtconlaidk
	FROM 
		bangpbchiphi
	WHERE 
		matk LIKE '".$matk."%'
	GROUP BY mats
		;";		
$result = $OBJCT->re_query($sql);
$num_row = $OBJCT->re_num_rows($result);
if($num_row>0){
	$data = $OBJCT->re_fetch_all($result);
	$TongGTConLaiDK = 0;
	$TongKHNam = 0;
	foreach($data as $item){
		$TongGTConLaiDK+=$item['gtconlaidk'];
		$TongKHNam+=$item['khnam'];
	}
	$GTConLai = $TongGTConLaiDK - $TongKHNam;
	$data_re = array("duno"=>$GTConLai);
	echo json_encode(["status" => "success", "data" => $data_re]);
}else{
	echo json_encode(["status" => "fail", "data" => 0]);
}