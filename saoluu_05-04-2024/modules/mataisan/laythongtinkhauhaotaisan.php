<?php
include("../../config.php");
unset($_SESSION['DSKHAUHAOTAISAN']);
$OBJ = new mataisan();
$tuthang = $_GET['tuthang'];
$denthang = $_GET['denthang'];
$tenphieu = $_GET['tenphieu'];
$ngaylap = $_GET['ngaylap'];
$ngayhoadon = $_GET['ngayhd'];
$tonghopcanam = $_GET['tonghopcanam'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $ngaylap;
$_SESSION["THONGTINPHIEU"]['tenphieu'] = $tenphieu;
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $ngayhoadon;
if ($tonghopcanam == "true") {
    $data = $OBJ->loadListKhauHaoTaiSan_CaNam(1, 12);
} else {
    $data = $OBJ->loadListKhauHaoTaiSan($denthang);
}

$_SESSION['DSKHAUHAOTAISAN'] = $data;
$dataTS = 0;
$i = 0;
foreach ($data as $itemTS) {
    $dataTK[$itemTS['tkno']][$itemTS['mats']] = $itemTS['tienno'];
    $i++;
}
foreach ($dataTK as $k => $itemTKTS) {
    $dataTKTS[][$k] = $itemTKTS;
}
//debug($data);
$_SESSION['DSKHAUHAOTAISANTK'] = $dataTKTS;
