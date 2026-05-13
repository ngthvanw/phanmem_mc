<?php
session_start();
require("../../config.php");
$sott = $_GET['sott'];
$fid = $_GET['fid'];
$OBJBK = new backup;
$sql = "delete from saoluu where sott='" . $sott . "'";
$OBJBK->re_query($sql);
$path = $driver . "/backup/" . $_SESSION['MST'] . "_" . $_SESSION['NienDo'] . "/";
unlink($path.$fid);
echo "Xoá dữ liệu thành công";
?>