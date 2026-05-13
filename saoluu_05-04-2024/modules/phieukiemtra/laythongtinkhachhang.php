<?php
include("../../config.php");
$OBJ = new makhachhang();
$ma = $_GET['ma'];
$OBJ->set_orderby(" makh ='".$ma."' ");
$data = $OBJ->loadListMaKH_W();
foreach ($data as $item){
    $datakh = $item;
}
echo json_encode($datakh);