<?php
require("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$SoPhieu = $_GET['sophieu'];
$OBJ->re_query("delete from nhaphoadon where sophieu='".$SoPhieu."'");
unset($_SESSION['DataPhucHoi']);
unset($_SESSION['DataExcel']);
echo "Xoá danh sách thành công!";
?>