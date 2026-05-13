<?php
    include("../../config.php");
    $OBJ = new pskt();
    $OBJ->set_SoTT(check_data($_GET['id']));
    $OBJ->setMaPSKT(check_data($_GET['ma']));
    $check = $OBJ->checkXoa();
    if($check==TRUE) {
        echo "{\"result\": \"fail\"}";
    }else{
        $OBJ->xoaPSKT();
        echo "{\"result\": \"success\"}";   
    }
?>