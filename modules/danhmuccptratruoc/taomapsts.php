<?php
include("../../config.php");
$OBJ = new danhmuccptratruoc();
$tanggiam = $_GET['tanggiam'];
$loai = $_GET['loai'];
if($loai=='xdcb'){
    $OBJ->set_orderby(" tanggiam = ".$tanggiam." and SUBSTRING(matk,1,3)=241 ");
}else{
    $OBJ->set_orderby(" tanggiam = ".$tanggiam." and SUBSTRING(matk,1,3)!=241 ");
}
$data = $OBJ->createMaPSTS();
echo $data;
?>