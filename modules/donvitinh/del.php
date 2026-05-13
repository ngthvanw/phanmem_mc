<?php
include("../../config.php");
session_start();
echo $string_ma = ($_GET['MaDVT']);  // Chu?i mã có d?u # trong chu?i
$Ma_arr = explode("#",$string_ma);
foreach($Ma_arr as $itemma){
    if($itemma!=NULL){
        $Ma_arr_daloc[]=$itemma;
    }
}
$donvitinh = new Donvitinh;
foreach($Ma_arr_daloc as $items){
    $donvitinh->set_MaDVT($items);
    $donvitinh->xoaDonViTinh();
}
?>