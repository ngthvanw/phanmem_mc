<?php
    include("../../config.php");
    $OBJ = new Makho;
    $sott = $OBJ->createSoTT();
    $OBJ->set_SoTT($sott);
    $OBJ->set_MaKho(check_data($_GET['makho']));
    $OBJ->set_TenKho(check_data($_GET['tenkho']));
    $OBJ->set_TenKhoKD(check_data(khu_dau_vn($_GET['tenkho'])));
    $OBJ->set_DiaChi(check_data($_GET['diachi']));
    $OBJ->set_ChuThich(check_data($_GET['ghichu']));
    $OBJ->themMaKho();
    echo "{\"recId\": \"" . $sott . "\"}";
?>