<?php
include("../../config.php");
unset($_SESSION['BAOCAO_TK_LP_VLCT']);
unset($_SESSION["THONGTINPHIEU_TKLPVLCT"]);


$OBJCT = new dmsanpham();

$mact = str_replace(",","','",substr($_GET['mact'], 0, -1));

$ngayhoadon= $_GET['ngayhoadon'];

$data = $OBJCT->loadDanhSachBangTKLP_VLCT($mact);

$_SESSION["THONGTINPHIEU_TKLPVLCT"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU_TKLPVLCT"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU_TKLPVLCT"]['ngayhoadon'] = $ngayhoadon;

$_SESSION['BAOCAO_TK_LP_VLCT'] = $data;

