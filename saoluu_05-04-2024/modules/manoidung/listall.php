<?php
include("../../config.php");
$OBJ = new manoidung;
$mapl = $_GET['mapl'];
$arr_mapl = explode(",",$mapl);
$str_mapl = implode("','",$arr_mapl);
$OBJ->set_orderby(" mapl in ('".$str_mapl."')");
$result = $OBJ->loadListMaNoiDung();
echo json_encode($result);