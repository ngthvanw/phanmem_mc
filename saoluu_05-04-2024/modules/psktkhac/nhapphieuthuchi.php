<?php
include("../../config.php");

$OBJ = new pskt;
$sott = $OBJ->createSoTT();
$OBJ->set_SoTT($sott);
debug($_GET);
// PSKT
$OBJ->setMaPSKT(check_data($_GET['mapskt']));
$OBJ->setMaKH(check_data($_GET['makhachhang']));//
$OBJ->setTenKH(check_data($_GET['tenkhachhang']));//
$OBJ->setDiaChi(check_data($_GET['diachi']));//
$OBJ->setMaSoThue(check_data($_GET['masothue']));//
$OBJ->setNgay(check_data($_GET['ngayghiso']));//
$OBJ->setMaTKCo(check_data($_GET['tkco']));//
$OBJ->setTenTKCo(check_data($_GET['tentkco']));//
$OBJ->setLP(check_data($_GET['loaiphieu']));///
$OBJ->setTongCong(str_replace(",", "", $_GET['tongcong']));
//End PSKT


$OBJ->setMauSo(check_data($_GET['mauso']));
$OBJ->setSeri(check_data($_GET['kyhieu']));//
$OBJ->setSCT(khu_dau_vn(check_data($_GET['sohoadon'])));//
$OBJ->setNgayHD(check_data($_GET['ngayhoadon']));//
$OBJ->setNgayTT(check_data($_GET['hanthanhtoan']));

$OBJ->setMaKHNo(check_data($_GET['makhachhang2']));
$OBJ->setTenKH2(check_data($_GET['tenkhachhang2']));
$OBJ->setDiaChi2(check_data($_GET['diachi2']));

$OBJ->setMaKH3(check_data($_GET['makhachhang3']));
$OBJ->setTenKH3(check_data($_GET['tenkhachhang3']));


$OBJ->setMaBP(check_data($_GET['mabophan']));
$OBJ->setTenBP(check_data($_GET['bophan']));

$OBJ->setMaND(check_data($_GET['manoidung1']));
$OBJ->setTenND(check_data($_GET['noidung1']));
$OBJ->setMaTKNo1(check_data($_GET['tkno1']));
$OBJ->setGTVND1(check_data(str_replace(",", "",$_GET['sotien1'])));

$OBJ->setMaND2(check_data($_GET['manoidung2']));
$OBJ->setTenND2(check_data($_GET['noidung2']));
$OBJ->setMaTKNo2(check_data($_GET['tkno2']));

$OBJ->setSoPhieu(check_data($_GET['sophieu']));
$OBJ->setCoThueGTGT(check_data($_GET['cothuegtgt']));

$OBJ->setGTVND2(check_data(str_replace(",", "",$_GET['sotien2'])));


$OBJ->setMaLoai(check_data($_GET['loaict']));

$OBJ->setTongTien(check_data(str_replace(",", "",$_GET['tongtien'])));

$OBJ->set_ChuThich(check_data($_GET['ghichu']));
$sottpsct = $_GET['sottpsct'];
$OBJ->setSottpsct($sottpsct);

$TonTai = $OBJ->checkKeyTrung();
if($TonTai==TRUE){
    $OBJ->suaPSKT();
    if($sottpsct=="")
        $OBJ->themChiTietPSKT();
    else
        $OBJ->suaChiTietPSKT();

}else{

    $OBJ->themPSKT();
    $OBJ->themChiTietPSKT();
}
?>