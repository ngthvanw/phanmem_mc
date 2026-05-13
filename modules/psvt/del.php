<?php
    include("../../config.php");
    $OBJ = new psvt();
    $OBJ->set_SoTT(check_data($_GET['id']));
    //$OBJ->set_MaVT(check_data($_GET['ma']));
    //echo $check = $OBJ->checkXoa();
    //if($check==TRUE){
       // echo "{\"result\": \"fail\"}";
    //}else{
        $OBJ->xoaPSKT();
        echo "{\"result\": \"success\"}";   
    //}
?>