<?php
include("../../config.php");
$OBJ = new mavattu;
$sott = check_data($_GET['id']);
$sql = "DELETE FROM phpmyadmin.`danhsach_congty_kiemtra_{$noiluu_phanmem}` WHERE sott='".$sott."'";
$OBJ->re_query($sql);
echo "{\"result\": \"success\"}";
?>