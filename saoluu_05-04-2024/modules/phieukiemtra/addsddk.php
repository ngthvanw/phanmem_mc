<?php
    include("../../config.php");
    $OBJ = new makhachhang;
    $sott = $OBJ->createSoTT();
    $OBJ->set_SoTT($sott);
    $makh = check_data($_GET['makh']);
    $OBJ->set_MaKH(check_data($_GET['makh']));
    $OBJ->set_TenKH(check_data($_GET['tenkh']));
    $OBJ->set_TenKD(khu_dau_vn(check_data($_GET['tenkh'])));
    $OBJ->set_MaSoThue(check_data($_GET['masothue']));
    $OBJ->set_MaKHCha(check_data($_GET['makhcha']));
    $OBJ->set_MaTK(check_data($_GET['matk']));
    $OBJ->set_SiLe(check_data($_GET['sile']));
    $OBJ->set_DiaChi(check_data($_GET['diachi']));
    $OBJ->set_DienThoai(check_data($_GET['dienthoai']));
    $OBJ->set_HanMucNo(check_data(str_replace(",","",$_GET['HanMucNo'])));
    $OBJ->set_NoTH(check_data(str_replace(",","",$_GET['NoTH'])));
    $OBJ->set_NoQH(check_data(str_replace(",","",$_GET['NoQH'])));
    $OBJ->set_NoNH(check_data(str_replace(",","",$_GET['NoNH'])));
    $OBJ->set_NoDH(check_data(str_replace(",","",$_GET['NoDH'])));
    $OBJ->set_NoXau(check_data(str_replace(",","",$_GET['NoXau'])));
	
	$OBJ->setsdkno(check_data(str_replace(",","",$_GET['sdkno'])));
    $OBJ->setsdkco(check_data(str_replace(",","",$_GET['sdkco'])));
	
    $OBJ->set_ChuThich(check_data($_GET['ghichu']));
    $OBJ->set_NgayTra(check_data($_GET['ngaytra']));
    //$OBJ->themMaKH();
    $OBJ->themMaKHSDKY();
	
    echo "{\"recId\": \"" . $sott . "\"}";
?>