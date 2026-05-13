<?php
include("../../config.php");
$OBJ = new MaBP;
$result = $OBJ->loadListMaBP();
echo json_encode($result) ;