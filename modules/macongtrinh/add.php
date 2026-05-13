<?php
    include("../../config.php");
    $OBJ = new mact;  
    $sott = $OBJ->createSoTT();
    $OBJ->set_SoTT($sott);
    $OBJ->set_MaCT(check_data($_GET['mact']));
    $OBJ->set_MaCTCha(check_data($_GET['mactcha']));
    $OBJ->set_TenCT(check_data($_GET['tenct']));
    $OBJ->set_TenKD(khu_dau_vn(check_data($_GET['tenct'])));
    $OBJ->set_MaKH(check_data($_GET['makh']));
    $OBJ->set_DiaChi(check_data($_GET['diachi']));
    
    $OBJ->set_SoHD(check_data($_GET['so_hd']));
    
    $OBJ->set_NgayHD(check_data($_GET['ngayhd']));
    $OBJ->set_NgayKC(check_data($_GET['ngay_kc']));
    $OBJ->set_NgayHT(check_data($_GET['ngay_ht']));
    $OBJ->set_GiaTriHD(check_data(str_replace(",","",$_GET['giatri_hd'])));
    $OBJ->set_VatLieu(check_data(str_replace(",","",$_GET['vatlieu'])));
    $OBJ->set_NhanCong(check_data(str_replace(",","",$_GET['nhancong'])));
    $OBJ->set_May(check_data(str_replace(",","",$_GET['may'])));
    $OBJ->themMaCT();
    echo "{\"recId\": \"" . $sott . "\"}";
?>