<?php
include("../../config.php");
unset($_SESSION["THONGTINPHIEU"]);
unset($_SESSION["LISTTKTHANG"]);
$thangtk = ngaycuoithang($_GET['thangtk'], $_SESSION['NienDo']);
$sole = $_GET['sole'];
$congdontuthang = $_GET['congdontuthang'];
$congdondenthang = $_GET['congdondenthang'];
$congdon = $_GET['congdon'];

$Inxoasoam = $_GET['Inxoasoam'];

$OBJCT = new ps_chitiet_mavattu();
$OBJCT->setThang($_GET['thangtk']);

if($congdon==0){// Nếu là lấy tồn kho theo tháng
        $OBJCT->setThangTonKho($thangtk);
        $OBJCT->setThangNamTK($_SESSION['NienDo']."-".$_GET['thangtk']."-01");
        $_SESSION["THONGTINPHIEU"]['thangtk'] = "Tháng ".$congdondenthang." - ".$_SESSION['NienDo'];
        $dataCT = $OBJCT->loadListDanhSachTKTheoThangChiTietCuoiKyTheoNhom($Inxoasoam);// thông tin tồn đầu kỳ

}else { // Lấy tồn kho từ ngày đến ngày
    $OBJCT->setThangTonKho($congdondenthang);
    $OBJCT->setThangNamTK($congdontuthang);

    $_SESSION["THONGTINPHIEU"]['thangtk'] = "Tháng ".$congdondenthang." - ".$_SESSION['NienDo'];

    $dataCT = $OBJCT->loadListDanhSachTKTheoThangChiTietCuoiKyTheoNhom_CongDon($Inxoasoam,$congdontuthang,$congdondenthang);// thông tin tồn đầu kỳ
}

$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = date("d-m-Y");
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = "Tháng ".$congdondenthang." - ".$_SESSION['NienDo'];
$_SESSION["THONGTINPHIEU"]['sole'] = $sole;
$_SESSION["LISTTKTHANG"]=$dataCT ;
//debug($dataCT);


