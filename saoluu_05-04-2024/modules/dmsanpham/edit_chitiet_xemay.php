<?php
include("../../config.php");
$OBJ = new dmsanpham();
$OBJ->set_MaCT(check_data($_GET['masp']));
$OBJ->setMavt(check_data($_GET['maloaiduong']));
$OBJ->setDinhmuc(check_data($_GET['sokm']));
//$OBJ->set_DVT(check_data($_GET['dvt']));
$OBJ->setTylehaohoc(check_data($_GET['litkmdau']));
$OBJ->setDinhmuckecakhauhao(check_data($_GET['tongdau']));
$TonTai = $OBJ->checkCTXeMayTonTai();
if($TonTai==TRUE){
    $OBJ->suaCTXeMay();
}else{
    $OBJ->themCTXeMay();
}
echo "{\"result\": \"success\"}";
?>