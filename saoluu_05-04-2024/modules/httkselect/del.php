<?php
    include("../../config.php");
    $OBJ = new Hethongtaikhoan;
    $OBJ->set_SoTT(check_data($_GET['id']));
    $OBJ->set_MaTK(check_data($_GET['ma']));
    $check = $OBJ->checkXoa();
    $check_khoangoai = $OBJ->checkXoa_khoangoai();
    if($check || $check_khoangoai){
        echo "{\"result\": \"fail\"}";
    }else{
        $OBJ->xoaTaiKhoan();
        echo "{\"result\": \"success\"}";   
    }
?>