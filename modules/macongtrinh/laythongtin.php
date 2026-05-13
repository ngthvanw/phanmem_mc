<?php
include("../../config.php");
$OBJ = new mact();
$ma = $_GET['ma'];
$OBJ->set_orderby(" mact ='".$ma."' ");
$data = $OBJ->loadListMaCT_W();
foreach ($data as $item){
    $datakh = $item;
}
echo json_encode($datakh);