<?php
include("../../config.php");
unset($_SESSION['THONGTINPHIEUSOHH']);
unset($_SESSION['SOCHITIETHH']);
unset($_SESSION['DSMAVT']);
$tungay= $_GET['tungay'];
$denngay= $_GET['denngay'];
$xemchitiet= $_GET['xemchitiet'];
$intatcatvattu= $_GET['intatcatvattu'];
$mavtstr =  $_GET['mavt'];
$tenphieu =$_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];
$ngayhoadon =$_GET['ngayhoadon'];
$OBJ = new psmavattu();
$mavt = str_replace(",","','",$mavtstr);

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;

$OBJ->setTuNgay($tungay);
$OBJ->setDenNgay($denngay);
$OBJ->setXemChiTiet($xemchitiet);

if($intatcatvattu=="true"){
    $mavt="";
}else{
    $OBJ->set_orderby(" mavt in ('{$mavt}') ");
}

$OBJ->set_MaVT($mavt);
$data = $OBJ->ChiTietHangHoaVatTu();

$datamavt = $OBJ->LoadDSMaVT();
if($_SESSION['phuongphaptonkho']==2){
    $datadongiabinhquanthang = $OBJ->LoadDSMaVTBinhQuanThang_LienHoan();
}else{
    $datadongiabinhquanthang = $OBJ->LoadDSMaVTBinhQuanThang();
}


$_SESSION['SOCHITIETHH']= $data;
$_SESSION['DSMAVT']= $datamavt;
$_SESSION['DSDGBQTK']= $datadongiabinhquanthang;

$_SESSION['THONGTINPHIEUSOHH']['tungay']=$tungay;
$_SESSION['THONGTINPHIEUSOHH']['denngay']=$denngay;
$_SESSION['THONGTINPHIEUSOHH']['tenphieu']= $tenphieu;
$_SESSION['THONGTINPHIEUSOHH']['ngaylap']= $ngaylap;
$_SESSION['THONGTINPHIEUSOHH']['ngayhoadon']= $ngayhoadon;
