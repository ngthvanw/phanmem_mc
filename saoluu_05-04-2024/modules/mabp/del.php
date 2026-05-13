<?php
    include("../../config.php");
    $OBJ = new MaBP;
    $OBJ->set_MaBP(check_data($_GET['ma']));
    $OBJ->xoaMaBP();
    echo "{\"result\": \"success\"}"; 
?>