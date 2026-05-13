<?php
    include("../../config.php");
    $OBJ = new manoidung;
    $OBJ->set_MaND(check_data($_GET['ma']));
    $check = $OBJ->checkXoa();
    if($check==TRUE){
        echo "{\"result\": \"fail\"}";
    }else{
        $OBJ->xoaMaNoiDung();
        echo "{\"result\": \"success\"}";
   }
?>