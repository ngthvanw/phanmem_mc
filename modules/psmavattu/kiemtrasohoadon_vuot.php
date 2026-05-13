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
$OBJ->setMaTKCo($tk);

$tontai = $OBJ->kiemTraTrungSoHoaDon_Vuot();
    $sophieu="";
    $sohoadon_str="";
    $sotien=0;
$tongtientru = 0;
    foreach ($tontai as $item){
        $sophieu.=$item['mapskt'].",";
        $sohoadon_str.=$item['sct'].",";
        $sotien+=$item['tongcong'];
        //echo $item['mapskt'];
        if($sottpsct==trim($item['mapskt']) && $tk==1111){
            $tongtientru+= $item['tongcong'];
        }
    }
    $tamtinhtien = ($sotien+$tongtien)-$tongtientru;
    $ngayGioiHan = '2025-07-01'; // Ngày 01/07/2025 chuyển khoản trên 5tr
    if ($ngayhoadon >= $ngayGioiHan) {
        if($tamtinhtien>=5000000 && $tk==1111){
            if ($tontai == FALSE) {
                echo "CẢNH BÁO !\n\n Tổng tiền số phiếu này là ".number_format($tamtinhtien,0,",",".")." VNĐ đã vượt quá 5.000.000 VNĐ . Hoá đơn này sẽ bị XUẤT TOÁN kèm theo bị PHẠT .\n\n Bạn có muốn tiếp tục ?";
            } else {
                echo "CẢNH BÁO !\n\n Tổng tiền số phiếu " . substr($sophieu, 0, -1) . " của hóa đơn " . substr($sohoadon_str, 0, -1) . " là ".number_format($tamtinhtien,0,",",".")." VNĐ đã vượt quá 5.000.000 VNĐ . Hoá đơn này sẽ bị XUẤT TOÁN kèm theo bị PHẠT .\n\n Bạn có muốn tiếp tục ?";
            }
        }else{
            echo "K";
        }
    }else{
        if($tamtinhtien>=20000000 && $tk==1111){
            if ($tontai == FALSE) {
                echo "CẢNH BÁO !\n\n Tổng tiền số phiếu này là ".number_format($tamtinhtien,0,",",".")." VNĐ đã vượt quá 20.000.000 VNĐ . Hoá đơn này sẽ bị XUẤT TOÁN kèm theo bị PHẠT .\n\n Bạn có muốn tiếp tục ?";
            } else {
                echo "CẢNH BÁO !\n\n Tổng tiền số phiếu " . substr($sophieu, 0, -1) . " của hóa đơn " . substr($sohoadon_str, 0, -1) . " là ".number_format($tamtinhtien,0,",",".")." VNĐ đã vượt quá 20.000.000 VNĐ . Hoá đơn này sẽ bị XUẤT TOÁN kèm theo bị PHẠT .\n\n Bạn có muốn tiếp tục ?";
            }
        }else{
            echo "K";
        }
    }
?>