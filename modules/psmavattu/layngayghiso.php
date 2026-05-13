<?php
include("../../config.php");
$OBJ = new psmavattu();
$LoaiPhieu = $_GET['loaiphieu'];
$OBJ->setLP($LoaiPhieu);
$data = $OBJ->LayNgayGhiSo();
foreach ($data as $item){
    $datakh = $item;
}
//debug($data);
if(trim($data['ngayghiso'])!=0){
    echo $data['ngayghiso'];
}else{
    echo date("Y-m-d");
}
