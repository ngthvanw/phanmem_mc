<?php
session_start();
require("config.php");
$dbname = $_SESSION['TIENTO'] . $_SESSION['MST'] . "_" . $_SESSION['NienDo'];

$mysql_host = $_SESSION['HOST'];
$mysql_username = $_SESSION['USER_DB'];
// MySQL password
$mysql_password = $_SESSION['PASS_DB'];
$cnn = mysqli_connect($mysql_host, $mysql_username, $mysql_password);
$dbnamemyadmin = "phpmyadmin";
mysqli_select_db($cnn,$dbnamemyadmin);

$sql_del = "delete from user_online_{$noiluu_phanmem} where tendangnhap='{$_SESSION['User']}' and masothue='{$dbname}' ";
mysqli_query($cnn,$sql_del);

mysqli_close($cnn);

redirect("doanhnghiep.php");

?>