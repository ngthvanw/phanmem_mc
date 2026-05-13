<?php
    include("../../config.php");
    $OBJ = new manhanvien;
    $OBJ->set_SoTT(check_data($_GET['id']));
    $check = $OBJ->checkXoa();
    $OBJ->xoaMaNV();
    echo "{\"result\": \"success\"}"; 
?>