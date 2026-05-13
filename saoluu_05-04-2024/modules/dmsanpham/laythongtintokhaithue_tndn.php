<?php
include("../../config.php");
unset($_SESSION["THONGTINPHIEUTKTNCN"]);
unset($_SESSION["LISTTOKHAITNDN"]);

$OBJDMSP = new dmsanpham();

$dataCT = $OBJDMSP->ListToKhaiQuyetToanThueTNCN();

$_SESSION["THONGTINPHIEUTKTNCN"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEUTKTNCN"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEUTKTNCN"]['ngayhoadon'] = $_GET['ngayhoadon'];
$_SESSION["THONGTINPHIEUTKTNCN"]['tuthang'] = "1/".$_SESSION['NienDo'];
$_SESSION["THONGTINPHIEUTKTNCN"]['denthang'] = "12/".$_SESSION['NienDo'];
$_SESSION["THONGTINPHIEUTKTNCN"]['nam'] = $_SESSION['NienDo'];

$_SESSION["LISTTOKHAITNDN"] = $dataCT;

//debug($dataCT);




