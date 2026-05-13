<?php
include("../../config.php");
$OBJ = new dmsanpham();
$ma = $_GET['ma'];
$OBJ->set_orderby(" masp ='".$ma."' ");
$data = $OBJ->loadListMaSP_W();
foreach ($data as $item){
    $datakh = $item;
}
echo json_encode($datakh);