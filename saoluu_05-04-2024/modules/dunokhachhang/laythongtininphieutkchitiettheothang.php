<?php
include("../../config.php");
$thangtk = ngaycuoithang($_GET['thangtk'], $_SESSION['NienDo']);
$sole = $_GET['sole'];
$congdontuthang = $_GET['congdontuthang'];
$congdondenthang = $_GET['congdondenthang'];
$congdon = $_GET['congdon'];

$OBJCT = new ps_chitiet_mavattu();

$OBJCT->setThangTonKho($_SESSION['NienDo']."-".$_GET['thangtk']."-01");
$OBJCT->setThangNamTK($thangtk);
$OBJCT->setThang($_GET['thangtk']);

//$_SESSION["THONGTINPHIEU"]['thangtk'] = "Từ  " .dd_mm_yyy($congdontuthang) ." đến " .dd_mm_yyy($congdondenthang);
if($_GET['thangtk']==1){
    $data = $OBJCT->themTonKhoThangTuTK();
}else{
    $data = $OBJCT->themTonKhoThang();
}
//$dataCT = $OBJCT->loadListDanhSachTKChiTietCuoiKy();// thông tin tồn đầu kỳ
//debug($data);

//$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
//$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
//$_SESSION["THONGTINPHIEU"]['sole'] = $sole;
//$_SESSION["LISTTKTHANG"] = $dataCT;


