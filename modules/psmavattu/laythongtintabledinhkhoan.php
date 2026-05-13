<?php
include("../../config.php");
$OBJ = new psmavattu();
$SoPhieu = $_GET['sophieu'];
$OBJ->setSoPhieu($SoPhieu);
$data = $OBJ->LayThongTinTableDinhKhoan();
foreach ($data as $item){
    $datakh = $item;
}
echo json_encode($data);