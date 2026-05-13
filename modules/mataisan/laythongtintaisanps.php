<?php
include("../../config.php");
$OBJ = new mataisan();
$ma = $_GET['maps'];
$tanggiam = $_GET['tanggiam'];
$OBJ->set_orderby(" mapsts ='".$ma."' and tanggiam='".$tanggiam."'");
$data = $OBJ->loadListPSMaTaiSan();
echo json_encode($data);