<?php
include("../../config.php");
$OBJ = new mataisan();
$ma = $_GET['ma'];
$OBJ->set_orderby(" mats ='".$ma."'");
$data = $OBJ->loadListAllMaTaiSan();
echo json_encode($data);