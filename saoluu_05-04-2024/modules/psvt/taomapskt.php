<?php
include("../../config.php");
$OBJ = new psvt();
$LoaiPhieu = $_GET['lp'];
$OBJ->set_orderby(" loaiphieu = ".$LoaiPhieu);
$data = $OBJ->createMaPSKT();
echo $data;
?>