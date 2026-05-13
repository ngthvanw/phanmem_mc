<?php
include("../../config.php");
unset($_SESSION["LISTCTBCDKT"]);
unset($_SESSION["LISTCTBCDTKNO"]);
unset($_SESSION["LISTCTBCDTKCO"]);

if($_SESSION['theothongtu']=="tt200"){
	$OBJCT = new ketoantonghop();
$tungay = $_GET['tungay'];

$denngay = $_GET['denngay'];

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;

$captaikhoan = $_GET['intheothuesuat'];
$intheochungtu= $_GET['intheochungtu'];
$sapxeptheohoadon= $_GET['sapxeptheohoadon'];
$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];

$_SESSION["THONGTINPHIEU"]['thangtk'] = "Từ  " .dd_mm_yyy($tungay) ." đến " .dd_mm_yyy($denngay);


$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $_GET['ngayhoadon'];
$_SESSION["THONGTINPHIEU"]['incaptk'] = $captaikhoan;

$dataLISTBCDTK = $OBJCT->load_danhsach_bangcd_ketoan_tt200();
foreach ($dataLISTBCDTK as $itemListCD){
    $data_cdkt[$itemListCD['loaitsnv']][] = $itemListCD;
}
$_SESSION["LISTCTBCDKT"]=$data_cdkt;
$_SESSION["LISTCTBCDTKNO"] = $array_no;
$_SESSION["LISTCTBCDTKCO"] = $array_co;
}else{
	$OBJCT = new ketoantonghop();
$tungay = $_GET['tungay'];

$denngay = $_GET['denngay'];

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;

$captaikhoan = $_GET['intheothuesuat'];
$intheochungtu= $_GET['intheochungtu'];
$sapxeptheohoadon= $_GET['sapxeptheohoadon'];
$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];

$_SESSION["THONGTINPHIEU"]['thangtk'] = "Từ  " .dd_mm_yyy($tungay) ." đến " .dd_mm_yyy($denngay);


$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $_GET['ngayhoadon'];
$_SESSION["THONGTINPHIEU"]['incaptk'] = $captaikhoan;

$dataLISTBCDTK = $OBJCT->load_danhsach_bangcd_ketoan();
foreach ($dataLISTBCDTK as $itemListCD){
    $data_cdkt[$itemListCD['loaitsnv']][] = $itemListCD;
}
$_SESSION["LISTCTBCDKT"]=$data_cdkt;
$_SESSION["LISTCTBCDTKNO"] = $array_no;
$_SESSION["LISTCTBCDTKCO"] = $array_co;
}