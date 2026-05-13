<?php
include("../../config.php");
unset($_SESSION['DSBANGKETAISAN']);
unset($_SESSION["THONGTINPHIEU"]);
$OBJ = new mataisan();
$tuthang = $_GET['tuthang'];
$denthang = $_GET['denngay'];
$Thang =date("n",strtotime($denthang));
$tenphieu = $_GET['tenphieu'];
$ngaylap = $_GET['ngaylap'];
$ngayhoadon = $_GET['ngayhoadon'];
$tonghopcanam = $_GET['tonghopcanam'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $ngaylap;
$_SESSION["THONGTINPHIEU"]['tenphieu'] = $tenphieu;
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $ngayhoadon;

$datadauky = $OBJ->daukytaisan_tanggiam();
$datatangtrongky = $OBJ->tangtaisan_tanggiam();
$datagiamtrongky = $OBJ->giamtaisan_tanggiam();
$datakhauhaotanggiam = $OBJ->loadBangKHTaiSanTangGiam_CaNam(1,$Thang,"BK");
$datakhauhao_cuoinam = $OBJ->loadBangKHTaiSan_CuoiNam(1,$Thang,"");
$_SESSION['DAUKYTANGGIAM'] = $datadauky;
$_SESSION['TANGTRONGKYTANGGIAM'] = $datatangtrongky;
$_SESSION['GIAMTRONGKYTANGGIAM'] = $datagiamtrongky;
$_SESSION['KHTRONGKYTANGGIAM'] = $datakhauhaotanggiam;
$_SESSION['KHTRONGKYCUOINAM'] = $datakhauhao_cuoinam;
