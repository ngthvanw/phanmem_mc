<?php
include("../../config.php");
$OBJ = new makho();
$ma = $_GET['ma'];
$OBJ->set_orderby(" makho ='".$ma."' ");
$data = $OBJ->loadListMaKho();
foreach ($data as $item){
    $datakh = $item;
}
echo json_encode($datakh);