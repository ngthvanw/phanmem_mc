<?php
include("../../config.php");
$OBJCT = new ketoantonghop();
unset($_SESSION["LISTCTBANGKQKD"]);
unset($_SESSION["THONGTINPHIEU"]);
$tungay = $_GET['tungay'];

$denngay = $_GET['denngay'];

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;

$quy = $_GET['quy'];

$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];

$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $_GET['ngayhoadon'];

$dataDanhSachXDKQKD = $OBJCT->load_danhsach_bangxdkqkd_dacodulieu($quy);// lấy số đầu kỳ trong bản cdtk
debug($dataDanhSachXDKQKD);
$_SESSION["LISTCTBANGKQKD"] = $dataDanhSachXDKQKD;





