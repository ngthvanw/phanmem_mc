<?php
include("config.php");
$OBJ = new ps_chitiet_mavattu();
// Cái nào mới sẽ được cập nhật ở đây
$OBJ->re_query("ALTER TABLE `psvt` ADD `machinhanh` CHAR(14) NOT NULL, ADD INDEX `index_macn` (`machinhanh`);");
$OBJ->re_query("ALTER TABLE `pskt` ADD `machinhanh` CHAR(14) NOT NULL, ADD INDEX `index_macn` (`machinhanh`);");

$OBJ->re_query("update `pskt` set  machinhanh='".$_SESSION['MST']."' where machinhanh=''");
$OBJ->re_query("update `psvt` set  machinhanh='".$_SESSION['MST']."' where machinhanh=''");
?>