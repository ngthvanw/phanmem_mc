<?php
include("../../config.php");
$OBJ = new pskt;
$sott = $OBJ->createSoTT_CT();
$OBJ->set_SoTT($sott);
$OBJ->setMauSo(check_data($_GET['mauso']));
$OBJ->setSeri(check_data($_GET['seri']));
$OBJ->setSCT(khu_dau_vn(check_data($_GET['sct'])));
$OBJ->setNgay(check_data($_GET['date']));
$OBJ->setMaPSKT(check_data($_GET['mapskt']));
$OBJ->setMaND2(check_data($_GET['mand2']));
$OBJ->setGTVND2(check_data(str_replace(",", "",$_GET['gtvnd2'])));

$OBJ->setNgayHD(check_data($_GET['datehd']));

$OBJ->setNgayTT(check_data($_GET['datett']));
$OBJ->set_TenVT(check_data($_GET['tenvt']));
$OBJ->set_QuyCach(check_data( $_GET['quycach']));
$OBJ->setDiaChi(check_data($_GET['diachi']));
$OBJ->setNoiDung(check_data($_GET['noidung']));
$OBJ->set_DVT(check_data($_GET['dvt']));
$OBJ->set_DVTP(check_data( $_GET['dvtp']));
$OBJ->set_KL(check_data($_GET['kl']));
$OBJ->set_KT(check_data( $_GET['kt']));

$OBJ->setSL(check_data($_GET['sl']));
$OBJ->setDgVND(check_data(str_replace(",", "", $_GET['dgvnd'])));
$OBJ->setGTVND(check_data(str_replace(",", "", $_GET['gtvnd'])));
$OBJ->setSTVND(check_data(str_replace(",", "", $_GET['stvnd'])));
$OBJ->setSTUSD(check_data(str_replace(",", "", $_GET['stusd'])));
$OBJ->setPrepaid(check_data(($_GET['prepaid'])));
$OBJ->setDebt(check_data(($_GET['debt'])));
$OBJ->set_MaTK(check_data($_GET['matk']));
$OBJ->setMaTKNo(check_data($_GET['tkno']));
$OBJ->setMaTKCo(check_data($_GET['tkco']));
$OBJ->setMaND(check_data($_GET['mand']));
$OBJ->setMaKH(check_data($_GET['makh']));
$OBJ->setMaKHNo(check_data($_GET['makhno']));
$OBJ->setMaKHCo(check_data($_GET['makhco']));
$OBJ->setMaSoThue(check_data($_GET['masothue']));
$OBJ->setComment(check_data($_GET['comment']));
$OBJ->setAdd(check_data($_GET['add']));
$OBJ->setLP(check_data($_GET['lp']));
$OBJ->setRate(check_data($_GET['rate']));
$OBJ->setRate1(check_data($_GET['rate1']));
$OBJ->setVAT(check_data($_GET['vat']));
$OBJ->setTTDB(check_data($_GET['ttdb']));
$OBJ->setSoGiay(check_data($_GET['sogiay']));
$OBJ->setREF(check_data($_GET['ref']));
$OBJ->setKhac(check_data($_GET['khac']));
$OBJ->setOther(check_data($_GET['other']));
$OBJ->setTenKH(check_data($_GET['tenkh']));
$OBJ->setAddress(check_data($_GET['address']));
$OBJ->setLoaiCT(check_data($_GET['loaict']));
$OBJ->setMaLoai(check_data($_GET['maloai']));
$OBJ->setCLink(check_data($_GET['clink']));
$OBJ->set_Mark(check_data($_GET['mark']));
$OBJ->setTCTM(check_data($_GET['tctm']));


$OBJ->set_ChuThich(check_data($_GET['chuthich']));
$OBJ->themChiTietPSKT();
echo "{\"recId\": \"" . $sott . "\"}";
?>