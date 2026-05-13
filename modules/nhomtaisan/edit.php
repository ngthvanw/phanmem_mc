<?php
    include("../../config.php");
    $OBJ = new nhomtaisan();
	$OBJ->set_SoTT(check_data($_GET['sott']));
    $OBJ->set_MaCT(check_data($_GET['manhom']));
    $OBJ->set_TenCT(check_data($_GET['tennhom']));
    $OBJ->set_TenKD(khu_dau_vn(check_data($_GET['tennhom'])));
    $OBJ->set_MaCTCha(check_data($_GET['manhomcha']));
    $OBJ->suaMaCT();
    echo "{\"result\": \"success\"}";
?>