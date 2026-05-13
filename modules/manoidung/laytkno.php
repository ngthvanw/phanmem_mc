<?php
include("../../config.php");
$mand = $_GET['mand'];
$OBJ = new manoidung();
$OBJ->set_MaND($mand);
$data = $OBJ->getMaND();
echo json_encode($data)
?>