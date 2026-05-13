<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$mavt = $_GET['mavt'];

$OBJ->set_MaVT($mavt);
$result = $OBJ->getMaVT();
echo json_encode($result);
?>