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
		bangkhtaisan
	WHERE 
		tkco LIKE '".$matk."%' and mats not in (select mats from bangkhtaisan where daban=1)
	GROUP BY mats,nguyengia,gtconlai
		;";		
$result = $OBJCT->re_query($sql);
$num_row = $OBJCT->re_num_rows($result);
if($num_row>0){
	$data = $OBJCT->re_fetch_all($result);
	$TongNguyenGia = 0;
	$TongGTConLaiDK = 0;
	$TongKHNam = 0;
	foreach($data as $item){
		$TongNguyenGia+=$item['nguyengia'];
		$TongGTConLaiDK+=$item['gtconlaidk'];
		$TongKHNam+=$item['khnam'];
	}
	$TongHMDauKy = ($TongNguyenGia - $TongGTConLaiDK);
	$HaoMonLuyKy =($TongHMDauKy + $TongKHNam);
	$data_re = array("duno"=>$HaoMonLuyKy);
	echo json_encode(["status" => "success", "data" => $data_re]);
}else{
	echo json_encode(["status" => "fail", "data" => 0]);
}