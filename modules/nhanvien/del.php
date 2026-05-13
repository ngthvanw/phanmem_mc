<?php
include("../../config.php");
$MaTK = ($_GET['id']);  // chu?i MaNV có d?u , trong chu?i

$HTTK = new Hethongtaikhoan;
$HTTK->set_MaTK($MaTK);
$HTTK->xoaTaiKhoan();
?>