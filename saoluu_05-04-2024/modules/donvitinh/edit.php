<?php
session_start();
   include("../../config.php");
  // $DIR = "../../uploads/nhanvien/";
    $donvitinh = new Donvitinh;
//if(isset($_GET['Add])){ // this is for adding records
    $donvitinh->set_MaDVT(check_data($_GET['MaDVT']));
    $donvitinh->set_TenDVT(check_data($_GET['TenDVT']));
    $donvitinh->set_GhiChu(check_data($_GET['GhiChu']));
    $donvitinh->suaDonViTinh();
    //}
?>