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
$dataTK = removeZeroSumArrays($dataTK);
foreach ($dataTK as $k => $itemTKTS) {
    $dataTKTS[][$k] = $itemTKTS;
}
$_SESSION['DSKHAUHAOTAISANTK'] = $dataTKTS;
function removeZeroSumArrays($array) {
    return array_filter($array, function($subArray) {
        $total = 0;
        array_walk_recursive($subArray, function($value) use (&$total) {
            $total += (is_numeric($value) ? $value : 0);
        });
        return $total !== 0; // Giữ lại mảng nếu tổng khác 0
    });
}