<?php
    include("../../config.php");
    $OBJ = new manhanvien;
    $OBJ->set_SoTT(check_data($_GET['ma']));

        $OBJ->xoaCTLuong();
        echo "{\"result\": \"success\"}";
?>