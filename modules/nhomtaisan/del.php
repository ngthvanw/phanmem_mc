<?php
    include("../../config.php");
    $OBJ = new mact;
    $OBJ->set_SoTT(check_data($_GET['id']));
    $OBJ->set_MaCT(check_data($_GET['ma']));
    //echo $check = $OBJ->checkXoa();
    //if($check==TRUE){
       // echo "{\"result\": \"fail\"}";
    //}else{
        $OBJ->xoaMaCT();
        echo "{\"result\": \"success\"}";   
    //}
?>