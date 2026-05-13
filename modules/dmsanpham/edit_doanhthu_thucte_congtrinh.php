<?php
include("../../config.php");
$OBJ = new dmsanpham();
$OBJ->set_SoTT(check_data($_GET['sott']));
$OBJ->set_MaCT(check_data($_GET['mact']));
$OBJ->setGTCongTrinh(check_data($_GET['gtcongtrinh']));
$OBJ->setDoanhThuThucTe(check_data($_GET['doanhthuthucte']));
$OBJ->setTyLe(check_data($_GET['tyle']));

$OBJ->suaDoanhThuThucTe_CongTrinh();
echo "{\"result\": \"success\"}";
?>