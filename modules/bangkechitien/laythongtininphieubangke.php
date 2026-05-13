<?php
include("../../config.php");
$mabangke = $_GET['mabangke'];
$ten = $_GET['ten'];
$ngayhd = $_GET['ngayhd'];
$ngaylap= $_GET['ngaylap'];
$OBJ = new bangkechitien();
$OBJ->set_orderby(" mabangke = '{$mabangke}'");
$OBJ->setMabangke($mabangke);
$result = $OBJ->getBangKeChiTien();
$result_chitiet = $OBJ->getBangKeChiTietChiTien();
$_SESSION['THONGTINPHIEUCHITIEN']['TENPHIEU'] = $ten;
$_SESSION['THONGTINPHIEUCHITIEN']['NGAYHD'] = $ngayhd;
$_SESSION['THONGTINPHIEUCHITIEN']['NGAYLAP'] = $ngaylap;
$_SESSION['BANGKECHITIEN'] = $result;
$_SESSION['BANGKECHITIETCHITIEN'] = $result_chitiet;

debug($result_chitiet);
//echo "{\"data\":".json_encode($result) ." }" ;