<?php
include("../../config.php");
session_start();
$string_manv = ($_GET['MaNhanVien']);  // chu?i MaNV có d?u , trong chu?i
$manv_arr = explode("#",$string_manv);
foreach($manv_arr as $itemmanv){
    if($itemmanv!=NULL){
        $manv_arr_daloc[]=$itemmanv;
    }
}
$nhanvien = new Nhanvien;
foreach($manv_arr_daloc as $items){
    $nhanvien->set_MaNhanVien($items);
    $nhanvien->xoaNhanvien();
}
?>