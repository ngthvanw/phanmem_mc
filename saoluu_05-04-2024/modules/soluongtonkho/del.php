<?php
    include("../../config.php");
    $OBJ = new soluongton();
    $OBJ->set_SoTT(check_data($_GET['id']));
    $OBJ->set_MaVT(check_data($_GET['ma']));
    //echo $check = $OBJ->checkXoa();
    //if($check==TRUE){
       // echo "{\"result\": \"fail\"}";
    //}else{
        $OBJ->xoaTKMaVT();
        echo "{\"result\": \"success\"}";   
    //}
?>