<?php
    include("../../config.php");
    $OBJ = new MaBP;
    $sott = $OBJ->createSoTT();
    $OBJ->set_SoTT($sott);
    $OBJ->set_MaBP(check_data($_GET['mabp']));
    $OBJ->set_TenBP(check_data($_GET['tenbp']));
    $OBJ->set_TenKD(check_data(khu_dau_vn($_GET['tenbp'])));
	$OBJ->set_SHTK(check_data($_GET['shtk']));
    $OBJ->set_DiaChi(check_data($_GET['diachi']));
    $OBJ->set_ChuThich(check_data($_GET['ghichu']));
    $OBJ->themMaBP();
    echo "{\"recId\": \"" . $sott . "\"}";
?>