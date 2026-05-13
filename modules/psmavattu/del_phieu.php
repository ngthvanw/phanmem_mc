<?php
    include("../../config.php");
    $OBJ = new psmavattu();
    $OBJ->setSoPhieu(check_data($_GET['sophieu']));

    $OBJ->xoaPhieuNhapKho();
    $OBJ->xoaCTPhieuNhapKho();
    $OBJ->xoaDKPhieuNhapKho();

$sophieu = $_GET['sophieu'];
$loaiphieu = $_GET['loaiphieu'];
$tenphieu= "";
if($loaiphieu==1){
    $tenphieu = "NHAP";
}else if($loaiphieu==2){
    $tenphieu = "XUATBAN";
}else if($loaiphieu==3) {
    $tenphieu = "XUATSX";
}
$nhatky = "Số phiếu:{$sophieu} - Loại Phiếu:{$loaiphieu} - Số TT:{$_GET['STT']} - Ngày ghi sổ:{$_GET['ngayghiso']} - Mã KH:{$_GET['makhachhang']} - TênKH:{$_GET['tenkhachhang']} - Địa chỉ:{$_GET['diachi']} - MST:{$_GET['masothue']}";
$nhatky.= " - Loại CT:{$_GET['loaict']} - Mẫu số:{$_GET['mauso']} - Ký hiệu:{$_GET['kyhieu']} - Số HĐ:{$_GET['sohoadon']} - Ngày HĐ:{$_GET['ngayhoadon']} - Loại SP:{$_GET['loaisp']} - Mã BP:{$_GET['makho']} - Loại CT:{$_GET['tenkho']} - Mã nội dung :{$_GET['manoidung']} - Nội dung :{$_GET['noidung']} - Kho Hàng :{$_GET['NhapTuKho']}";
$nhatky.= "  - TK Nợ 1:{$_GET['tkno1']} - TK Có 1:{$_GET['tkco1']} - Số tiền 1:{$_GET['sotien1']} - Số tiền NT 1:{$_GET['sotiennt1']} - TK Nợ 2:{$_GET['tkno2']} - TK Có 2:{$_GET['tkco2']} - Số tiền 2:{$_GET['sotien2']} - Số tiền NT 2:{$_GET['sotiennt2']} - TK Nợ 3:{$_GET['tkno3']} - TK Có 3:{$_GET['tkco3']} - Số tiền 3:{$_GET['sotien3']} - Số tiền NT 3:{$_GET['sotiennt3']} - Ghi chú:{$_GET['ghichu']}";
$mahoa = md5(strtolower($nhatky));
$SQL_CHECK_NHATKY = "select count(*) as sodong from nhatkylamviec where dulieumahoa='".$mahoa."'";
$QUERY_NHATKY = $OBJ->re_query($SQL_CHECK_NHATKY);
$RES_NHATKY = $OBJ->re_fetch($QUERY_NHATKY);
if ($RES_NHATKY['sodong']<1){
    $sql_ins = "INSERT INTO nhatkylamviec(hanhdong,loaiphieu,dulieu,dulieukd,dulieumahoa,thoigianghi,nguoighi) VALUES ('XOÁ','{$tenphieu}','" . $nhatky . "','" . khu_dau_vn($nhatky) . "','" . $mahoa . "','" . date("Y-m-d H:i:s") . "','" . $_SESSION['User'] . "')";
    $OBJ->re_query($sql_ins);
}
?>