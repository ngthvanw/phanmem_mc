<?php
    include("../../config.php");
    $OBJ = new danhmuccptratruoc();
    $sott = $OBJ->createSoTT_MaCPTraTruoc();
    $OBJ->set_SoTT($sott);
    $OBJ->set_MaTaiSan($_GET['mats']);
    $OBJ->setMaTaiSanCha($_GET['matscha']);
    $OBJ->set_TenTaiSan(check_data($_GET['tents']));
    $OBJ->set_TenKD(khu_dau_vn(check_data($_GET['tents'])));
    $OBJ->set_MaTK(check_data($_GET['matk']));
    $OBJ->set_DVT(check_data($_GET['dvt']));
    $OBJ->set_MaNhomTS(check_data($_GET['manhomts']));
    $OBJ->set_TenNhom(check_data($_GET['tenNhomTS']));
    $OBJ->set_CongSuat(check_data(str_replace(",","",$_GET['congsuat'])));
    $OBJ->set_NuocSX(check_data($_GET['nuocsx']));
    $OBJ->set_NgaySX(check_data($_GET['ngaysx']));
    $OBJ->setNgayGhiSo(check_data($_GET['ngayghiso']));
    $OBJ->setNgaySD(check_data($_GET['ngaysd']));
    $OBJ->set_SoLuong(check_data(str_replace(",","",$_GET['soluong'])));
    $OBJ->set_NguyenGia(check_data(str_replace(",","",$_GET['nguyengia'])));
    $OBJ->set_GiaTriConLai(check_data(str_replace(",","",$_GET['giatriconlai'])));
    $OBJ->set_TyLeKH(check_data($_GET['tylekhachhang']));
    $OBJ->set_ThoiGianSD(check_data(str_replace(",","",$_GET['thoigiansudung'])));
    $OBJ->set_ChuThich(check_data($_GET['chuthich']));

    $OBJ->themMaCPTraTruoc();

    echo "{\"recId\": \"" . $sott . "\"}";
?>