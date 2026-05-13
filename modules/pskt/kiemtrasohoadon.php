<?php
include("../../config.php");
$LoaiPhieu = $_GET['loaiphieu'];
$sohoadon = (int)$_GET['sohoadon'];
$sophieu = $_GET['sophieu'];
$makh = $_GET['makh'];
$kyhieu = $_GET['kyhieu'];
$OBJ = new pskt();
$OBJ->setLP($LoaiPhieu);
$OBJ->setSCT($sohoadon);
$OBJ->setSoPhieu($sophieu);
$OBJ->setMaKH($makh);
$OBJ->setSeri($kyhieu);
if($LoaiPhieu%2==1){
    $tontai = $OBJ->kiemTraTrungSoHoaDon_Thu();
}else{
    $tontai = $OBJ->kiemTraTrungSoHoaDon();
}
if ($tontai == FALSE) {
    echo "K";
} else {
    if($tontai['loaiphieu']==1){
        $phieu = "phiếu thu";
    }else if ($tontai['loaiphieu']==3){
        $phieu = "phiếu ghi nợ";
    }else if ($tontai['loaiphieu']==2){
        $phieu = "phiếu chi";
    }else if ($tontai['loaiphieu']==4){
        $phieu = "phiếu ghi có";
    }else if ($tontai['loaiphieu']==101){
        $phieu = "Phiếu nhập kho";
    }else if ($tontai['loaiphieu']==102){
        $phieu = "Phiếu xuất kho";
    }else{
		$phieu = "Phiếu ngân hàng";
	}
    echo "CẢNH BÁO ! \n\n Hóa đơn số ".$tontai['sct']." đã tồn tại ở phiếu ".$tontai['mapskt']." ngày ghi sổ ".date("d-m-Y",strtotime($tontai['ngayghiso'])) ." của {$phieu} .\n\n Bạn có muốn tiếp tục ?";
}
?>