<?php
include("../../config.php");
$tungay = $_GET['tungay'];
$denngay = $_GET['denngay'];
$nhapxuatkho = $_GET['nhapxuatkho'];
$theonoidung = $_GET['theonoidung'];
$theokhachhang = $_GET['theokhachhang'];
$theotaikhoan = $_GET['theotaikhoan'];
$mavattu = $_GET['mavattu'];
$xemtatcahanghoa = $_GET['xemtatcahanghoa'];
$sapxephanghoa = $_GET['sapxephanghoa'];
$congdonhanghoa = $_GET['congdonhanghoa'];

$tenphieu =$_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];
$ngayhoadon =$_GET['ngayhoadon'];
$maspct =$_GET['maspct'];

$OBJ = new psmavattu();
$OBJKH = new makhachhang();
$OBJSPCT = new dmsanpham();

$OBJ->setTuNgay($tungay);

$OBJ->setDenNgay($denngay);

$string_spct = $OBJSPCT->loadMaKHALL_TraVeChuoiMaCTSP($maspct);
$string_spct = str_replace(",","','",substr($string_spct,0,-1));
$string_makh = $OBJKH->loadMaKHALL_TraVeChuoiMaKH($theokhachhang);
$string_makh_da_thaythe = str_replace(",", "','", substr($string_makh, 0, -1));

$sql_mkh="";
$sql_mvt="";
$sql_mand="";
$sql_matk="";

if($theotaikhoan==="ALL"){

}else{
    $sql_matk = " and  mavt.matk in ('" . $theotaikhoan . "') ";
}

if($theonoidung==="ALL"){

}else{
    $sql_mand = " and  mand in ('" . $theonoidung . "') ";
}

if($theokhachhang==="ALL"){

}else{
    $sql_mkh = " and  makh in ('" . $string_makh_da_thaythe . "') ";
}

if($xemtatcahanghoa==="false"){
    $sql_mvt= " and mavt.mavt in ('".str_replace(",","','",$mavattu)."') ";
}

$OBJ->set_orderby($sql_mvt.$sql_mand.$sql_matk);

if($congdonhanghoa=="1"){
    $data = $OBJ->LoadChiTietHangHoaVatTuLaiGop_ChiTiet_NhapKhoSX($tungay,$denngay,$sapxephanghoa,$string_spct);
}else{
    $data = $OBJ->LoadChiTietHangHoaVatTuLaiGop_ChiTiet_NhapKhoSX($tungay,$denngay,$sapxephanghoa,$string_spct);
}
//debug($data);
foreach ($data as $itemLaiGop){
    $value_laigop.="( '{$itemLaiGop[mapskt]}','{$itemLaiGop[mavt]}', '{$itemLaiGop[tenvt]}', '{$itemLaiGop[dvt]}', '{$itemLaiGop[soluongxuat]}', '{$itemLaiGop[thanhtienxuat]}', '{$itemLaiGop[giavon]}', '{$itemLaiGop[ngayhoadon]}', '{$itemLaiGop[ngayghiso]}', '{$itemLaiGop[makh]}', '{$itemLaiGop[tenkh]}', '{$itemLaiGop[sct]}', '{$itemLaiGop[seri]}', '{$itemLaiGop[giaban]}', '{$itemLaiGop[thanhtienvon]}', '{$itemLaiGop[kho]}','{$itemLaiGop[manhom]}','{$itemLaiGop[tenkhachhang]}','{$itemLaiGop[mact]}'),";
}
$insert_laigop="INSERT INTO `bangchitiet_laigop` (`maspkt`,`mavt`, `tenvt`, `dvt`, `soluongxuat`, `thanhtienxuat`, `giavon`, `ngayhoadon`, `ngayghiso`, `makh`, `tenkh`, `sct`, `seri`, `giaban`, `thanhtienvon`,`makho`,manhom,tenkhachhang,mact) VALUES ".substr($value_laigop,0,-1);
$OBJ->re_query("delete from bangchitiet_laigop");
$OBJ->re_query("ALTER TABLE bangchitiet_laigop AUTO_INCREMENT=1;");

$OBJ->re_query($insert_laigop);


