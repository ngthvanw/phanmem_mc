<?php
include("../../config.php");
$OBJ = new makhachhang;
$result = $OBJ->loadListMaKH_Frm();
echo json_encode($result);
?>