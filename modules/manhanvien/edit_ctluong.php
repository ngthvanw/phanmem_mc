<?php
include("../../config.php");
    $OBJ = new manhanvien;
    $OBJ->set_SoTT(check_data($_GET['sott']));
    $OBJ->set_SoCMND(check_data($_GET['socmnd']));
    $OBJ->setNam(check_data($_GET['nam']));
    $OBJ->set_LuongCB(check_data($_GET['luong']));
    $OBJ->themCTLuong();
    $OBJ->suaCTLuong();
    echo "{\"result\": \"success\"}";
?>