<?php
include("../../config.php");
$OBJ = new manhanvien();
$ma = $_GET['ma'];
$OBJ->set_orderby(" manhanvien ='".$ma."' ");
$data = $OBJ->loadListMaNV();
foreach ($data as $item){
    $datakh = $item;
}
echo json_encode($datakh);