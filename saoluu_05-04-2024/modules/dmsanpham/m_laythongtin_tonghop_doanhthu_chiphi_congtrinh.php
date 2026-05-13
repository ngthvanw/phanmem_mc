<?php
include("../../config.php");
unset($_SESSION["THONGTINPHIEUTONGHOPDTCPGTCT"]);
unset($_SESSION["THONGTINPHIEU"]);
$tungay = $_GET['tungay'];
$denngay = $_GET['denngay'];

$loaisanpham = $_GET['loaisanpham'];

$OBJMACT = new dmsanpham();
$OBJMACT->set_orderby(" loaisp = '".$loaisanpham."'");
$data = $OBJMACT->loadListThongTinBangTopHopDanhThuChiPhiGiaThanhCT();
$ngayhoadon = "Từ  " .dd_mm_yyy($tungay) ." đến " .dd_mm_yyy($denngay);
$_SESSION["THONGTINPHIEUTONGHOPDTCPGTCT"] = $data;
$_SESSION["THONGTINPHIEU"]['tenphieu'] = "BẢNG TỔNG HỢP GIÁ THÀNH";
$_SESSION["THONGTINPHIEU"]['ngaylap'] =date("d-m-Y");
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $ngayhoadon;





