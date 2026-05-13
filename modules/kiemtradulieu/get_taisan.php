<?php
include("../../config.php");
$matk = $_GET['matk'];
$DenNgay = $_GET["denngay"];
$Thang = date("n", strtotime($DenNgay));
$OBJCT = new  ketoantonghop();
$sql = "SELECT 
				mats AS macptt,
				(
					SELECT nguyengia 
					FROM bangkhtaisan b2
					WHERE b2.mats = b1.mats AND b2.thang = ".$Thang."
					ORDER BY b2.thang ASC
					LIMIT 1
				) AS nguyengia,
				SUM(tienno) AS khnam,
				gtconlai AS gtconlaidk
			FROM 
				bangkhtaisan b1
			WHERE 
				matk LIKE '".$matk."%' 
				AND mats NOT IN (SELECT mats FROM bangkhtaisan WHERE daban=1)
				AND thang <= ".$Thang."
			GROUP BY mats;
			";		
$result = $OBJCT->re_query($sql);
$num_row = $OBJCT->re_num_rows($result);
if($num_row>0){
	$data = $OBJCT->re_fetch_all($result);
	//debug($data);
	$TongNguyenGia = 0;
	foreach($data as $item){
		$TongNguyenGia+=$item['nguyengia'];
	}
	$data_re = array("duno"=>$TongNguyenGia);
	echo json_encode(["status" => "success", "data" => $data_re]);
}else{
	echo json_encode(["status" => "fail", "data" => 0]);
}