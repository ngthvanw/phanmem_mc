<?php
include("../../config.php");
$MaKH = $_GET['makh'];
$OBJ = new pskt();
$OBJ->setMaKH($MaKH);
$Ten = $OBJ->LayMaKH();
echo json_encode($Ten);


