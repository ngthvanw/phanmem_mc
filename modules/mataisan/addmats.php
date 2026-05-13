<?php
    include("../../config.php");
    $OBJ = new mataisan();
    $sott = $OBJ->createSoTT_MaTS();
    $OBJ->set_SoTT($sott);
    $OBJ->set_MaTaiSan($_GET['mats']);
    $OBJ->setKhauHao($_GET['khauhao']);
    $OBJ->setMaTaiSanCha($_GET['matscha']);
    $OBJ->set_TenTaiSan(check_data($_GET['tents']));
    $OBJ->set_TenKD(khu_dau_vn(check_data($_GET['tents'])));
    $OBJ->set_MaTK(check_data($_GET['matk']));
    $OBJ->set_DVT(check_data($_GET['dvt']));
    $OBJ->setSoHuu(check_data($_GET['sohuu']));
    $OBJ->set_MaNhomTS(check_data($_GET['manhomts']));
    $OBJ->set_TenNhom(check_data($_GET['tenNhomTS']));
    $OBJ->set_CongSuat(check_data(str_replace(",","",$_GET['congsuat'])));
    $OBJ->set_NuocSX(check_data($_GET['nuocsx']));
    $OBJ->set_NgaySX(check_data($_GET['ngaysx']));
    $OBJ->setNgayGiam(check_data($_GET['ngaygiam']));
    $OBJ->setMaTKGiam(check_data($_GET['matkgiam']));
    $OBJ->setNgayGhiSo(check_data($_GET['ngayghiso']));
    $OBJ->setNgaySD(check_data($_GET['ngaysd']));
    $OBJ->set_SoLuong(check_data(str_replace(",","",$_GET['soluong'])));
    $OBJ->set_NguyenGia(check_data(str_replace(",","",$_GET['nguyengia'])));
    $OBJ->set_GiaTriConLai(check_data(str_replace(",","",$_GET['giatriconlai'])));
    $OBJ->set_TyLeKH(check_data($_GET['tylekhachhang']));
    $OBJ->set_ThoiGianSD(check_data(str_replace(",","",$_GET['thoigiansudung'])));
    $OBJ->set_ChuThich(check_data($_GET['chuthich']));
    $OBJ->setCPKhongDuocTru(check_data($_GET['cpkhongduoctru']));
$OBJ->re_query("ALTER TABLE `mats` ADD `cpkhongduoctru` INT(1) NOT NULL;");
$OBJ->re_query("ALTER TABLE `mats` ADD `matkgiam` CHAR(6) NOT NULL;");
    $OBJ->themMaTS();

    echo "{\"recId\": \"" . $sott . "\"}";
?>