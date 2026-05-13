<?php
include("../../config.php");
$OBJ = new pskt();
$sophieu = $_GET['sophieu'];
$OBJ->setSoPhieu($sophieu);
$data = $OBJ->createSoPhieuTime();
$sott = $data;
$OBJ->re_query("ALTER TABLE `chitiet_pskt` CHANGE `sott` `sott` DOUBLE NOT NULL AUTO_INCREMENT;");
echo $sott;