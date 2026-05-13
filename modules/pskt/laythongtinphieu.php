<?php
include("../../config.php");
$OBJ = new pskt();
$mapskt = $_GET['ma'];
$LoaiPhieu = $_GET['lp'];
$OBJ->set_orderby(" pskt.mapskt ='".$mapskt."' and pskt.loaiphieu=".$LoaiPhieu);
$data = $OBJ->loadListPSKT();
foreach ($data as $item){
    $datakh = $item;
}
echo json_encode($datakh);