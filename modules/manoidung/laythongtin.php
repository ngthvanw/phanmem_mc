<?php
include("../../config.php");
$OBJ = new manoidung();
$ma = $_GET['ma'];
$OBJ->set_orderby(" mand ='".$ma."' ");
$data = $OBJ->loadListMaNoiDung();
foreach ($data as $item){
    $datakh = $item;
}
echo json_encode($datakh);