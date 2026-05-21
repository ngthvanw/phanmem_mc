<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
ini_set('max_execution_time', 300);
ini_set('precision', 30);
$noiluu_phanmem="phanmem_mc";// Thư mục chứa phần mềm

$Partion = "D:\\"; // Phân vùng chứa phần mềm

$domain=$_SERVER["SERVER_NAME"];
$driver = $Partion."xampp\htdocs\\".$noiluu_phanmem;// đường dẫn chứa phần mềm
$driver_htdocs = $Partion."xampp\htdocs";
$mysql_cli = $Partion."xampp\\mysql\\bin\\mysql";
$URI= 'https://'.$domain;

// Local machine override. Keep this file out of git using .git/info/exclude.
$localConfigFile = __DIR__ . '/config.local.php';
if (file_exists($localConfigFile)) {
    include($localConfigFile);
}

if (!isset($driver) || $driver === '') {
    $driver = __DIR__;
}
if (!isset($driver_htdocs) || $driver_htdocs === '') {
    $driver_htdocs = dirname($driver);
}
if (!isset($mysql_cli) || $mysql_cli === '') {
    $mysql_cli = $Partion."xampp\\mysql\\bin\\mysql";
}
if (!isset($URI) || $URI === '') {
    $URI = 'https://'.$domain;
}

$driver = rtrim($driver, "\\/");
$driver_htdocs = rtrim($driver_htdocs, "\\/");

if (!isset($_SESSION['HOST']) || $_SESSION['HOST'] === '') {
    $_SESSION['HOST'] = '127.0.0.1';
}
if (!isset($_SESSION['USER_DB']) || $_SESSION['USER_DB'] === '') {
    $_SESSION['USER_DB'] = 'root';
}
if (!isset($_SESSION['PASS_DB'])) {
    $_SESSION['PASS_DB'] = '';
}
if (!isset($_SESSION['TIENTO']) || $_SESSION['TIENTO'] === '') {
    $_SESSION['TIENTO'] = 'kt01_';
}

$_SESSION['DRIVER_PM'] = $driver;

$_SESSION['URI'] = $URI;

include_once("libraries/function.php");
include_once("libraries/class.php");
include_once("func.php");
$sessionChiDoc = isset($_SESSION['CHIDOC']) ? (string)$_SESSION['CHIDOC'] : '';
$sessionKhoaDL = isset($_SESSION['KhoaDL']) ? (string)$_SESSION['KhoaDL'] : '0';
$sessionLevel = isset($_SESSION['Level']) ? (string)$_SESSION['Level'] : '';

if(($sessionChiDoc=="0" || $sessionChiDoc=="") && $sessionKhoaDL!="2"){
    $_SESSION['USER_DB'] = "root";
}else if(($sessionChiDoc=="1" && $sessionLevel!="") || $sessionKhoaDL=="2"){
    $_SESSION['USER_DB'] = "CHIDOC";
}else if($sessionChiDoc=="2" && ($sessionLevel=="5" || $sessionLevel=="6") || $sessionKhoaDL=="2") {
    $_SESSION['USER_DB'] = "CHIDOC";
}else{
    $_SESSION['USER_DB'] = "root";
}
?>