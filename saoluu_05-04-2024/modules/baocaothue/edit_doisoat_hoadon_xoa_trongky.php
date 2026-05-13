<?php
include("../../config.php");
$OBJ = new baocaothue();
$hoadon = $_GET['hoadon'];
$hople = $_GET['hople'];
$liendo = $_GET['liendo'];
$thaythe = $_GET['thaythe'];
$ghichu = $_GET['ghichu'];
$sott =$_GET['sott'];
$OBJ-> suaDoiSoat_HoaDon_Xoa($sott,$hoadon, $hople, $liendo, $thaythe, $ghichu);
echo "{\"result\": \"success\"}";
?>