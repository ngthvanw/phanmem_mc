<?php
    include("../../config.php");
    $OBJ = new nhomtaisan();
    $sott = $OBJ->createSoTT();
    $OBJ->set_SoTT($sott);
    $OBJ->set_MaCT(check_data($_GET['manhom']));
    $OBJ->set_MaCTCha(check_data($_GET['manhomcha']));
    $OBJ->set_TenCT(check_data($_GET['tennhom']));
    $OBJ->set_TenKD(khu_dau_vn(check_data($_GET['tennhom'])));
    $OBJ->themMaCT();
    echo "{\"recId\": \"" . $sott . "\"}";
?>