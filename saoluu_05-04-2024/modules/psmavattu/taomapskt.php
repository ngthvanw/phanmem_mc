<?php
include("../../config.php");
$OBJ = new psmavattu();
$LoaiPhieu = $_GET['lp'];
$OBJ->set_orderby(" loaiphieu = ".$LoaiPhieu);
$mapskt = $_GET['mapskt'];
if($mapskt==""){
    $mapskt = $OBJ->createMaPSKT();
}
$sophieu = $OBJ->createSoPhieuTime();
$sql = "insert into psvt(sophieu,mapskt,loaiphieu,tendangnhap,kho) values('".$sophieu."','".$mapskt."','".$LoaiPhieu."','".$_SESSION['User']."','0010')";
database::re_query($sql);
$_SESSION['SOPHIEU'] = $sophieu;
echo $mapskt;
?>