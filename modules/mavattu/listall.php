<?php
include("../../config.php");
$OBJ = new mavattu();
$result = $OBJ->loadListMaVT_Json();
echo json_encode($result);
?>