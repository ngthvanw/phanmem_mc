<?php
include("../../config.php");
$thang = $_GET['thang'];
$OBJ = new manhanvien;

$result = $OBJ->TongLuongNhanVienThang($thang);
//debug($result);
echo "{\"data\":".json_encode($result) ." }" ;