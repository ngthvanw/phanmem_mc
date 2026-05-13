<?php
include("../../config.php");
$OBJCT = new baocaothue();
$tungay = $_GET['tungay'];

$denngay = $_GET['denngay'];

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;

$captaikhoan = $_GET['intheothuesuat'];
$intheochungtu= $_GET['intheochungtu'];
$sapxeptheohoadon= $_GET['sapxeptheohoadon'];
$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];

$_SESSION["THONGTINPHIEULCTT"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEULCTT"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEULCTT"]['ngayhoadon'] = $_GET['ngayhoadon'];
$_SESSION["THONGTINPHIEULCTT"]['incaptk'] = $captaikhoan;

$dataBLCTT = $OBJCT->loadDanhSachLuuChuyen_TienTe();

$_SESSION["LISTCTBLCTT"]=$dataBLCTT;
