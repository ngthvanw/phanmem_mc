<?php
include("../../config.php");
$OBJ = new bangkechitien();
$result = $OBJ->loadListBangKeChiTien();
echo json_encode($result);