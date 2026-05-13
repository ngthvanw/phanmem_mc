<?php
//error_reporting(8191);
include("../../config.php");
$OBJ = new ketoantonghop;
$sott = $_GET['sott'];
$maso = $_GET['maso'];
$noidung = $_GET['noidung'];
$tkchinh = $_GET['tkchinh'];
$tkno = $_GET['tkno'];
$tkco = $_GET['tkco'];
$phantram = $_GET['phantram'];
$mabp = $_GET['mabp'];
$sott = $OBJ->createSoTTBTPS();
$OBJ->thembtps($sott,$maso,$noidung,$tkchinh,$tkno,$tkco,$phantram,$mabp);
echo "{\"recId\": \"" . $sott . "\"}";
?>