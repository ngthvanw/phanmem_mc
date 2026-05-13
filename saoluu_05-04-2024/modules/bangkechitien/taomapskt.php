<?php
include("../../config.php");
$OBJ = new bangkechitien();
$data = $OBJ->createMaPSKT();
echo $data;
?>