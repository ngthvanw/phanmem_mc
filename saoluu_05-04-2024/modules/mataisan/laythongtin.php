<?php
include("../../config.php");
$OBJ = new mataisan();
$ma = $_GET['ma'];
$OBJ->set_orderby(" mats ='".$ma."' ");
$data = $OBJ->loadListMaTaiSan();
foreach ($data as $item){
    $datakh = $item;
}
echo json_encode($datakh);