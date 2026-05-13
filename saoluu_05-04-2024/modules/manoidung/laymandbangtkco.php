<?php
include("../../config.php");
$TKNo = $_GET['tkno'];
$OBJ = new manoidung();
$OBJ->set_TKCo(33311);
$data = $OBJ->LayMaNDBangTKCo();
echo json_encode($data)
?>