<?php
include("../../config.php");
$OBJ = new vonchusohuu();
$ma = $_GET['maps'];
$tanggiam = $_GET['tanggiam'];
$OBJ->set_orderby(" mapsvoncsh ='".$ma."' and tanggiam='".$tanggiam."'");
$data = $OBJ->loadListPSMaTaiSan();
echo json_encode($data);