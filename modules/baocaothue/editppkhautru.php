<?php
session_start();
ini_set('max_execution_time', 300);
require("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$PhuongPhapTinhThue = $_GET['PhuongPhapTinhThue'];
$PhuongPhapTinhThueTheo = $_GET['PhuongPhapTinhThueTheo'];
$NhomNganh = $_GET['NhomNganh'];

$dir = $driver . "/datafile/" . $_SESSION['MST'] . "/" . $_SESSION['NienDo'] . "/";
$str = $_GET['PhuongPhapTinhThue'].';'.$_GET['PhuongPhapTinhThueTheo'].';'.$_GET['NhomNganh'];

$PPKekhai = $str;
$fp = @fopen($dir . "phuongphapkhaithue.db", "w");

fwrite($fp,$str);
fclose($fp);

$OBJ->re_query("insert into thongtinchung(sott,noidung) values(2,'".$PPKekhai."')");
$OBJ->re_query("update thongtinchung set noidung ='".$PPKekhai."' where sott = 2");
?>