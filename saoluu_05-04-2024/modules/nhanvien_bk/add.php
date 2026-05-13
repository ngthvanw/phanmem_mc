<?php
session_start();
   include("../../config.php");
   $DIR = "../../uploads/nhanvien/";
    $nhanvien = new Nhanvien;
//if(isset($_GET['Add'])){ // this is for adding records
    $MaNhanVien     =   $nhanvien->set_MaNhanVien(check_data($_GET['MaNhanVien']));
    $HoNhanVien     =   $nhanvien->set_HoNhanVien(check_data($_GET['HoNhanVien']));
    $HoNhanVien    =   $nhanvien->set_TenNhanVien(check_data($_GET['TenNhanVien']));
    $NgaySinh       =   $nhanvien->set_NgaySinh(check_data($_GET['NgaySinh']));
    $HinhAnh        =   $nhanvien->set_HinhAnh(check_data($_GET['HinhAnh']));
    $Email          =   $nhanvien->set_Email(check_data($_GET['Email']));
    $TenDangNhap    =   $nhanvien->set_TenDangNhap(check_data($_GET['TenDangNhap']));
    $MatKhau        =   $nhanvien->set_MatKhau(check_data($_GET['Password']));
    $NgayNhap       =   $nhanvien->set_NgayNhap(date('d/m/Y - H:i:s'));
    $nhanvien->themNhanvien();
    //}
?>