<?php
include("../../config.php");
$OBJ = new bangkechitien();
$ma = $_GET['ma'];
$OBJ->setMabangke($ma);
$data = $OBJ->getBangKeChiTien();
echo json_encode($data);