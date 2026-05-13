<?php
include("../../config.php");
$LoaiPhieu = $_GET['loaiphieu'];
$sohoadon = $_GET['sohoadon'];
$sophieu = $_GET['sophieu'];
$makh = $_GET['makh'];
$kyhieu = $_GET['kyhieu'];
$OBJ = new pskt();
$OBJ->setLP($LoaiPhieu);
$OBJ->setSCT($sohoadon);
$OBJ->setSoPhieu($sophieu);
$OBJ->setMaKH($makh);
$OBJ->setSeri($kyhieu);
$tontai = $OBJ->kiemTraTrungSoHoaDon_Thu();
if ($tontai == FALSE) {
    echo "K";
} else {
    echo "Hóa đơn số ".$tontai['sct']." đã tồn tại ở phiếu ".$tontai['mapskt']." ngày ghi sổ ".$tontai['ngayghiso'] ." bạn có muốn tiếp tục ?";
}
?>