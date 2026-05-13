<?php
include("../../config.php");
$OBJ = new mataisan();
$tanggiam = $_GET['tanggiam'];
$OBJ->set_orderby(" tanggiam = ".$tanggiam);
$data = $OBJ->createMaPSTS();
echo $data;
?>