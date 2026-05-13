<?php
include("../../config.php");
 //error_reporting(E_ALL);
unset($_SESSION['LISTBUTTOAN_PHATSINH']);
$OBJCT = new baocaothue();
$data = $OBJCT->load_danhsach_buttoan_phatsinh();
$_SESSION["THONGTINPHIEUBTPS"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEUBTPS"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEUBTPS"]['ngayhoadon'] = $_GET['ngayhoadon'];
$_SESSION['LISTBUTTOAN_PHATSINH'] = $data;
//debug($_SESSION["LISTCTBANRA"]);


