<?php
include("../../config.php");
$OBJ = new makhachhang;
$result = $OBJ->loadListMaKH();
echo json_encode($result);
?>