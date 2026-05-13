<?php
    include("../../config.php");
    $OBJ = new manhanvien();
    $sott = $OBJ->createSoTTCTLuong();
    $OBJ->set_SoTT($sott);
    $OBJ->set_SoCMND(check_data($_GET['socmnd']));
    $OBJ->setNam(check_data($_GET['nam']));
    $OBJ->set_LuongCB(check_data($_GET['luong']));
    $OBJ->themCTLuong();
    echo "{\"recId\": \"" . $sott . "\"}";
?>