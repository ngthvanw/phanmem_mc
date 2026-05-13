<?php
    include("../../config.php");
    $HTTK = new Hethongtaikhoan;
    $MaTK = check_data($_GET['MaTK']);
    $SHTK = substr($MaTK,0,3);  
    $HTTK->set_MaTK(check_data($_GET['MaTK']));
    $HTTK->set_TenTaiKhoan(check_data($_GET['TenTaiKhoan']));
    $HTTK->set_MaTKCha(check_data($_GET['MaTKCha']));
    $HTTK->set_LoaiTK(check_data($_GET['LoaiTK']));
    $HTTK->set_MaTS(check_data($_GET['MaTS']));
    $HTTK->set_MaNgV(check_data($_GET['MaNgV']));
    $HTTK->set_NhomTK(check_data($_GET['NhomTK']));
    $HTTK->set_SHTK(check_data($SHTK));
    $HTTK->set_ChuThich(check_data($_GET['ChuThich']));
    $HTTK->set_NgayTao(date('Y-m-d'));
    $HTTK->themTaiKhoan();
?>