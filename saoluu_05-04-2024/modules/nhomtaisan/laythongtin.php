<?php
include("../../config.php");
$OBJ = new nhomtaisan();
$ma = $_GET['ma'];
$OBJ->set_orderby(" manhom ='".$ma."' ");
$data = $OBJ->loadListMaCT_W();
foreach ($data as $item){
    $datakh = $item;
}
echo json_encode($datakh);