<?php
session_start();
ini_set('max_execution_time', 300);
require("../../config.php");
$ChiNhanh = $_GET['ChiNhanh'];
$TenCN = $_GET['TenCN'];

$_SESSION['ChiNhanh'] = $ChiNhanh;
$_SESSION['TenCN'] = $TenCN;
?>