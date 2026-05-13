<?php
include("../../config.php");
$thangtk = ngaycuoithang($_GET['thangtk'],$_SESSION['NienDo']);
$sole = $_GET['sole'];

$OBJ = new psmavattu();
$OBJCT = new ps_chitiet_mavattu();
$OBJCT->setThangTonKho($thangtk);
$OBJCT->setThangNamTK($_SESSION['NienDo']."-".$_GET['thangtk']."-1");
$OBJCT->loadListDanhSachTKChiTiet();
$dataCT = $OBJCT->loadListDanhSachTKChiTietCuoiKy();// thông tin tồn đầu kỳ

$_SESSION["THONGTINPHIEU"]['thangtk'] = $_GET['thangtk']."-".$_SESSION['NienDo'];
$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['sole'] = $sole;
$_SESSION["LISTTKTHANG"]=$dataCT ;


