<?php
include("../../config.php");
$OBJ = new mact;
$result = $OBJ->loadListMaCT_W();
echo json_encode($result) ;