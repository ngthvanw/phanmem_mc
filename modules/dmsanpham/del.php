<?php
    include("../../config.php");
    $OBJ = new dmsanpham;
    $OBJ->set_SoTT(check_data($_GET['id']));
    $OBJ->set_MaCT(check_data($_GET['ma']));
    $check = $OBJ->checkXoa();
    if($check==TRUE){
       echo "{\"result\": \"fail\"}";
    }else{
        $OBJ->xoaMaSP();
        echo "{\"result\": \"success\"}";   
    }
?>