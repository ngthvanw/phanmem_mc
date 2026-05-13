<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$sott = $_GET['sott'];
$mavt = $_GET['mavt'];
$sophieu = $_GET['sophieu'];
$soluong = $_GET['soluong'];
$thanhtien = $_GET['thanhtien'];


$sqlmavt = "select mavt,dvt,dvtp,heso from mavt WHERE mavt='{$mavt}'";
$resmavt = $OBJ->re_query($sqlmavt);
$datatmavt = $OBJ->re_fetch($resmavt);

$heso = $datatmavt['heso'];
$SoLuongChuyenDoi = 0;
$DongiaChuyenDoi = 0;
$SoLuongChuyenDoi = round(($soluong*$heso),3);
$DongiaChuyenDoi = round(($thanhtien/$SoLuongChuyenDoi),3);
$sql_update = "update chitiet_psvt set soluongnhap=$SoLuongChuyenDoi,donggianhap=$DongiaChuyenDoi WHERE sophieu='{$sophieu}' and sott='{$sott}'";
$OBJ->re_query($sql_update);
