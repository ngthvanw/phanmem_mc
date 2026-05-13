<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$thang = $_GET['thang'];
$sophieuhientai = $_GET['sophieuhientai'];
$OBJ->re_query("DELETE FROM chitiet_psvt WHERE sophieu='".$sophieuhientai."'");
$sql_copy = "insert into chitiet_psvt (mavt,tenvt,dvt,soluongnhap,thuesuat,sophieu) 
            select mavt.mavt,mavt.tenvt,mavt.dvt,".$thang." as soluong,rate,{$sophieuhientai} 
            from soluonghanghoaxuatkhau inner join  mavt on (soluonghanghoaxuatkhau.masp = mavt.mavt) where $thang >0";
$OBJ->re_query($sql_copy);
