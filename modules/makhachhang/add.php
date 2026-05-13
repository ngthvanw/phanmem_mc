<?php
include("../../config.php");
$OBJ = new makhachhang;

$sub = rand(10,99);
$sott = trim(trim($_SESSION['UserID']).time()).$sub;

//$sott = $OBJ->createSoTT();
$OBJ->set_SoTT($sott);
$makh = check_data($_GET['makh']);
$OBJ->set_MaKH(check_data($_GET['makh']));
$OBJ->set_TenKH(addslashes($_GET['tenkh']));
$OBJ->set_TenKD(khu_dau_vn(addslashes($_GET['tenkh'])));
$OBJ->set_MaSoThue(check_data($_GET['masothue']));
$OBJ->set_MaKHCha(check_data($_GET['makhcha']));
$OBJ->set_MaTK(check_data($_GET['matk']));
$OBJ->set_SiLe(check_data($_GET['sile']));
$OBJ->set_DiaChi(addslashes($_GET['diachi']));
$OBJ->set_DienThoai(check_data($_GET['dienthoai']));
$OBJ->set_HanMucNo(check_data(str_replace(",", "", $_GET['HanMucNo'])));
$OBJ->set_NoTH(check_data(str_replace(",", "", $_GET['NoTH'])));
$OBJ->set_NoQH(check_data(str_replace(",", "", $_GET['NoQH'])));
$OBJ->set_NoNH(check_data(str_replace(",", "", $_GET['NoNH'])));
$OBJ->set_NoDH(check_data(str_replace(",", "", $_GET['NoDH'])));
$OBJ->set_NoXau(check_data(str_replace(",", "", $_GET['NoXau'])));
$OBJ->set_ChuThich(check_data($_GET['ghichu']));
$OBJ->setMaNhom(check_data($_GET['manhom']));
$OBJ->set_NgayTra(check_data($_GET['ngaytra']));
$OBJ->setLoaiTien(check_data($_GET['loaitien']));
$OBJ->setSoCMND(check_data($_GET['socmnd']));
$OBJ->themMaKH();
echo "{\"recId\": \"" . $sott . "\"}";
?>