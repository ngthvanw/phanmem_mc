<?php
include("../../config.php");
$OBJ = new danhmuccptratruoc();
$ma = $_GET['maps'];
$tanggiam = $_GET['tanggiam'];
$loai = $_GET['loai'];

if($loai=='xdcb'){
    $OBJ->set_orderby(" mapsts ='".$ma."' and tanggiam='".$tanggiam."' and SUBSTRING(matk,1,3)=241 ");
}else{
    $OBJ->set_orderby(" mapsts ='".$ma."' and tanggiam='".$tanggiam."' and SUBSTRING(matk,1,3)!=241 ");
}
$data = $OBJ->loadListPSMaTaiSan();
echo json_encode($data);