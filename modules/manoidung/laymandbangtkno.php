<?php
include("../../config.php");
$TKNo = $_GET['tkno'];
$OBJ = new manoidung();
$OBJ->set_TKNo(1331);
$data = $OBJ->LayMaNDBangTKno();
echo json_encode($data)
?>