<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$mapsktsaochep = $_GET['mapsktsaochep'];
$sophieuhientai = $_GET['sophieuhientai'];
$loaiphieu = $_GET['loaiphieu'];
$loaiphieuhientai = $_GET['loaiphieuhientai'];

$sqlsophieusaochep = "select sophieu from psvt WHERE mapskt='{$mapsktsaochep}' and loaiphieu='{$loaiphieu}'";
$sophieusaochep = database::re_query($sqlsophieusaochep);
$datasophieusaochep = database::re_fetch($sophieusaochep);
$sophieusaochep = $datasophieusaochep['sophieu'];
if($sophieusaochep==0){
    echo "THÔNG BÁO \n\n KHÔNG TÌM THẤY CHỨNG TỪ CẦN SAO CHÉP.";
    return false;
}
  $sql_copy = "INSERT INTO chitiet_psvt (mapskt,mavt,tenvt,soluongnhap,donggianhap,thuesuat,thanhtien,thanhtienchuack,thue,sophieu,dvt,chietkhau,tienchietkhau,tenkd,dongiamt,thanhtienmt,thuenk,thuettdb,phivc,phibx,tygiant,nguyentent,thanhtiennt)
  SELECT mapskt,mavt,tenvt,soluongnhap,donggianhap,thuesuat,thanhtien,thanhtienchuack,thue,{$sophieuhientai} as sophieu,dvt,chietkhau,tienchietkhau,tenkd,dongiamt,thanhtienmt,thuenk,thuettdb,phivc,phibx,tygiant,nguyentent,thanhtiennt
  FROM chitiet_psvt WHERE sophieu = '{$sophieusaochep}'";
  database::re_query($sql_copy);
  if($loaiphieuhientai==3){
	  database::re_query("update chitiet_psvt set thue=0 where sophieu = '{$sophieuhientai}'");
  }
