<?php
require("../../config.php");
$OBJBK = new backup;
$MST = $_SESSION['MST'];
$TenDN = $_SESSION['TenCongTy'];
$DBNamme = $_SESSION['MST']."_".$_SESSION['NienDo'];
$filename = base64_decode($_GET['duongdan']);
$date_time = date('Y-m-d h:i:s');
$OBJBK->re_query("ALTER TABLE `saoluu` ADD `loaifile` INT(1) NOT NULL;");
$OBJBK->re_query("ALTER TABLE `saoluu` CHANGE `tenfile` `tenfile` VARCHAR(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;");
$sql = "insert into saoluu (mst,tendn,tenfile,ngayluu,loaifile) value('".$MST."','".$TenDN."','".$filename."','".$date_time."',1)";
$OBJBK->re_query($sql);
echo "Lưu thành công .<br/> Nhấn phím <strong style=\"color:blue;\">[Y]</strong> để thoát ... ";
?>