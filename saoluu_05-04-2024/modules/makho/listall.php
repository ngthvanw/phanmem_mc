<?php
include("../../config.php");
$OBJ = new MaKho;
$result = $OBJ->loadListMaKho();
echo json_encode($result) ;