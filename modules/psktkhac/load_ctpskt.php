<?php
include("../../config.php");
$SoPhieu = $_GET['sophieu'];
$OBJ = new pskt();
$OBJ->set_orderby(" sophieu = '".$SoPhieu."' ");
$List = $OBJ->loadListChiTietPSKT();
echo json_encode($List);