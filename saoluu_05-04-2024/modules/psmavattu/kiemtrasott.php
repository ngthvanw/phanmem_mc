<?php
include("../../config.php");
$LoaiPhieu = $_GET['loaiphieu'];
$sophieu = $_GET['sophieu'];
$sottpsct = $_GET['sottpsct'];

$OBJ = new psmavattu();
$OBJ->setLP($LoaiPhieu);
$OBJ->setMaPSKT($sottpsct);
$OBJ->setSoPhieu($sophieu);

$tontai = $OBJ->kiemTraTrungSoTT();

if ($tontai == FALSE) {
    echo "K";
} else {
    echo "THÔNG BÁO !\nSỐ THỨ TỰ NÀY ĐÃ TỒN TẠI Ở PHIẾU KHÁC.\nVUI LÒNG CHỌN SỐ KHÁC ! ";
}
?>