<?php
    include("../../config.php");
    $OBJ = new mavattu;

    $OBJ->set_MaVT(check_data($_GET['mavt']));
    $OBJ->setMaVTDoi(check_data($_GET['mavtdoi']));
    $OBJ->set_TenVT(check_data($_GET['tenvt']));
    $OBJ->set_TenKD(khu_dau_vn(check_data($_GET['tenvt'])));
    
    $OBJ->set_DVT(check_data($_GET['dvt']));

   $OBJ->suaMaVT_ChiTietNhapXuat();
    echo "{\"result\": \"success\"}";
?>