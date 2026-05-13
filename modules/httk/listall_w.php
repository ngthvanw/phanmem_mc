<?php
include("../../config.php");
$OBJ = new hethongtaikhoan();
$matk = $_GET['matk'];
$OBJ->set_orderby("matk in ($matk)");
$result = $OBJ->loadListHTTK_W();
echo json_encode($result) ;