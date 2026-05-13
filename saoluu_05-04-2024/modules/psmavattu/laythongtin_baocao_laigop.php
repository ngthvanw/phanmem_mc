<?php
include("../../config.php");
$tungay = $_GET['tungay'];
$denngay = $_GET['denngay'];
$nhapxuatkho = $_GET['nhapxuatkho'];
$theonoidung = $_GET['theonoidung'];
$theokhachhang = $_GET['theokhachhang'];
$theotaikhoan = $_GET['theotaikhoan'];
$loctheokho = $_GET['loctheokho'];
$loctheonhomhang = $_GET['loctheonhomhang'];
$mavattu = $_GET['mavattu'];
$xemtatcahanghoa = $_GET['xemtatcahanghoa'];
$sapxephanghoa = $_GET['sapxephanghoa'];
$congdonhanghoa = $_GET['congdonhanghoa'];

$tenphieu =$_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];
$ngayhoadon =$_GET['ngayhoadon'];

$OBJ = new psmavattu();
$OBJKHO = new makho();
$data_KHO = $OBJKHO->loadListMaKho_CoKeyLaMa();
if($loctheokho!='ALL' && $loctheokho!=''){
    $OBJ->set_orderby(" and makho ='{$loctheokho}'");
}

if($loctheonhomhang!='ALL' && $loctheonhomhang!=''){
    $OBJ->set_orderby(" and manhom ='{$loctheonhomhang}'");
}

if($congdonhanghoa=="1"){
    $data = $OBJ->LoadBangChiTietHangHoaVatTuLaiGop_CongDon($sapxephanghoa);
}else{
    $data = $OBJ->LoadBangChiTietHangHoaVatTuLaiGop_ChiTiet($sapxephanghoa);
}

$datamavt = $OBJ->LoadDSMaVT();
$_SESSION['SOCHITIETHHLAIGOP']= $data;
$_SESSION['DSMAVT']= $datamavt;

$_SESSION['THONGTINPHIEUSOHHLAIGOP']['tungay']=$tungay;
$_SESSION['THONGTINPHIEUSOHHLAIGOP']['denngay']=$denngay;
$_SESSION['THONGTINPHIEUSOHHLAIGOP']['tenphieu']= $tenphieu;
$_SESSION['THONGTINPHIEUSOHHLAIGOP']['ngaylap']= $ngaylap;
$_SESSION['THONGTINPHIEUSOHHLAIGOP']['ngayhoadon']= $ngayhoadon;
$_SESSION['DSKHOHANG'] = $data_KHO;


