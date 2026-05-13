<?php
include("../../config.php");
$OBJ = new baocaothue();
$sott = $_GET['sott'];
$maso = $_GET['maso'];
$chitieu = $_GET['chitieu'];
$machitieu = $_GET['machitieu'];
$sotien = $_GET['sotien'];
$machitieucha = $_GET['machitieucha'];
$matk = $_GET['matk'];
$OBJ->suaToKhai_TNDN($sott,$maso, $chitieu, $machitieu, $sotien, $machitieucha);
?>