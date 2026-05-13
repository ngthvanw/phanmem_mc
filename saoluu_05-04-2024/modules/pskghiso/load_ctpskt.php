<?php
include("../../config.php");
$MaPSKT = $_GET['mapskt'];
$OBJ = new pskt();
$OBJ->setMaPSKT($MaPSKT);
$OBJ->set_orderby(" mapskt = '".$MaPSKT."' ");
$List = $OBJ->LayChiTietPSKT();
echo json_encode($List);