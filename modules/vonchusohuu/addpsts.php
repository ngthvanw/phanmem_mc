<?php
include("../../config.php");
$OBJ = new vonchusohuu();
$tanggiam = $_GET['tanggiam'];
$OBJ->set_orderby(" tanggiam = " . $tanggiam);
$sott = $OBJ->createMaPSTS();
$OBJ->set_TangGiam($_GET['tanggiam']);
$OBJ->set_MaTaiSan($_GET['makh']);// Makh
$OBJ->set_MaPSTS($_GET['mapsvoncsh']);// Má PS
$OBJ->set_TenTaiSan(check_data($_GET['tenkh']));
$OBJ->set_TenKD(khu_dau_vn(check_data($_GET['tenkh'])));
$OBJ->set_MaTK(check_data($_GET['matk']));

$OBJ->set_MaBoPhan(check_data($_GET['mabp']));
$OBJ->set_BoPhan(check_data($_GET['bophan']));

$OBJ->set_MaNoiDung(check_data($_GET['manoidung']));
$OBJ->set_NoiDung(check_data($_GET['noidung']));

$OBJ->setNgayGhiSo(check_data($_GET['ngayghiso']));
$OBJ->setNgayHoaDon(check_data($_GET['ngayhoadon']));

$OBJ->set_NguyenGia(check_data(str_replace(",", "", $_GET['vondieule'])));
$OBJ->set_GiaTriConLai(check_data(str_replace(",", "", $_GET['vongop'])));

$OBJ->set_TKCo(check_data(str_replace(",", "", $_GET['tkco'])));
$OBJ->set_TKNo(check_data(str_replace(",", "", $_GET['tkno'])));
$OBJ->set_ChuThich(check_data($_GET['chuthich']));

$OBJ->setTangVonDieuLe(str_replace(",", "", $_GET['vondieuletrongky']));
$OBJ->setTangVonGop(str_replace(",", "", $_GET['vongoptrongky']));
$OBJ->setTyLe(str_replace(",", "", $_GET['tyle']));
$OBJ->setVonChuaGop(str_replace(",", "", $_GET['vonchuagop']));

$OBJ->setVonDieuLeUSD(check_data(str_replace(",", "", $_GET['vondieuleusd'])));
$OBJ->setVonGopUSD(check_data(str_replace(",", "", $_GET['vongopusd'])));
$OBJ->setTangVonDieuLeUSD(str_replace(",", "", $_GET['vondieuletrongkyusd']));
$OBJ->setTangVonGopUSD(str_replace(",", "", $_GET['vongoptrongkyusd']));
$OBJ->setVonChuaGopUSD(str_replace(",", "", $_GET['vonchuagopusd']));

$OBJ->themPSTS();

echo "{\"recId\": \"" . $sott . "\"}";
?>