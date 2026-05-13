<?php
include("../../config.php");
$mabangke = $_GET['mabangke'];
$OBJ = new bangkechitien();
$OBJ->set_orderby(" mabangke = '{$mabangke}'");
$result = $OBJ->getBangKeChiTietChiTien();
echo "{\"data\":".json_encode($result) ." }" ;