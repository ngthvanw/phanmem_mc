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
$sudung = $_GET['sudung'];
$quy = $_GET['quy'];
$sott = $OBJ->createSoTT_SDHD();
$OBJ-> themSoDu_HDDK($sott,$loaiphieu, $soquyen, $kyhieu, $tuso, $denso,$quy,$mauso,$huy,$sudung,$loaphieu);
echo "{\"recId\": \"" . $sott . "\"}";
?>