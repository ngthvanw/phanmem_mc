<?php
include("../../config.php");
$OBJ = new dmsanpham();
$OBJ->set_orderby(" loaisp!='' ");
//$result = $OBJ->loadListMaSP_W();
$result = $OBJ->loadListMaSP_Frm();
echo json_encode($result) ;