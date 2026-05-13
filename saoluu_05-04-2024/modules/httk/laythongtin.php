<?php
include("../../config.php");
$OBJ = new hethongtaikhoan();
$ma = $_GET['ma'];
$OBJ->set_orderby(" matk ='".$ma."' ");
$data = $OBJ->loadListHTTK_W();
foreach ($data as $item){
    $datakh = $item;
}
echo json_encode($datakh);