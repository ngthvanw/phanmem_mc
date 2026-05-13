<?php
include("../../config.php");
$OBJ = new dmsanpham();
$OBJ->set_SoTT(check_data($_GET['sott']));
$OBJ->set_MaCT(check_data($_GET['mact']));
$OBJ->setSoDuNo(check_data($_GET['soduno']));
$OBJ->setSoDuCo(check_data($_GET['soduco']));

$OBJ->suaCPDoDangDK();
echo "{\"result\": \"success\"}";
?>