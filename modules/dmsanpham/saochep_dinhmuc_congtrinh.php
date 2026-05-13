<?php
include("../../config.php");
unset($_SESSION['DSDINHMUCCONGTRINH']);
$masp = $_GET['masp'];
$mahm = $_GET['mahm'];
//$xemtonghop = $_GET['xemtonghop'];
$list = 0;
$OBJ = new dmsanpham();

$OBJ->set_orderby(" ct.masp='" . $masp . "' and ct.mahm='" . $mahm . "' ");
$result = $OBJ->loadListMaVT_CT_Vatlieu_Copy();

$_SESSION['DSDINHMUCCONGTRINH'] = $result;
?>