<?php
include("../../config.php");
$OBJ = new dmsanpham();
$data = $OBJ->createMaPSTS();
echo $data;
?>