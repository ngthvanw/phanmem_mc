<?php
include("../../config.php");
unset($_SESSION["THONGTINPHIEUBANGLUONGNHANVIEN"]);
unset($_SESSION["LISTBANGLUONGNHANVIEN"]);

$txttinhluongtheo = $_GET['txttinhluongtheo'];
$tinhluongtheo = $_GET['tinhluongtheo'];
$OBJ = new manhanvien;
$OBJ->set_orderby(" thang='{$txttinhluongtheo}'");
if($tinhluongtheo!="true") {
    $data = $OBJ->LoadBangLuongNhanVien();
}else{
    $data = $OBJ->LoadBangLuongNhanVienTongHop();
}

$_SESSION["THONGTINPHIEUBANGLUONGNHANVIEN"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEUBANGLUONGNHANVIEN"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEUBANGLUONGNHANVIEN"]['ngayhoadon'] = $_GET['ngayhoadon'];
$_SESSION["LISTBANGLUONGNHANVIEN"] = $data;
//debug($data);
?>