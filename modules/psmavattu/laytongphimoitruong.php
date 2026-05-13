<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$sophieu = $_GET['sophieu'];
$OBJ->set_orderby(" sophieu = ".$sophieu);
$data = $OBJ->getTongPhiMoiTruong();
echo $data['tongmoitruong'];
