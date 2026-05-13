<?php
    include("../../config.php");
    $OBJ = new sodutk();
    $OBJ->set_SoTT($_GET['sott']);

    //$OBJ->set_MaVT($_GET['cttheobophan']);
    $OBJ->setCttheobophan(check_data($_GET['cttheobophan']));
    $OBJ->setChitiettheond(check_data($_GET['chitiettheond']));

    $OBJ->setSoDuCo(check_data(str_replace(",","",$_GET['soduco'])));
    $OBJ->setSoDuNo(check_data(str_replace(",","",$_GET['soduno'])));

$OBJ->setTyGia(check_data(str_replace(",","",$_GET['tygia'])));
$OBJ->setNguyenTe(check_data(str_replace(",","",$_GET['sotiennt'])));
    //debug($_REQUEST);

    $OBJ->updatesodutk();
    echo "{\"result\": \"success\"}";
?>