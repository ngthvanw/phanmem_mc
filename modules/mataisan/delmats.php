<?php
include("../../config.php");
$OBJ = new mataisan();
$OBJ->set_SoTT(check_data($_GET['id']));
$OBJ->set_MaTaiSan(check_data($_GET['ma']));

$check = $OBJ->checkXoa();
if ($check == TRUE) {
    echo "{\"result\": \"fail\"}";
} else {
    $OBJ->xoaMaTS();
    echo "{\"result\": \"success\"}";
}
?>