<?php
    include("../../config.php");
    $OBJ = new MaBP;  
	$OBJ->set_SoTT(check_data($_GET['sott']));
    $OBJ->set_MaBP(check_data($_GET['mabp']));
    $OBJ->set_TenBP(check_data($_GET['tenbp']));
    $OBJ->set_TenKD(khu_dau_vn(check_data($_GET['tenbp'])));
    $OBJ->set_SHTK(check_data($_GET['shtk']));
    $OBJ->set_DiaChi(check_data($_GET['diachi']));
    $OBJ->set_ChuThich(check_data($_GET['ghichu']));
    $OBJ->suaMaBP();
    echo "{\"result\": \"success\"}";
?>