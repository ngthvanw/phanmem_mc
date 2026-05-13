<?php
    include("../../config.php");
    $OBJ = new Makho;
    $OBJ->set_SoTT(check_data($_GET['id']));
    $OBJ->xoaMaKho();   
    echo "{\"result\": \"success\"}";
?>