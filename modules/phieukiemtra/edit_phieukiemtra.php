<?php
include("../../config.php");
$OBJ = new phieukiemtra;
$thoigiannhap = time();
$sott = check_data($_GET['sott']);

$truongnhomduyet = check_data($_GET['truongnhomduyet']);
$giamdocduyet = check_data($_GET['giamdocduyet']);
$nguoiduyet = check_data($_GET['nguoiduyet']);
$ngayduyet = check_data($_GET['ngayduyet']);

$giamdocduyet1 = check_data($_GET['giamdocduyet1']);
$nguoiduyet1 = check_data($_GET['nguoiduyet1']);
$ngayduyet1 = check_data($_GET['ngayduyet1']);

$ghichu = check_data($_GET['ghichu']);

$OBJ->re_query("ALTER TABLE `nhatkykiemphieu` ADD `giamdocduyet1` TINYINT(4) NOT NULL AFTER `truongnhomduyet`, ADD `nguoiduyet1` VARCHAR(20) NOT NULL AFTER `giamdocduyet1`, ADD `ngayduyet1` DATETIME NOT NULL AFTER `nguoiduyet1`;");
$OBJ->suaPhieuNhatKy($sott,$truongnhomduyet,$giamdocduyet,$nguoiduyet,$ngayduyet,$giamdocduyet1,$nguoiduyet1,$ngayduyet1,$ghichu);
echo "{\"result\": \"success\"}";
?>