<?php
include("../../config.php");
$LoaiPhieu = $_GET['loaiphieu'];
$sohoadon = $_GET['sohoadon'];
$sophieu = $_GET['sophieu'];
$makh = $_GET['makh'];
$kyhieu = $_GET['kyhieu'];
$OBJ = new psmavattu();
$OBJ->setLP($LoaiPhieu);
$OBJ->setSCT($sohoadon);
$OBJ->setSoPhieu($sophieu);
$OBJ->setSeri($kyhieu);
$OBJ->setMaKH($makh);
$tontai = $OBJ->kiemTraTrungSoHoaDon_Xuat();
if ($tontai == FALSE) {
    echo "K";
} else {
    echo "Hóa đơn số ".$tontai['sct']." đã tồn tại ở phiếu ".$tontai['mapskt']." ngày ghi sổ ".$tontai['ngayghiso'] ." bạn có muốn tiếp tục ?";
}
?>