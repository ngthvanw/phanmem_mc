<?php
include("../../config.php");
$OBJ = new hethongtaikhoan();
$result = $OBJ->loadListHTTK_W();
echo json_encode($result) ;