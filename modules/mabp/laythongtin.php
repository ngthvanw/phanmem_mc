<?php
include("../../config.php");
$OBJ = new mabp();
$ma = $_GET['ma'];
$OBJ->set_orderby(" mabp ='".$ma."' ");
$data = $OBJ->loadListMaBP();
foreach ($data as $item){
    $datakh = $item;
}
echo json_encode($datakh);