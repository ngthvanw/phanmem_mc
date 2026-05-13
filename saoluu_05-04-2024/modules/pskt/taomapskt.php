<?php
include("../../config.php");
$OBJ = new pskt();
$OBJ->xoaCTPSKT_DuThua();
$LoaiPhieu = $_GET['lp'];
$OBJ->set_orderby(" loaiphieu = " . $LoaiPhieu);
$mapskt = $OBJ->createMaPSKT();
$sophieu = $OBJ->createSoPhieuTime();
$sql = "insert into pskt(sophieu,mapskt,loaiphieu,tendangnhap) values('" . $sophieu . "','" . $mapskt . "','" . $LoaiPhieu . "','" . $_SESSION['User'] . "')";
database::re_query($sql);
$_SESSION['SOPHIEU'] = $sophieu;
echo $mapskt;
?>