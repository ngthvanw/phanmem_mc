<?php
include("../../config.php");
$OBJCT = new baocaothue();
$thangtinhthue = $_GET['thangtinhthue'];
$namtinhthue = $_GET['namtinhthue'];
$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];
$loaitokhai= $_GET['loaitokhai'];
$data = $OBJCT->load_danhsach_tokhai_dautu($thangtinhthue."-".$namtinhthue, $loaitokhai);// thông tin tồn đầu kỳ
$_SESSION["THONGTINPHIEU"]['thangtk'] = "Từ  " .dd_mm_yyy($tungay) ." đến " .dd_mm_yyy($denngay);

//$OBJCT->loadListDanhSachTKChiTiet();
$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $_GET['ngayhoadon'];
unset($_SESSION["TOKHAITHUE"]);
$_SESSION["TOKHAITHUE"] = $data;




