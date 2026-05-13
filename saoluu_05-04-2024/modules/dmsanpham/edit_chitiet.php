<?php
include("../../config.php");
$OBJ = new dmsanpham();
$OBJ->set_MaCT(check_data($_GET['masp']));
$OBJ->setMavt(check_data($_GET['mavt']));
$OBJ->setDinhmuc(check_data($_GET['dinhmuc']));
$OBJ->set_DVT(check_data($_GET['dvt']));
$OBJ->setTylehaohoc(check_data($_GET['tylehaohoc']));
$OBJ->setDinhmuckecakhauhao(check_data($_GET['dinhmuckecakhauhao']));
$TonTai = $OBJ->checkCTTonTai();
if($TonTai==TRUE){
    $OBJ->suaCTMaSP();
}else{
    $OBJ->themCTMaSP();
}
echo "{\"result\": \"success\"}";
?>