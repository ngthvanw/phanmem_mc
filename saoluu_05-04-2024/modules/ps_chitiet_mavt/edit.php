<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$OBJDM = new dmsanpham();
$LoaiPhieu = $_GET['loaiphieu'];
$OBJ->set_SoTT($_GET['sott']);
$mavt = check_data($_GET['mavt']);
$OBJ->set_MaVT($mavt);
$OBJ->setMapskt(check_data($_GET['mapskt']));
$mapskt = check_data($_GET['mapskt']);

$OBJ->setSoLuongNhap(check_data(str_replace(",", "", $_GET['soluongnhap'])));
$soluongnhap = check_data(str_replace(",", "", $_GET['soluongnhap']));
$OBJ->setDonGiaNhap(check_data(str_replace(",", "", $_GET['donggianhap'])));

$donggianhap = check_data(str_replace(",", "", $_GET['donggianhap']));
$thuenk = check_data(str_replace(",", "", $_GET['thuenk']));
$thuettdb = check_data(str_replace(",", "", $_GET['thuettdb']));

$phivc = check_data(str_replace(",", "", $_GET['phivc']));
$phibx = check_data(str_replace(",", "", $_GET['phivx']));

$tygiant = check_data(str_replace(",", "", $_GET['tygiant']));
$nguyentent = check_data(str_replace(",", "", $_GET['nguyentent']));
$thanhtiennt = check_data(str_replace(",", "", $_GET['thanhtiennt']));

$OBJ->setTyGiaNT($tygiant);
$OBJ->setNguyenTeNT($nguyentent);
$OBJ->setThanhTienNT($thanhtiennt);

$OBJ->setThueNK($thuenk);
$OBJ->setThueTTDB($thuettdb);

$OBJ->setPhiVC($phivc);
$OBJ->setPhiBX($phibx);


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

$tienchietkhau = check_data(str_replace(",", "", $_GET['tienchietkhau']));
$thang1 = check_data(str_replace(",", "", $_GET['thang1']));
$thang2 = check_data(str_replace(",", "", $_GET['thang2']));
$thang3 = check_data(str_replace(",", "", $_GET['thang3']));
$thang4 = check_data(str_replace(",", "", $_GET['thang4']));
$thang5 = check_data(str_replace(",", "", $_GET['thang5']));
$thang6 = check_data(str_replace(",", "", $_GET['thang6']));
$thang7 = check_data(str_replace(",", "", $_GET['thang7']));
$thang8 = check_data(str_replace(",", "", $_GET['thang8']));
$thang9 = check_data(str_replace(",", "", $_GET['thang9']));
$thang10 = check_data(str_replace(",", "", $_GET['thang10']));
$thang12 = check_data(str_replace(",", "", $_GET['thang11']));
$thang12 = check_data(str_replace(",", "", $_GET['thang12']));

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

$check = $OBJ->kiemtrachitietvattu();
database::re_query("ALTER TABLE `chitiet_psvt` ADD `thuenk` BIGINT NOT NULL, ADD `thuettdb` BIGINT NOT NULL;");
database::re_query("ALTER TABLE `chitiet_psvt` ADD `phivc` BIGINT NOT NULL, ADD `phibx` BIGINT NOT NULL;");
database::re_query("ALTER TABLE `chitiet_psvt` ADD `tygiant` DOUBLE NOT NULL,ADD `nguyentent` DOUBLE NOT NULL,ADD `thanhtiennt` DOUBLE NOT NULL;");
$sott = $_GET['sott'];
$Auto_STT = $OBJ->getNextSTT();
if ($check == TRUE) {
    if($soluongnhap==0 && $thanhtien==0){// Nếu số lượng nhập vào mà lớn hơn 0 thì cập nhật vào chi tiết
		$OBJ->xoapschitietvattu();
    }else{// Ngược lại thì xóa nó đi
        $OBJ->suachitietvattu();
    }
    echo "{\"recId\": \"success\"}";
} else {
    $OBJ->themchitietvattu();
    echo "{\"recId\": \"" . $Auto_STT['sott'] . "\"}";
}
if($LoaiPhieu==1)
    $OBJ->CapNhatGiaNhap();
else
    $OBJ->CapNhatGiaXuat();

$OBJ->CapNhatSLTonHT($soluongton);
$OBJDM->CapNhatSLTonSPHT($mavt,$thang1,$thang2,$thang3,$thang4,$thang5,$thang6,$thang7,$thang8,$thang9,$thang10,$thang11,$thang12);
?>