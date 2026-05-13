<?php
//error_reporting(8191);
include("../../config.php");
$OBJ = new baocaothue();
$sott = $_GET['id'];
$OBJ->xoaSoDu_HDDK($sott);
echo "{\"result\": \"success\"}";
?>