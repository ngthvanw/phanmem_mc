<?php
include("../../config.php");
unset($_SESSION['DSPBCHIPHIMUAHANG']);
$OBJ = new mavattu();
$tuthang = $_GET['tuthang'];
$denthang = $_GET['denthang'];
$tenphieu = $_GET['tenphieu'];
$ngaylap = $_GET['ngaylap'];
$ngayhoadon = $_GET['ngayhd'];
$tonghopcanam = $_GET['tonghopcanam'];
$_SESSION["THONGTINPHIEUCPMUAHANG"]['ngaylap'] = $ngaylap;
$_SESSION["THONGTINPHIEUCPMUAHANG"]['ngayhoadon'] = $ngayhoadon;
$_SESSION["THONGTINPHIEUCPMUAHANG"]['tenphieu'] = $tenphieu;

if($tonghopcanam=="true"){
    $data = $OBJ->loadListPBChiPhiMuaHang($tuthang,$denthang,true);

}else{
    $data = $OBJ->loadListPBChiPhiMuaHang($tuthang,$denthang,false);
}
$_SESSION['DSPBCHIPHIMUAHANG'] = $data;

