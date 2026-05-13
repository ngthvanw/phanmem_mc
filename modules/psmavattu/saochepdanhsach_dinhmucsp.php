<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$MaSP = $_GET['MaSP'];
$sophieuhientai = $_GET['sophieuhientai'];
$SLDuTru = $_GET['SLDuTru'];

$sqlsophieusaochep = "select count(*) as sophieu from chitiet_dinhmuc_sp WHERE masp='{$MaSP}'";
$sophieusaochep = $OBJ->re_query($sqlsophieusaochep);
$datasophieusaochep = $OBJ->re_fetch($sophieusaochep);
$sophieusaochep = $datasophieusaochep['sophieu'];
if($sophieusaochep==0){
    echo "THÔNG BÁO \n\n KHÔNG TÌM THẤY MÃ SẢN PHẨM CẦN SAO CHÉP.";
    return false;
}
  $sql_copy = "insert into chitiet_psvt (mavt,tenvt,dvt,soluongnhap,thuesuat,sophieu) 
                select mavt.mavt,mavt.tenvt,mavt.dvt,ROUND((dinhmuckecakhauhao*{$SLDuTru}),5) as soluong,rate,{$sophieuhientai} 
                from chitiet_dinhmuc_sp inner join  mavt on (chitiet_dinhmuc_sp.mavt = mavt.mavt)where masp='".$MaSP."' and mavt.loaivl='' ";
  $OBJ->re_query($sql_copy);
