<?php
include("../../config.php");
$OBJ = new phieukiemtra;
$thoigiannhap = time();
$sott = check_data($_GET['sott']);

$truongnhomduyet = check_data($_GET['truongnhomduyet']);
$giamdocduyet = check_data($_GET['giamdocduyet']);
$nguoiduyet = check_data($_GET['nguoiduyet']);
$ngayduyet = check_data($_GET['ngayduyet']);
$ghichu = check_data($_GET['ghichu']);

$OBJ->suaPhieuNhatKy($sott,$truongnhomduyet,$giamdocduyet,$nguoiduyet,$ngayduyet,$ghichu);
echo "{\"result\": \"success\"}";
?>