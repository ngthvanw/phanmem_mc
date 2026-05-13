<?php
    include("../../config.php");
    $OBJ = new manhomkh();
	$OBJ->set_SoTT(check_data($_GET['sott']));
    $OBJ->set_MaNhom(check_data($_GET['manhom']));
    $OBJ->set_TenNhom(check_data($_GET['tennhom']));
    $OBJ->set_ChuThich(check_data($_GET['ghichu']));
    $OBJ->suaMaNhom();
    echo "{\"result\": \"success\"}";
?>