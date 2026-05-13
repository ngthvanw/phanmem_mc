<?php
include("../../config.php");
$OBJ = new pskt();
$sophieu = $_GET['sophieu'];
$loaiphieu = $_GET['loaiphieu'];

$postuphieu = strpos($_GET['tuphieu'],"-");
if($postuphieu==""){
    $tuphieu = $_GET['tuphieu'];
}else{
    $tuphieu = str_replace("-","",substr($_GET['tuphieu'],$postuphieu));
}
$posdenphieu = strpos($_GET['denphieu'],"-");
if($posdenphieu==""){
    $denphieu = $_GET['denphieu'];
}else{
    $denphieu = str_replace("-","",substr($_GET['denphieu'],$posdenphieu));
}

$OBJ->set_orderby(" loaiphieu ='".$loaiphieu."' and  CAST(SUBSTRING_INDEX(mapskt, '-', -1) as UNSIGNED)>='".$tuphieu."' and CAST(SUBSTRING_INDEX(mapskt, '-', -1)as UNSIGNED)<='".$denphieu."' ");
$data = $OBJ->loadListPSKT_W_IN();
foreach ($data as $itemPh){
    $strsophieu.="'".$itemPh['sophieu']."',";
}
$data_chitiet = $OBJ->loadListChiTietPSKT_IN(substr($strsophieu,0,-1));

$dem=0;
$array_tkno=array();
foreach ($data_chitiet as $k=>$Item_chitiet0){// Cộng các tài khoản trùng nhau và xuất vào 1 màng
    $dem=0;
    foreach ($Item_chitiet0 as $k1=>$Item_chitiet){// Cộng các tài khoản trùng nhau và xuất vào 1 màng

        $Item_chitiet['tkco'] = $data[$k]['tkco'];
        $array_tkno[$k][] = $Item_chitiet;
        $dem++;

    }
    $data[$k]['soluongct']=$dem;
    $data[$k]['tenphieu'] = $_GET['tenphieu'];
    $data[$k]['ngayhd'] = dd_mm_yyy($_GET['ngayhd']);
    $data[$k]['ngaylap'] = dd_mm_yyy($_GET['ngaylap']);
}

$_SESSION['PhieuGhiSo'] = $data;
$_SESSION['ChiTietPhieuGhiSo'] = $array_tkno;