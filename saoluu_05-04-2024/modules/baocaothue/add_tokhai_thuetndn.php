<?php
//error_reporting(8191);
include("../../config.php");
$OBJ = new baocaothue();
$maso = $_GET['maso'];
$chitieu = $_GET['chitieu'];
$machitieu = $_GET['machitieu'];
$sotien = $_GET['sotien'];
$machitieucha = $_GET['machitieucha'];
$matk = $_GET['matk'];
$sott = $OBJ->createSoTT();
$OBJ->themToKhai_TNDN($sott,$maso, $chitieu, $machitieu, $sotien, $machitieucha);
echo "{\"recId\": \"" . $sott . "\"}";
?>