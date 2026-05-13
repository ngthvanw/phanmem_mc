<?php
    include("../../config.php");
    $OBJ = new danhmuccptratruoc();
    $OBJ->set_SoTT(check_data($_GET['id']));
    $OBJ->set_MaTaiSan(check_data($_GET['ma']));

    $OBJ->xoaMaTS();
    echo "{\"result\": \"success\"}";
?>