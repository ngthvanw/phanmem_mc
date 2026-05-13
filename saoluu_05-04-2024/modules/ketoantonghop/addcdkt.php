<?php
//error_reporting(8191);
include("../../config.php");
$OBJ = new ketoantonghop;
$matsnv = $_GET['matsnv'];
$tentsnv = $_GET['tentsnv'];
$tentsnv_en = $_GET['tentsnv_en'];
$maso = $_GET['maso'];
$matsnvcha = $_GET['matsnvcha'];
$loaitsnv = $_GET['loaitsnv'];
$matk = $_GET['matk'];
//debug($_GET);
$sott = $OBJ->createSoTT();
$OBJ->themcdkt($sott,$matsnv,$tentsnv,$matk,$maso,$matsnvcha,$loaitsnv,$tentsnv_en);
echo "{\"recId\": \"" . $sott . "\"}";
?>