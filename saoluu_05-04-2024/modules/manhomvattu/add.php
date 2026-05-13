<?php
    include("../../config.php");
    $OBJ = new manhom();
    $sott = $OBJ->createSoTT();
    $OBJ->set_SoTT($sott);
    $OBJ->set_MaNhom(check_data($_GET['manhom']));
    $OBJ->set_TenNhom(check_data($_GET['tennhom']));
    $OBJ->set_ChuThich(check_data($_GET['ghichu']));
    $OBJ->themMaNhom();
    echo "{\"recId\": \"" . $sott . "\"}";
?>