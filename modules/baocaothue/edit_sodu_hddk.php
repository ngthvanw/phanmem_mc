<?php
include("../../config.php");
$OBJ = new baocaothue();
$loaiphieu = $_GET['loaiphieu'];
$loaphieu = $_GET['loaphieu'];
$soquyen = $_GET['soquyen'];
$kyhieu = $_GET['kyhieu'];
$tuso = $_GET['tuso'];
$denso = $_GET['denso'];
$huy = $_GET['huy'];
$mauso = $_GET['mauso'];
$quy = $_GET['quy'];
$sott =$_GET['sott'];
$sudung = $_GET['sudung'];
$OBJ-> suaSoDu_HDDK($sott,$loaiphieu, $soquyen, $kyhieu, $tuso, $denso,$quy,$mauso,$huy,$sudung,$loaphieu);
echo "{\"result\": \"success\"}";
?>