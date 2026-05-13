<?php
    include("../../config.php");
    $OBJ = new dmsanpham();

    $OBJ->set_SoTT($_GET['sott']);

    $OBJ->setNgay1(check_data(str_replace(",","",$_GET['n1'])));// GIá Mua
    $OBJ->setNgay2(check_data(str_replace(",","",$_GET['n2'])));// GIá Mua
    $OBJ->setNgay3(check_data(str_replace(",","",$_GET['n3'])));// GIá Mua
    $OBJ->setNgay4(check_data(str_replace(",","",$_GET['n4'])));// GIá Mua
    $OBJ->setNgay5(check_data(str_replace(",","",$_GET['n5'])));// GIá Mua
    $OBJ->setNgay6(check_data(str_replace(",","",$_GET['n6'])));// GIá Mua
    $OBJ->setNgay7(check_data(str_replace(",","",$_GET['n7'])));// GIá Mua
    $OBJ->setNgay8(check_data(str_replace(",","",$_GET['n8'])));// GIá Mua
    $OBJ->setNgay9(check_data(str_replace(",","",$_GET['n9'])));// GIá Mua
    $OBJ->setNgay10(check_data(str_replace(",","",$_GET['n10'])));// GIá Mua
    $OBJ->setNgay11(check_data(str_replace(",","",$_GET['n11'])));// GIá Mua
    $OBJ->setNgay12(check_data(str_replace(",","",$_GET['n12'])));// GIá Mua
    $OBJ->setNgay13(check_data(str_replace(",","",$_GET['n13'])));// GIá Mua
    $OBJ->setNgay14(check_data(str_replace(",","",$_GET['n14'])));// GIá Mua
    $OBJ->setNgay15(check_data(str_replace(",","",$_GET['n15'])));// GIá Mua
    $OBJ->setNgay16(check_data(str_replace(",","",$_GET['n16'])));// GIá Mua
    $OBJ->setNgay17(check_data(str_replace(",","",$_GET['n17'])));// GIá Mua
    $OBJ->setNgay18(check_data(str_replace(",","",$_GET['n18'])));// GIá Mua
    $OBJ->setNgay19(check_data(str_replace(",","",$_GET['n19'])));// GIá Mua
    $OBJ->setNgay20(check_data(str_replace(",","",$_GET['n20'])));// GIá Mua
    $OBJ->setNgay21(check_data(str_replace(",","",$_GET['n21'])));// GIá Mua
    $OBJ->setNgay22(check_data(str_replace(",","",$_GET['n22'])));// GIá Mua
    $OBJ->setNgay23(check_data(str_replace(",","",$_GET['n23'])));// GIá Mua
    $OBJ->setNgay24(check_data(str_replace(",","",$_GET['n24'])));// GIá Mua
    $OBJ->setNgay25(check_data(str_replace(",","",$_GET['n25'])));// GIá Mua
    $OBJ->setNgay26(check_data(str_replace(",","",$_GET['n26'])));// GIá Mua
    $OBJ->setNgay27(check_data(str_replace(",","",$_GET['n27'])));// GIá Mua
    $OBJ->setNgay28(check_data(str_replace(",","",$_GET['n28'])));// GIá Mua
    $OBJ->setNgay29(check_data(str_replace(",","",$_GET['n29'])));// GIá Mua
    $OBJ->setNgay30(check_data(str_replace(",","",$_GET['n30'])));// GIá Mua
    $OBJ->setNgay31(check_data(str_replace(",","",$_GET['n31'])));// GIá Mua

    $OBJ->suaSLDTVLSXTKTP();

?>