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

$danhsachthuetndn = $OBJCT->loadDanhSachToKhai_TNDN_PLUuDai();// lấy số đầu kỳ trong bản cdtk
//debug($danhsachthuetndn);

$_SESSION["THONGTINPHIEUPLUUDAI"]['thangtk'] = "Từ  " .dd_mm_yyy($tungay) ." đến " .dd_mm_yyy($denngay);

$_SESSION["THONGTINPHIEUPLUUDAI"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEUPLUUDAI"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEUPLUUDAI"]['ngayhoadon'] = $_GET['ngayhoadon'];
$_SESSION["THONGTINPHIEUPLUUDAI"]['incaptk'] = $captaikhoan;

$_SESSION["LISTTHUETNDNPLUUDAI"]=$danhsachthuetndn;





