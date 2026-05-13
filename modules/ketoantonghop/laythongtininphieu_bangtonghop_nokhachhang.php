<?php
include("../../config.php");
$OBJCT = new ketoantonghop();
$tungay = $_GET['tungay'];

$denngay = $_GET['denngay'];

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;

$captaikhoan = $_GET['intheothuesuat'];

$makhachhang = $_GET['makhachhang'];

$nhomkhachhang = $_GET['nhomkhachhang'];

$sql_mkh="";
if($makhachhang=="ALL"){

}else{
    $sql_mkh = " and makh='".$makhachhang."'";
}

$mataikhoan= $_GET['mataikhoan'];
$sql_matk="";
if($mataikhoan=="ALL"){
    $sql_matk = " and matk!=''";
}else{
    $sql_matk = " and matk='".$mataikhoan."'";
}

$sql_manhomkh="";
if($nhomkhachhang=="ALL"){
    $sql_manhomkh = " and manhom!=''";
}else{
    $sql_manhomkh = " and manhom='".$nhomkhachhang."'";
}

$loaitien= $_GET['loaitien'];
$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];

$sql_loaitien="";
if($loaitien=="VND"){
    $sql_loaitien=" and loaitien='VND' ";
}else if($loaitien=="NT"){
    $sql_loaitien=" and loaitien!='VND' ";
}else{
    $sql_loaitien=" and loaitien!='' ";
}



$_SESSION["THONGTINPHIEU"]['thangtk'] = "Từ  " .dd_mm_yyy($tungay) ." đến " .dd_mm_yyy($denngay);

$QR_NhomKH = $OBJCT->re_query("select * from manhomkh");
$data_NhomKH = $OBJCT->re_fetch_all($QR_NhomKH);

$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $_GET['ngayhoadon'];
$_SESSION["THONGTINPHIEU"]['incaptk'] = $captaikhoan;
$OBJCT->re_query("UPDATE pskt SET makh_nh = '' WHERE (loaiphieu!=3 and loaiphieu!=4) or tenkh_nh='';");
$OBJCT->set_orderby($sql_loaitien.$sql_matk.$sql_manhomkh);
$dataBCDTK = $OBJCT->load_danhsach_congno();

foreach ($dataBCDTK as $item){
    $dataNoTongHop[$item['matk']][] = $item;
}
$_SESSION["LISTNHOMKH"]=$data_NhomKH;
$_SESSION["LISTTONGHOPNO"]=$dataNoTongHop;



