<?php
include("../../config.php");
$OBJCT = new ketoantonghop();
unset($_SESSION["LISTCTBANGCDTRONGKY"]);
unset($_SESSION["LISTCTBANGCDDAUKY"]);
unset($_SESSION["LISTCTBANGKQKD"]);
unset($_SESSION["dataBCDTK"]);
$dataBANGCDTK = $OBJCT->load_danhsach_bangcd_tk_tmp();
$dataBANGCDTKDK = $OBJCT->load_danhsach_bangcd_tk_tmp_dk();
$dataBCDKT = $OBJCT->load_danhsach_bangcd_ketoan_dacodulieu();
$dataLuuChuyenTienTe = $OBJCT->load_danhsach_bangluuchuyen_tiente_dacodulieu();

$dataDanhSachXDKQKD = $OBJCT->load_danhsach_bangxdkqkd_dacodulieu("V");// lấy số đầu kỳ trong bản cdtk

//debug($dataBANGCDTK);
//debug($dataDanhSachXDKQKD);
//// Lấy danh sách giá thành
//$tungay = $_GET['tungay'];
//$denngay = $_GET['denngay'];

//$sql_mabp = " and mabp!=''";
//$sql_mabp1 = " and makho!=''";
//$theonoidung = "ALL";

//$str_w2=" and ngayghiso >='".$tungay."' and ngayghiso<='".$denngay."'  ".$sql_mabp1;
//$OBJCT->setStrOderby2($str_w2);
//$str_w=" and ngayghiso >='".$tungay."' and ngayghiso<= '".$denngay."'  ".$sql_mabp;
//$OBJCT->setStrOderby($str_w);

////lấy thông tin giá vốn hàng đã bán
//$matk = "632";
//$dataGiaVonHangDaBan = $OBJCT->load_danhsach_no_co_giavonhanghoa($matk,$theonoidung,"1561','1562");// lấy tất cả thu chi

////lấy thông tin giá vốn hàng đã bán
//$matk = "632";
//$dataGiaVonTPDaBan = $OBJCT->load_danhsach_no_co_giavonhanghoa($matk,$theonoidung,"155");// lấy tất cả thu chi


////lấy thông tin giá vốn hàng đã bán
//$matk = "632";
//$dataGiaVonCuaDichVuDaCungCap = $OBJCT->load_danhsach_no_co_giavonhanghoa($matk,$theonoidung,"154");// lấy tất cả thu chi

$_SESSION["LISTCTBANGCDTRONGKY"] = $dataBANGCDTK;
$_SESSION["LISTCTBANGCDDAUKY"] = $dataBANGCDTKDK;
$_SESSION["LISTCTBANGKQKD"] = $dataDanhSachXDKQKD;
$_SESSION["dataBCDKT"] = $dataBCDKT;
$_SESSION["dataLUUCHUYENTIENTE"] = $dataLuuChuyenTienTe;

