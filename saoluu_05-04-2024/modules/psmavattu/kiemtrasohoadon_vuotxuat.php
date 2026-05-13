<?php
include("../../config.php");
$LoaiPhieu = $_GET['loaiphieu'];
$sottpsct = $_GET['sottpsct'];
$makh = $_GET['makh'];
$ngayhoadon = $_GET['ngayhoadon'];
$sohoadon = $_GET['sohoadon'];
$kyhieu = $_GET['kyhieu'];
$tk = $_GET['tk'];
$tongtien = str_replace(",","",$_GET['tongtien']);
$OBJ = new psmavattu();
$OBJ->setLP($LoaiPhieu);
$OBJ->setMaKH($makh);
$OBJ->setNgayHD($ngayhoadon);
$OBJ->setMaTKNo($tk);

$tontai = $OBJ->kiemTraTrungSoHoaDon_VuotXuat();
    $sophieu="";
    $sohoadon_str="";
    $sotien=0;
$tongtientru = 0;
    foreach ($tontai as $item){
        $sophieu.=$item['mapskt'].",";
        $sohoadon_str.=$item['sct'].",";
        $sotien+=$item['tongcong'];
        if($sottpsct==trim($item['mapskt']) && $tk==1111){
            $tongtientru+= $item['tongcong'];
        }
    }
$tamtinhtien = ($sotien+$tongtien)-$tongtientru;
    if($tamtinhtien>=20000000 && $tk==1111){
        if ($tontai == FALSE) {
            echo "Tổng tiền số phiếu này đã vượt quá 20.000.000 VNĐ . Bạn có muốn tiếp tục ?";
        } else {
            echo "Tổng tiền số phiếu " . substr($sophieu, 0, -1) . " của hóa đơn " . substr($sohoadon_str, 0, -1) . " đã vượt quá 20.000.000 VNĐ. Vui lÒNG kiểm tra lại [HÌNH THỨC THANH TOÁN] của phiều này. Nếu chính xác bạn có có thể tiếp tục ?";
        }
    }else{
        echo "K";
    }

?>