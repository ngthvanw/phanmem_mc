<?php
include("../../config.php");
$OBJ = new Hethongtaikhoan;

$sott = $OBJ->createSoTT();
$OBJ->set_SoTT($sott);
$MaTK = check_data($_GET['matk']);
$SHTK = substr($MaTK, 0, 3);
$OBJ->set_MaTK(check_data($_GET['matk']));
$OBJ->set_TenTaiKhoan(check_data($_GET['tentk']));
$OBJ->setTenTaiKhoanEN(check_data($_GET['tentk_en']));
$OBJ->setTenTaiKhoanCN(check_data($_GET['tentk_cn']));
$OBJ->set_MaTKCha(check_data($_GET['matkcha']));
$OBJ->set_LoaiTK(check_data($_GET['loaitk']));
$OBJ->set_MaTS(check_data($_GET['mats']));
$OBJ->set_MaNgV(check_data($_GET['mangv']));
$OBJ->set_NhomTK(check_data($_GET['nhomtk']));
$OBJ->set_SHTK(check_data($SHTK));
$OBJ->set_ChuThich(check_data($_GET['ghichu']));
$OBJ->set_NgayTao(date('Y-m-d'));
$OBJ->themTaiKhoan();
echo "{\"recId\": \"" . $sott . "\"}";
?>