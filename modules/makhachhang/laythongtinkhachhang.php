<?php
include("../../config.php");
$OBJ = new makhachhang();
$ma = $_GET['ma'];
$OBJ->set_orderby(" makh ='".$ma."' ");
$data = $OBJ->loadListMaKH_W();
foreach ($data as $item){    
    if(['socmnd'] != null && $item['socmnd'] != ""){
        $CCCD = $item['socmnd'];
        $ten = $item['tenkh'] . " (CCCD: " . $CCCD . ")";
        $item['tenkh'] =  $ten;
    }
    $datakh = $item;
}
echo json_encode($datakh);