<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$OBJDM = new dmsanpham();
//debug($_GET);
$LoaiPhieu = $_GET['loaiphieu'];
$OBJ->set_SoTT($_GET['sott']);
$mavt = check_data($_GET['mavt']);
$OBJ->set_MaVT($mavt);
$OBJ->setMapskt(check_data($_GET['mapskt']));
$mapskt = check_data($_GET['mapskt']);

$OBJ->setSoLuongNhap(check_data(str_replace(",", "", $_GET['soluong'])));
$soluongnhap = check_data(str_replace(",", "", $_GET['soluong']));
$OBJ->setDonGiaNhap(check_data(str_replace(",", "", $_GET['dongia'])));

$donggianhap = check_data(str_replace(",", "", $_GET['dongia']));
$mact = check_data( $_GET['mact']);
$OBJ->setMaCT($mact);
$OBJ->setThueSuat(check_data($_GET['thuesuat']));
$thuesuat = check_data($_GET['thuesuat']);

$OBJ->setThanhTien(check_data($_GET['thanhtien']));
$OBJ->setThanhTienChuaCK(check_data($_GET['thanhtienchuack']));
$thanhtien = check_data($_GET['thanhtien']);

$OBJ->setChietKhau(check_data(str_replace(",", "", $_GET['chietkhau'])));
$chietkhau = check_data(str_replace(",", "", $_GET['chietkhau']));

$OBJ->setTienChietKhau(check_data(str_replace(",", "", $_GET['tienchietkhau'])));

$OBJ->setDonGiaMT(check_data(str_replace(",", "", $_GET['dongiamt'])));
$OBJ->setThanhTienMT(check_data(str_replace(",", "", $_GET['thanhtienmt'])));


$soluongton = check_data(str_replace(",", "", $_GET['soluongton']));

$OBJ->setThue(check_data($_GET['thue']));
$thue = check_data($_GET['thue']);

$OBJ->set_TenVT(check_data($_GET['tenvt']));

$tenvt = check_data($_GET['tenvt']);
$OBJ->set_TenKD(khu_dau_vn($tenvt));
$OBJ->set_TenKD(khu_dau_vn(check_data($_GET['tenvt'])));

$OBJ->set_DVT(check_data($_GET['dvt']));
$dvt = check_data($_GET['dvt']);


$OBJ->set_ChuThich(check_data($_GET['ghichu']));
$ghichu = check_data($_GET['ghichu']);
$OBJ->setSoPhieu(check_data($_GET['sophieu']));

$sophieu = check_data($_GET['sophieu']);

$check = $OBJ->kiemtrachitietvattu_ctct();
$sott = $_GET['sott'];
$Auto_STT = $OBJ->getNextSTTCTCT();
if ($check == TRUE) {
    if($soluongnhap==0){// Nếu số lượng nhập vào mà lớn hơn 0 thì cập nhật vào chi tiết
		$OBJ->xoapschitietvattu_ctct();
    }else{// Ngược lại thì xóa nó đi
        $OBJ->suachitietvattu_ctct();
    }
    echo "{\"recId\": \"success\"}";
} else {
    $OBJ->themchitietvattu_ctct();
    echo "{\"recId\": \"" . $Auto_STT['sott'] . "\"}";
}
$OBJ->CapNhatNVLTonHT($soluongton,$mact);
?>