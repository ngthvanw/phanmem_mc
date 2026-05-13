<?php
$URL = str_replace("/","_",$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);
if($URL=="146.196.65.92_phanmem_mc_"){
	header('Location: http://ketoan.ketoanchienthuat.vn');
}
if($URL=="146.196.65.92_chinhanh_vinhlong_"){
	header('Location: http://vinhlong.ketoanchienthuat.vn');
}
if($URL=="146.196.65.92_chinhanh_binhminh_"){
	header('Location: http://binhminh.ketoanchienthuat.vn');
}
if($URL=="146.196.65.92_quanly_banhang_"){
	header('Location: http://banhang.ketoanchienthuat.vn');
}
?>