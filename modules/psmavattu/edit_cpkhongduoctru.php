<?php
include("../../config.php");

$OBJ = new psmavattu();
$NhapXuat = $_GET['nhapxuat'];
$sott = $_GET['sott'];
$duyetcpduoctru = $_GET['duyetcpduoctru'];
$tiencpduocduyet = $_GET['tiencpduocduyet'];

if($NhapXuat==1){// Phiếu Nhập Xuất
    $OBJ->re_query("update psvt set duyetcpduoctru={$duyetcpduoctru},tiencpduocduyet=$tiencpduocduyet where sott='{$sott}'");
    //echo "update psvt set duyetcpduoctru={$duyetcpduoctru},tiencpduocduyet=$tiencpduocduyet where sott='{$sott}'";
}else if($NhapXuat==2){// Phiếu thu chi
    $OBJ->re_query("update chitiet_pskt set duyetcpduoctru={$duyetcpduoctru},tiencpduocduyet=$tiencpduocduyet where sott='{$sott}'");
    //echo "update chitiet_pskt set duyetcpduoctru={$duyetcpduoctru},tiencpduocduyet=$tiencpduocduyet where sott='{$sott}'";
}
?>