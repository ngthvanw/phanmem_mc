<?php
include("../../config.php");
$thangtk = ngaycuoithang($_GET['thangtk'], $_SESSION['NienDo']);
$sole = $_GET['sole'];
$congdontuthang = $_GET['congdontuthang'];
$congdondenthang = $_GET['congdondenthang'];
$congdon = $_GET['congdon'];

$_SESSION['TuNgay'] = $congdontuthang;
$_SESSION['DenNgay'] = $congdondenthang;

$OBJ = new psmavattu();
$OBJCT = new ps_chitiet_mavattu();

$OBJCT->setThangTonKho($congdondenthang);
$OBJCT->setThangNamTK($congdontuthang);

$_SESSION["THONGTINPHIEU"]['thangtk'] = "Từ  " .dd_mm_yyy($congdontuthang) ." đến " .dd_mm_yyy($congdondenthang);

$OBJCT->loadListDanhSachTKChiTiet();
$dataCT = $OBJCT->loadListDanhSachTKChiTietCuoiKy();// thông tin tồn đầu kỳ

$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['sole'] = $sole;
$_SESSION["LISTTKTHANG"] = $dataCT;


