<?php
include("../../config.php");
$OBJCT = new baocaothue();
$tungay = $_GET['tungay'];
$loaitokhai = $_GET['loaitokhai'];

$denngay = $_GET['denngay'];

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;

$captaikhoan = $_GET['intheothuesuat'];
$intheochungtu= $_GET['intheochungtu'];
$sapxeptheohoadon= $_GET['sapxeptheohoadon'];
$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];

$danhsachthuetndn = $OBJCT->loadDanhSachToKhai_TNDN_PLChuyenLo($_SESSION['NienDo']);// lấy số đầu kỳ trong bản cdtk


$_SESSION["THONGTINPHIEUPLCHUYENLO"]['thangtk'] = "Từ  " .dd_mm_yyy($tungay) ." đến " .dd_mm_yyy($denngay);

$_SESSION["THONGTINPHIEUPLCHUYENLO"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEUPLCHUYENLO"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEUPLCHUYENLO"]['ngayhoadon'] = $_GET['ngayhoadon'];
$_SESSION["THONGTINPHIEUPLCHUYENLO"]['incaptk'] = $captaikhoan;

$_SESSION["LISTTHUETNDNPLCHUYENLO"]=$danhsachthuetndn;





