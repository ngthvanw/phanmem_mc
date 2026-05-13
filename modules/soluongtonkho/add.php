<?php
include("../../config.php");
$OBJ = new soluongton();
//$sott = $OBJ->createSoTT();
//$OBJ->set_SoTT($sott);
$OBJ->set_SoTT($_GET['sott']);
$OBJ->set_MaVT($_GET['mavt']);
$OBJ->setMaNhaCungCap($_GET['mancc']);
$OBJ->set_TenVT(check_data($_GET['tenvt']));
$OBJ->set_TenKD(khu_dau_vn(check_data($_GET['tenvt'])));
$OBJ->set_MaTK(check_data($_GET['matk']));
$OBJ->set_QuyCach(check_data($_GET['quycach']));

$OBJ->set_DVT(check_data($_GET['dvt']));

$OBJ->set_MaNhom(check_data($_GET['manhom']));
$OBJ->set_TenNhom(check_data($_GET['tennhom']));

$OBJ->setMaKho(check_data($_GET['makho']));
$OBJ->setTenKho(check_data($_GET['tenkho']));

$OBJ->setSLCK(check_data(str_replace(",", "", $_GET['slck'])));// Số lượng tồn kho
$OBJ->set_GiaMua(check_data(str_replace(",", "", $_GET['gtvnck'])));// GIá Mua
$OBJ->setdgxvnd(check_data(str_replace(",", "", $_GET['dgxvnd'])));// Thành tiền
$OBJ->set_Rate(check_data($_GET['rate']));


$OBJ->set_GiaBan(check_data(str_replace(",", "", $_GET['giaban'])));

$OBJ->suaTKTMPMaVT();

?>