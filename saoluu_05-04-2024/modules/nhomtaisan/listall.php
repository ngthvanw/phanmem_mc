<?php
include("../../config.php");
$OBJ = new nhomtaisan();
$result = $OBJ->loadListMaCT_W();
echo json_encode($result) ;