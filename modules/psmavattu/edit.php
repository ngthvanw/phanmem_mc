<?php
    include("../../config.php");
    $OBJ = new mavattu;
    $OBJ->set_SoTT($_GET['sott']);
    $mavt = check_data($_GET['mavt']);
    $OBJ->set_MaVT($mavt);
    $OBJ->set_MaVTCha(check_data($_GET['mavtcha']));
    $OBJ->set_TenVT(check_data($_GET['tenvt']));
    $OBJ->set_TenKD(khu_dau_vn(check_data($_GET['tenvt'])));
    $OBJ->set_MaTK(check_data($_GET['matk']));
    $OBJ->set_QuyCach(check_data($_GET['quycach']));
    
    $OBJ->set_DVT(check_data($_GET['dvt']));
    
    $OBJ->set_MaNhom(check_data($_GET['manhom']));
    $OBJ->set_TenNhom(check_data($_GET['tennhom']));
    $OBJ->set_GiaMua(check_data(str_replace(",","",$_GET['giamua'])));
    $OBJ->set_Rate(check_data($_GET['rate']));
    $OBJ->set_Mark(check_data($_GET['mark']));
    $OBJ->set_CongVao(check_data(str_replace(",","",$_GET['congvao'])));
    $OBJ->set_TruRa(check_data(str_replace(",","",$_GET['trura'])));
    $OBJ->set_DP(check_data($_GET['dp']));
    $OBJ->set_Muc(check_data(str_replace(",","",$_GET['muc'])));
    
    $OBJ->set_DVTP(check_data($_GET['dvtp']));
    $OBJ->set_KL(check_data(str_replace(",","",$_GET['kl'])));
    $OBJ->set_KT(check_data(str_replace(",","",$_GET['kt'])));
    $OBJ->set_GiaBan(check_data(str_replace(",","",$_GET['giaban'])));
    $OBJ->set_GiaBanSi(check_data(str_replace(",","",$_GET['giabansi'])));
    $OBJ->set_Min(check_data(str_replace(",","",$_GET['min'])));
    $OBJ->set_Max(check_data(str_replace(",","",$_GET['max'])));
    $OBJ->set_ChuThich(check_data($_GET['ghichu']));
    $OBJ->suaMaVT();
    echo "{\"result\": \"success\"}";
?>