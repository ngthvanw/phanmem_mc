<?php
include("../../config.php");
$OBJ = new mataisan();
$ma = $_GET['thamchieu'];
$OBJ->set_orderby(" thamchieu ='".$ma."'");
$data = $OBJ->loadListPSMaTaiSan();
echo json_encode($data);