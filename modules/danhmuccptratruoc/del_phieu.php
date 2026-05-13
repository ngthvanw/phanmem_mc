<?php
    include("../../config.php");
    $OBJ = new danhmuccptratruoc();
    $OBJ->set_SoTT(check_data($_GET['sophieu'])); // là mapskt
    $OBJ->set_TangGiam(check_data($_GET['loaiphieu'])); // Là loại phiếu cần xóa
    $loai = $_GET['loai'];
    if($loai=='xdcb'){
        $OBJ->set_orderby(" SUBSTRING(matk,1,3)=241 ");
    }else{
        $OBJ->set_orderby(" SUBSTRING(matk,1,3)!=241 ");
    }
    $OBJ->xoaPhieu();
    echo "{\"result\": \"success\"}";
?>