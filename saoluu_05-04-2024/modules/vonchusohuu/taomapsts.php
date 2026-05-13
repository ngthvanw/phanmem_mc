<?php
include("../../config.php");
$OBJ = new vonchusohuu();
$tanggiam = $_GET['tanggiam'];
$OBJ->set_orderby(" tanggiam = ".$tanggiam);
$data = $OBJ->createMaPSTS();
echo $data;
?>