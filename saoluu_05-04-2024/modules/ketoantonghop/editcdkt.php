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
$loaitk = $_GET['loaitk'];
$sott = $_GET['sott'];
$OBJ->re_query("ALTER TABLE `sdkt` ADD `tentsnv_en` TEXT NOT NULL AFTER `tentsnv`;");
$OBJ->re_query("ALTER TABLE `sdkt` CHANGE `tentsnv` `tentsnv` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
$OBJ->suacdkt($sott,$matsnv,$tentsnv,$matk,$maso,$matsnvcha,$loaitsnv,$loaitk,$tentsnv_en);
?>