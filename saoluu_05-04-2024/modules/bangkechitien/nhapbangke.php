<?php
include("../../config.php");
$OBJ = new bangkechitien();

$mabangke = $OBJ->setMabangke($_GET['mabangke']);
$hotennguoichi = $OBJ->setHotennguoichi($_GET['hotennguoichi']);
$bophan = $OBJ->setBophan($_GET['bophan']);
$lydochi = $OBJ->setLydochi($_GET['lydochi']);
$ngaychi = $OBJ->setNgaychi($_GET['ngay']);
$check = $OBJ->checkBangKeChiTien();
if ($check == TRUE) {// Cập nhật phiếu nhập kho
    $OBJ->suaBangKe();
} else {// thêm phiếu nhập kho
    $OBJ->themBangKe();
}

?>