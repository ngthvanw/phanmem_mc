<?php
require("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$SoPhieu = $_GET['sophieu'];
$sub = rand(10,99);
$sott = trim(trim($_SESSION['UserID']).time()).$sub;
$OBJ->re_query("insert into mavt (sott,mavt,tenvt,dvt,manhom,matk,tkdoanhthu,tenkd,rate) select '0',mavt,tenvt,dvt,manhom,matk,tkdoanhthu,tenkd,thuesuat from nhaphoadon where sophieu='".$SoPhieu."' ON DUPLICATE KEY UPDATE dvtp = '' ");
$OBJ->re_query("update mavt set sott=stt where sott=0");
$OBJ->re_query("insert into tk (mavt,tenvt,dvt,slck,gtvnck,dgxvnd,makho,tenkd,manhom,matk) select mavt,tenvt,dvt,soluong,dongia,thanhtien,'0010',tenkd,manhom,matk from nhaphoadon where sophieu='".$SoPhieu."'");

$OBJ->re_query("delete from nhaphoadon where sophieu='".$SoPhieu."'");
unset($_SESSION['DataPhucHoi']);
unset($_SESSION['DataExcel']);
echo "Sao chép danh sách thành công!";
?>