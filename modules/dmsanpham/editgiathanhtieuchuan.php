<?php
include("../../config.php");
$OBJ = new dmsanpham();
$sott = check_data($_GET['sott']);
$dongia = check_data($_GET['dongia']);
$thanhtien = check_data($_GET['thanhtien']);

$OBJ->suaGiaThanhTieuChuan($sott,$dongia,$thanhtien);

echo "{\"result\": \"success\"}";
?>