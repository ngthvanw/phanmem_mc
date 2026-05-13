<?php
session_start();
ini_set('max_execution_time', 0);
require("../../config.php");

$dir = $driver . "/datafile/" . $_SESSION['MST'] . "/". $_SESSION['NienDo'] . "/";
$str = $_GET['PhuongPhapTinhThue'];
$fp = @fopen($dir . "khoadulieu.db", "w");
fwrite($fp,$str);
fclose($fp);
$_SESSION['CHIDOC'] = $str;
?>