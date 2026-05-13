<?php
include("../../config.php");
unset($_SESSION["THONGTINPHIEU"]);
unset($_SESSION["LISTTKTHANG"]);
$thangtk = ngaycuoithang($_GET['thangtk'], $_SESSION['NienDo']);
$sole = $_GET['sole'];
$congdontuthang = $_GET['congdontuthang'];
$congdondenthang = $_GET['congdondenthang'];
$PhuongPhapTinhGiaVon = $_GET['PhuongPhapTinhGiaVon'];
$congdon = $_GET['congdon'];

$Inxoasoam = $_GET['Inxoasoam'];
$loctheotk = $_GET['loctheotk'];
$gomnhommavt = $_GET['gomnhommavt'];


$OBJCT = new ps_chitiet_mavattu();
$OBJKHO = new makho();
$makho = $_GET['loctheokho'];
$loctheonhomhang = $_GET['loctheonhomhang'];
$string_kho="";
if($makho=="ALL"){
    $string_kho=" makho!='' ";
}else{
    $string_kho=" makho='".$makho."' ";
}
$OBJKHO->set_orderby($string_kho);

$data_KHO = $OBJKHO->loadListMaKho_CoKeyLaMa();
$OBJCT->setThang($_GET['thangtk']);
if($PhuongPhapTinhGiaVon==2){
    $OBJCT->setThangTonKho($congdondenthang);
    $OBJCT->setThangNamTK($congdontuthang);

    $_SESSION["THONGTINPHIEU"]['thangtk'] = $_GET['ngayhoadon'];
    if ($congdon == 1) {// Nếu là lấy tồn kho theo tháng
        if($gomnhommavt=="true"){
            $dataCT = $OBJCT->loadListDanhSachTKTheoThangChiTietCuoiKyTheoNhom_CongDon_LienHoa_TongHop($Inxoasoam, $congdontuthang, $congdondenthang, $loctheotk, $data_KHO, $loctheonhomhang);// thông tin tồn đầu kỳ
        }else{
            $dataCT = $OBJCT->loadListDanhSachTKTheoThangChiTietCuoiKyTheoNhom_CongDon_LienHoa($Inxoasoam, $congdontuthang, $congdondenthang, $loctheotk, $data_KHO, $loctheonhomhang);// thông tin tồn đầu kỳ
        }
    }else{
        $dataCT = $OBJCT->loadListDanhSachTKTheoThangChiTietCuoiKyTheoNhom_LienHoa($Inxoasoam, $congdontuthang, $congdondenthang, $loctheotk, $data_KHO, $loctheonhomhang);// thông tin tồn đầu kỳ
    }
}else {
    if ($congdon == 0) {// Nếu là lấy tồn kho theo tháng
        $OBJCT->setThangTonKho($thangtk);
        $OBJCT->setThangNamTK($_SESSION['NienDo'] . "-" . $_GET['thangtk'] . "-01");
        $_SESSION["THONGTINPHIEU"]['thangtk'] = $_GET['ngayhoadon'];
        $dataCT = $OBJCT->loadListDanhSachTKTheoThangChiTietCuoiKyTheoNhom($Inxoasoam, $loctheotk, $data_KHO, $loctheonhomhang);// thông tin tồn đầu kỳ

    } else { // Lấy tồn kho từ ngày đến ngày
        $OBJCT->setThangTonKho($congdondenthang);
        $OBJCT->setThangNamTK($congdontuthang);

        $_SESSION["THONGTINPHIEU"]['thangtk'] = $_GET['ngayhoadon'];

        $dataCT = $OBJCT->loadListDanhSachTKTheoThangChiTietCuoiKyTheoNhom_CongDon($Inxoasoam, $congdontuthang, $congdondenthang, $loctheotk, $data_KHO, $loctheonhomhang);// thông tin tồn đầu kỳ
    }
}

$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $_GET['ngayhoadon'];
$_SESSION["THONGTINPHIEU"]['sole'] = $sole;
$_SESSION['DSKHOHANG'] = $data_KHO;
$_SESSION["LISTTKTHANG"]=$dataCT ;
//debug($dataCT);



