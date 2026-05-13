<?php
include("../../config.php");
debug($_GET);
$OBJ = new dmsanpham();
$OBJ->set_MaCT(check_data($_GET['masp']));
$OBJ->setMavt(check_data($_GET['mavt']));
$OBJ->set_DVT(check_data($_GET['dvt']));
$OBJ->setSoLuong(check_data($_GET['soluong']));
$OBJ->setDonGia(check_data($_GET['dongia']));
$OBJ->setThanhTien(check_data($_GET['thanhtien']));
$OBJ->setThue(check_data($_GET['thue']));
$OBJ->setMaHangMuc(check_data($_GET['mahm']));
$OBJ->setTenHangMuc(check_data($_GET['tenhm']));
$TonTai = $OBJ->checkCTTonTaiCT_HM();
if($TonTai==TRUE){
    $OBJ->suaCTMaCTVL();
}else{
    $OBJ->themCTMaCTVL();
}
echo "{\"result\": \"success\"}";
?>