<?php
    include("../../config.php");
    $OBJ = new pskt();
    $OBJ->set_SoTT(check_data($_GET['sottpsct']));
    $OBJ->setSoPhieu(check_data($_GET['sophieu']));
    $OBJ->setTongCong(check_data($_GET['tongcong']));
    $SoLuong = $_GET['soluong'];

    if($SoLuong!=1){
        $OBJ->xoaChiTietPSKT();
        $OBJ->suaTongCong();
    }else{
        $OBJ->xoaChiTietPSKT();
        $OBJ->xoaPSKT();
    }
$sophieu = $_GET['sophieu'];
$loaiphieu = $_GET['loaiphieu'];
$tenphieu= "";
if($loaiphieu%2==0){
    if($loaiphieu==4){
        $tenphieu = "GHICO";
    }else{
        $tenphieu = "PHIEUCHI";
    }
}else{
    if($loaiphieu==3){
        $tenphieu = "GHINO";
    }else{
        $tenphieu = "PHIEUTHU";
    }
}
$nhatky = "Số phiếu:{$sophieu} - Loại Phiếu:{$loaiphieu} - Số TT:{$_GET['mapskt']} - TK:{$_GET['tkco']} - Tên TK:{$_GET['tentkco']} - Ngày ghi sổ:{$_GET['ngayghiso']} - Mã KH:{$_GET['makhachhang']} - TênKH:{$_GET['tenkhachhang']} - Địa chỉ:{$_GET['diachi']} - MST:{$_GET['masothue']}";
$nhatky.= " - Loại CT:{$_GET['loaict']} - Mẫu số:{$_GET['mauso']} - Ký hiệu:{$_GET['kyhieu']} - Số HĐ:{$_GET['sohoadon']} - Ngày HĐ:{$_GET['ngayhoadon']} - Loại SP:{$_GET['loaisp']} - Mã BP:{$_GET['mabophan']} - Loại CT:{$_GET['bophan']}";
$nhatky.= " - Mã nội dung 1:{$_GET['manoidung1']} - Nội dung 1:{$_GET['noidung1']} - TK1:{$_GET['tkno1']} - Số tiền 1:{$_GET['sotien1']} - Số tiền NT 1:{$_GET['sotiennt1']} - Mã nội dung 2:{$_GET['manoidung2']} - Nội dung 2:{$_GET['noidung2']} - TK2:{$_GET['tkno2']} - Số tiền 2:{$_GET['sotien2']} - Số tiền NT 2:{$_GET['sotiennt2']} - Ghi chú:{$_GET['ghichu']}";
$mahoa = md5(strtolower($nhatky));
$SQL_CHECK_NHATKY = "select count(*) as sodong from nhatkylamviec where dulieumahoa='".$mahoa."'";
$QUERY_NHATKY = database::re_query($SQL_CHECK_NHATKY);
$RES_NHATKY = database::re_fetch($QUERY_NHATKY);

if ($RES_NHATKY['sodong']<1){
    $sql_ins = "INSERT INTO nhatkylamviec(hanhdong,loaiphieu,dulieu,dulieukd,dulieumahoa,thoigianghi,nguoighi) VALUES ('XOÁ','{$tenphieu}','" . $nhatky . "','" . khu_dau_vn($nhatky) . "','" . $mahoa . "','" . date("Y-m-d H:i:s") . "','" . $_SESSION['User'] . "')";
    database::re_query($sql_ins);
}

?>