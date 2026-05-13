<?php
include("../../config.php");
$tungay = $_GET['tungay'];
$denngay = $_GET['denngay'];
$nhapxuatkho = $_GET['nhapxuatkho'];
$theonoidung = $_GET['theonoidung'];
$theokhachhang = $_GET['theokhachhang'];
$theotaikhoan = $_GET['theotaikhoan'];
$mavattu = $_GET['mavattu'];
$xemtatcahanghoa = $_GET['xemtatcahanghoa'];
$sapxephanghoa = $_GET['sapxephanghoa'];
$congdonhanghoa = $_GET['congdonhanghoa'];

$tenphieu =$_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];
$ngayhoadon =$_GET['ngayhoadon'];

debug($_GET);
$OBJ = new psmavattu();
$OBJKH = new makhachhang();

$OBJ->setTuNgay($tungay);

$OBJ->setDenNgay($denngay);

$string_makh = $OBJKH->loadMaKHALL_TraVeChuoiMaKH($theokhachhang);
$string_makh_da_thaythe = str_replace(",", "','", substr($string_makh, 0, -1));

$sql_mkh="";
$sql_mvt="";
$sql_mand="";
$sql_matk="";

if($theotaikhoan==="ALL"){

}else{
    $sql_matk = " and  mavt.matk in ('" . $theotaikhoan . "') ";
}

if($theonoidung==="ALL"){

}else{
    $sql_mand = " and  mand in ('" . $theonoidung . "') ";
}

if($theokhachhang==="ALL"){

}else{
    $sql_mkh = " and  makh in ('" . $string_makh_da_thaythe . "') ";
}

if($xemtatcahanghoa==="false"){
    $sql_mvt= " and chitiet_psvt.mavt in ('".str_replace(",","','",$mavattu)."') ";
}

$OBJ->set_orderby($sql_mkh.$sql_mvt.$sql_mand.$sql_matk);

if($congdonhanghoa=="1"){
    $data = $OBJ->LoadChiTietHangHoaVatTuLaiGop($tungay,$denngay);
}else{
    $data = $OBJ->LoadChiTietHangHoaVatTuLaiGop_ChiTiet($tungay,$denngay,$sapxephanghoa);
}
$ngayhoadon = "Từ  " .dd_mm_yyy($tungay) ." đến " .dd_mm_yyy($denngay);
$datamavt = $OBJ->LoadDSMaVT();
$_SESSION['SOCHITIETHHLAIGOP']= $data;
$_SESSION['DSMAVT']= $datamavt;

$_SESSION['THONGTINPHIEUSOHHLAIGOP']['tungay']=$tungay;
$_SESSION['THONGTINPHIEUSOHHLAIGOP']['denngay']=$denngay;
$_SESSION['THONGTINPHIEUSOHHLAIGOP']['tenphieu']= $tenphieu;
$_SESSION['THONGTINPHIEUSOHHLAIGOP']['ngaylap']= date("d-m-Y");
$_SESSION['THONGTINPHIEUSOHHLAIGOP']['ngayhoadon']= $ngayhoadon;
debug($data);
