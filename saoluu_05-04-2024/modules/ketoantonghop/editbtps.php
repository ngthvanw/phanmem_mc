<?php
//error_reporting(8191);
include("../../config.php");
$OBJ = new ketoantonghop;
$sott = $_GET['sott'];
$maso = $_GET['maso'];
$tudong= $_GET['tudong'];
$noidung = $_GET['noidung'];
$tkchinh = $_GET['tkchinh'];
$tkno = $_GET['tkno'];
$tkco = $_GET['tkco'];
$phantram = $_GET['phantram'];
$mabp = $_GET['mabp'];
if($maso=="KCLNNT" || $maso=="KCLONT" || $maso=="KCTNDN" || $maso=="KCLAKD" || $maso=="KCLOKD" || $maso=="KCTHDN" || $maso=="KCCPBH"|| $maso=="KCCPKD"|| $maso=="KCTNKC"|| $maso=="KCCPHD") {
    $OBJ->suabtps($sott,$maso,$noidung,$tkchinh,$tkno,$tkco,$phantram,$mabp,$tudong);
    echo "{\"result\": \"success\"}";
}else{
    $OBJ->suabtps($sott,$maso,$noidung,$tkchinh,$tkno,$tkco,$phantram,$mabp,$tudong);
    echo "{\"result\": \"success\"}";
}
?>