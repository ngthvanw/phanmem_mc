<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$sotienchietkhau = $_GET['sotienchietkhau'];
$sophieuhientai = $_GET['sophieuhientai'];
$loaiphieu = $_GET['loaiphieu'];

$sqltongtien = "select sum(thanhtienchuack) tongthanhtien from chitiet_psvt WHERE sophieu='{$sophieuhientai}'";
$restongtien = $OBJ->re_query($sqltongtien);
$datatongtien = $OBJ->re_fetch($restongtien);

$TongTien = $datatongtien['tongthanhtien'];
$tylephanbo = ($sotienchietkhau/$TongTien);
$sql_update = "update chitiet_psvt set thanhtien=thanhtienchuack-(ROUND(thanhtienchuack*{$tylephanbo})),tienchietkhau=(ROUND(thanhtienchuack*{$tylephanbo})),thue=ROUND((thanhtienchuack-(ROUND(thanhtienchuack*{$tylephanbo})))*(thuesuat/100)) WHERE sophieu='{$sophieuhientai}'";
$OBJ->re_query($sql_update);
