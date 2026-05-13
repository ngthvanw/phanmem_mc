<?php
    include("../../config.php");
    $OBJ = new mavattu;

    $OBJ->set_MaVT(check_data($_GET['mavt']));
    $OBJ->set_SoTT(check_data($_GET['sott']));
    $OBJ->set_TenVT(check_data($_GET['tenvt']));
    $OBJ->set_MaNhom(check_data($_GET['manhom']));
    $OBJ->set_MaTK(check_data($_GET['matk']));
    $OBJ->set_Rate(check_data($_GET['thuesuat']));
    $OBJ->getTKDoanhThu(check_data($_GET['tkdoanhthu']));
    $OBJ->set_TenKD(khu_dau_vn(check_data($_GET['tenvt'])));
    
    $OBJ->set_DVT(check_data($_GET['dvt']));

   $OBJ->suaMaVT_ChiTietNhapHoaDon();
    echo "{\"result\": \"success\"}";
?>