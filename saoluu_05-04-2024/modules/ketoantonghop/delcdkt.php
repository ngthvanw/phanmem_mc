<?php
//error_reporting(8191);
include("../../config.php");
$OBJ = new ketoantonghop;
$sott = $_GET['id'];
$OBJ->xoacdkt($sott);
//echo "{\"recId\": \"" . $sott . "\"}";
?>