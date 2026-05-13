<?php
include("../../config.php");
$OBJ = new ketoantonghop;
$sott = $_GET['id'];
$OBJ->xoabtps($sott);
//echo "{\"recId\": \"" . $sott . "\"}";
?>