<?php
    include("../../config.php");
    $OBJ = new manhomkh();
    $OBJ->set_MaNhom(check_data($_GET['ma']));
    $check = $OBJ->checkXoa();
    if($check==false){
        echo 1;
    }else{
        $OBJ->xoaMaNhom();  
        echo "{\"result\": \"success\"}"; 
    } 
?>