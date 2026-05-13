<?php
include("../../config.php");
$OBJ = new manhanvien;
$result = $OBJ->loadListMaNV();
echo json_encode($result);