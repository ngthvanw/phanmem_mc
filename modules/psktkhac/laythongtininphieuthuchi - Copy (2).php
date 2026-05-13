<?php
include("../../config.php");
$OBJ = new pskt();
$sophieu = $_GET['sophieu'];
$loaiphieu = $_GET['loaiphieu'];
$OBJ->set_orderby(" sophieu ='".$sophieu."' ");
$data = $OBJ->loadListPSKT_W();
$data[0]['tenphieu'] = $_GET['tenphieu'];
$data[0]['ngayhd'] = dd_mm_yyy($_GET['ngayhd']);
$data[0]['ngaylap'] = dd_mm_yyy($_GET['ngaylap']);
$data_chitiet = $OBJ->loadListChiTietPSKT();

$dem=0;
$array_chitiet=array();
$i=0;
foreach ($data_chitiet as $Item_chitiet){// Cộng các tài khoản trùng nhau và xuất vào 1 màng

    $array_chitiet[$i] = $Item_chitiet;
    $array_chitiet[$i]['tkco'] = $data[0]['tkco'];
    $i++;

}
$data[0]['soluongct']=$dem;
$data[0]['chuthich']=$data_chitiet[0]['chuthich'];

$_SESSION['PhieuGhiSo'] = $data[0];
$_SESSION['ChiTietPhieuGhiSo'] = $array_chitiet;
