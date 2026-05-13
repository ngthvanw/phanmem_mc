<?php
include("../../config.php");
 unset($_SESSION['BAOCAO_SUDUNGHD']);
 unset($_SESSION['TongSoDu']);
$OBJCT = new baocaothue();

$tuthang = $_GET['tungay'];

$quy = $_GET['denngay'];

$intheothuesuat = $_GET['intheothuesuat'];
$tonghopcanam = $_GET['tonghopcanam'];
$intheochungtu= $_GET['intheochungtu'];
$sapxeptheohoadon= $_GET['sapxeptheohoadon'];
$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];
$ngayhoadon= $_GET['ngayhoadon'];

if($tonghopcanam=="true"){
    $data = $OBJCT->loadDanhSachDoiSoatHoaDonXoa($quy);
}else{
    $data = $OBJCT->loadDanhSachDoiSoatHoaDonXoa($quy);
}
//debug($data);
$_SESSION["THONGTINPHIEU_BCHD"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU_BCHD"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU_BCHD"]['ngayhoadon'] = $ngayhoadon;

$_SESSION['BAOCAO_SUDUNGHD'] = $data;
