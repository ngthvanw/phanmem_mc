<?php
include("../../config.php");
unset($_SESSION["THONGTINPHIEUTONGHOPDTCPGTCT"]);
unset($_SESSION["THONGTINPHIEU"]);
$tungay = $_GET['tungay'];
$denngay = $_GET['denngay'];

$loaisanpham = $_GET['loaisanpham'];

$OBJMACT = new dmsanpham();
$OBJMACT->set_orderby(" loaisp = '".$loaisanpham."'");
$data = $OBJMACT->loadListThongTinBangCPSXChungCongTrinh();
$_SESSION["THONGTINPHIEUTONGHOPDTCPGTCT"] = $data;
$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $_GET['ngayhoadon'];





