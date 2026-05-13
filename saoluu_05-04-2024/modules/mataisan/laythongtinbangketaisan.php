<?php
include("../../config.php");
unset($_SESSION['DSBANGKETAISAN']);
unset($_SESSION["THONGTINPHIEU"]);
$OBJ = new mataisan();
$tuthang = $_GET['tuthang'];
$denthang = $_GET['denngay'];
$sapxeptheo = $_GET['sapxeptheo'];
$Thang =date("n",strtotime($denthang));
$Nam =date("Y",strtotime($denthang));
if($Nam==1970){
    $Thang=0;
}
$tenphieu = $_GET['tenphieu'];
$ngaylap = $_GET['ngaylap'];
$ngayhoadon = $_GET['ngayhoadon'];
$tonghopcanam = $_GET['tonghopcanam'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $ngaylap;
$_SESSION["THONGTINPHIEU"]['tenphieu'] = $tenphieu;
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $ngayhoadon;
if($sapxeptheo=="matk"){
    $data = $OBJ->loadListKhauHaoTaiSan_CaNam_Theo_MaTK($tungay=1,$Thang,"BK");
}else{
    $data = $OBJ->loadListKhauHaoTaiSan_CaNam($tungay=1,$Thang,"BK");
}

$_SESSION['DSBANGKETAISAN'] = $data;
