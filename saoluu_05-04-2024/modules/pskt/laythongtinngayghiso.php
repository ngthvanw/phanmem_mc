<?php
include("../../config.php");
$OBJ = new pskt();
$LoaiPhieu = $_GET['lp'];
$OBJ->setLP($LoaiPhieu);
$data = $OBJ->getTopPSKT();
foreach ($data as $item){
    $datakh = $item;
}
if($data==0){
    echo date("Y-m-d");
}else{
    echo $data['ngayghiso'];
}