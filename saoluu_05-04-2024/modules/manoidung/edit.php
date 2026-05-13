<?php
    include("../../config.php");
    $OBJ = new manoidung;
	$OBJ->set_SoTT(check_data($_GET['sott']));
    $OBJ->set_MaND(check_data($_GET['mand']));
    $OBJ->set_TenNoiDung(check_data($_GET['tennoidung']));
    $OBJ->set_TenKD(check_data(khu_dau_vn($_GET['tennoidung'])));
    $OBJ->setTenNoiDungEN(check_data($_GET['tennoidung_en']));
    $OBJ->setTenNoiDungCN(check_data($_GET['tennoidung_cn']));
    $OBJ->set_RateTax(check_data($_GET['rate_tax']));
    $OBJ->set_MaPL(check_data($_GET['mapl']));
    $OBJ->set_TKNo(check_data($_GET['tkno']));
    $OBJ->set_TKCo(check_data($_GET['tkco']));
    $OBJ->set_ChuThich(check_data($_GET['ghichu']));
    $OBJ->set_Rank1(1);
    $OBJ->suaMaNoiDung();
    echo "{\"result\": \"success\"}";
?>