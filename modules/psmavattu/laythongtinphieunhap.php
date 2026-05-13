<?php
include("../../config.php");
$OBJ = new psmavattu();
$ma = $_GET['ma'];
$LoaiPhieu = $_GET['lp'];
$OBJ->setMaPSKT($ma);
$OBJ->setLP($LoaiPhieu);
$data = $OBJ->getPhieuNhapKho();
foreach ($data as $item){
    $datakh = $item;
}
echo json_encode($data);