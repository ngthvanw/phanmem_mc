<?php
include("../../config.php");
$OBJ = new dmsanpham();
$OBJ->set_SoTT(check_data($_GET['sott']));
$OBJ->set_MaCT(check_data($_GET['mact']));
$OBJ->setSoHopDong(check_data($_GET['sohopdong']));
$OBJ->setNgayHopDong(check_data($_GET['ngayhopdong']));
$OBJ->setNgayNghiemThu(check_data($_GET['ngaynghiemthu']));
$OBJ->setGiaTriNghiemThu(check_data($_GET['giatringiemthu']));
$OBJ->setPhanTramHTNT(check_data($_GET['phantramhoanthanhnghiemthu']));
$OBJ->setPhanTramHTTT(check_data($_GET['phantramklhttt']));

$OBJ->suaDieuTra_XayDung_CongTrinh();
echo "{\"result\": \"success\"}";
?>