<?php
session_start();
ini_set('max_execution_time', 300);
ini_set('precision', 30);
$noiluu_phanmem="phanmem_mc";// Thư mục chứa phần mềm

$Partion = "D:\\"; // Phân vùng chứa phần mềm

$domain=$_SERVER["SERVER_NAME"];
$driver = $Partion."xampp\htdocs\\".$noiluu_phanmem;// đường dẫn chứa phần mềm
$driver_htdocs = $Partion."xampp\htdocs";
$URI= 'https://'.$domain;

$_SESSION['DRIVER_PM'] = $driver;

$_SESSION['URI'] = $URI;

include("libraries/function.php");
include("libraries/class.php");
include("func.php");
if(($_SESSION['CHIDOC']=="0" || $_SESSION['CHIDOC']=="") && $_SESSION['KhoaDL']!=2){
    $_SESSION['USER_DB'] = "root";
}else if(($_SESSION['CHIDOC']=="1" && $_SESSION['Level']!="") || $_SESSION['KhoaDL']==2){
    $_SESSION['USER_DB'] = "CHIDOC";
}else if($_SESSION['CHIDOC']=="2" && ($_SESSION['Level']=="5" || $_SESSION['Level']=="6") || $_SESSION['KhoaDL']==2) {
    $_SESSION['USER_DB'] = "CHIDOC";
}else{
    $_SESSION['USER_DB'] = "root";
}
?>