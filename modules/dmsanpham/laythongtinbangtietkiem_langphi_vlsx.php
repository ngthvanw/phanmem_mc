<?php
include("../../config.php");
 unset($_SESSION['BAOCAO_TK_LP_VLSX']);
 unset($_SESSION["THONGTINPHIEU_TKLPVLSX"]);


$OBJCT = new dmsanpham();

$thang = $_GET['thang'];
$ngayhoadon= $_GET['ngayhoadon'];

$data = $OBJCT->loadDanhSachBangTKLP_VLSX($thang);

//debug($data);
$_SESSION["THONGTINPHIEU_TKLPVLSX"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU_TKLPVLSX"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU_TKLPVLSX"]['ngayhoadon'] = $ngayhoadon;

$_SESSION['BAOCAO_TK_LP_VLSX'] = $data;

