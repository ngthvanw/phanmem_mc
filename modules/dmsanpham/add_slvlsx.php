<?php
    include("../../config.php");
    $OBJ = new dmsanpham();

    $OBJ->set_MaCT($_GET['masp']);

    $OBJ->setThang1(check_data(str_replace(",","",$_GET['thang1'])));// GIá Mua
    $OBJ->setThang2(check_data(str_replace(",","",$_GET['thang2'])));// GIá Mua
    $OBJ->setThang3(check_data(str_replace(",","",$_GET['thang3'])));// GIá Mua
    $OBJ->setThang4(check_data(str_replace(",","",$_GET['thang4'])));// GIá Mua
    $OBJ->setThang5(check_data(str_replace(",","",$_GET['thang5'])));// GIá Mua
    $OBJ->setThang6(check_data(str_replace(",","",$_GET['thang6'])));// GIá Mua
    $OBJ->setThang7(check_data(str_replace(",","",$_GET['thang7'])));// GIá Mua
    $OBJ->setThang8(check_data(str_replace(",","",$_GET['thang8'])));// GIá Mua
    $OBJ->setThang9(check_data(str_replace(",","",$_GET['thang9'])));// GIá Mua
    $OBJ->setThang10(check_data(str_replace(",","",$_GET['thang10'])));// GIá Mua
    $OBJ->setThang11(check_data(str_replace(",","",$_GET['thang11'])));// GIá Mua
    $OBJ->setThang12(check_data(str_replace(",","",$_GET['thang12'])));// GIá Mua

    $OBJ->suaSLDTVLSX();

?>