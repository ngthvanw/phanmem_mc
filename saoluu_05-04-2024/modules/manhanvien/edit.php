<?php
include("../../config.php");
$OBJ = new manhanvien;
$OBJ->setBacTho(check_data($_GET['bactho']));
$OBJ->set_SoTT(check_data($_GET['sott']));
$OBJ->set_MaNV(check_data($_GET['manhanvien']));
$OBJ->set_TenNV(check_data($_GET['tennv']));
$OBJ->set_TenKD(check_data(khu_dau_vn($_GET['tennv'])));
$OBJ->set_SoCMND(check_data($_GET['socmnd']));
$OBJ->setChucDanh(check_data($_GET['chucdanh']));
$OBJ->setTrinhDo(check_data($_GET['trinhdo']));
$OBJ->set_LuongCB(check_data(str_replace(",", "", $_GET['luongcb'])));
$OBJ->set_DiaChi(check_data($_GET['diachi']));
$OBJ->set_DienThoai(check_data($_GET['dienthoai']));
$OBJ->set_GioiTinh(check_data($_GET['gioitinh']));
$OBJ->set_NamSinh(check_data($_GET['namsinh']));
$OBJ->set_ChuThich(check_data($_GET['ghichu']));
$OBJ->setMaSoThue(check_data($_GET['masothue']));
$OBJ->set_MaBP(check_data($_GET['mabp']));
$OBJ->setNgayBDHopDong(check_data($_GET['ngaybdhopdong']));
$OBJ->setNgayKTHopDong(check_data($_GET['ngaykthopdong']));

$OBJ->setPhanTramThang(check_data($_GET['phantramthang']));

$OBJ->setPhanTramQuy(check_data($_GET['phantramquy']));
$OBJ->setPhanTramNam(check_data($_GET['phantramnam']));
$OBJ->setTinhLuong(check_data($_GET['tinhluong']));

$OBJ->setPhuCapChucVu(check_data($_GET['phucapchucvu']));

$OBJ->setPhiCongDoan(check_data($_GET['phicongdoan']));
$OBJ->setBaoHiem(check_data($_GET['baohiem']));
$OBJ->setBaoHiemYT(check_data($_GET['baohiemyt']));
$OBJ->setBaoHiemTN(check_data($_GET['baohiemtn']));

$OBJ->setKinhPhiCongDoan(check_data($_GET['kinhphicongdoan']));
$OBJ->setDNBaoHiemXH(check_data($_GET['dn_baohiem']));
$OBJ->setDNBaoHiemYT(check_data($_GET['dn_baohiemyt']));
$OBJ->setDNBaoHiemTN(check_data($_GET['dn_baohiemtn']));

$OBJ->setTienAnGiuaCa(check_data($_GET['tienangiuaca']));
$OBJ->setPhuCapKhongDongBHXH(check_data($_GET['phucapkhongdungbhxh']));
$OBJ->setThueThuNhap(check_data($_GET['thuethunhap']));
$OBJ->setMaTK1(check_data($_GET['matk1']));
$OBJ->setPhanTramTK(check_data($_GET['phantramtk']));
$OBJ->setMaTK2(check_data($_GET['matk2']));
$OBJ->setLoaiBP(check_data($_GET['loaibp']));
$OBJ->setSapXep(check_data($_GET['sapxep']));
$OBJ->setGiamTruGiaCanh(check_data($_GET['giamtrugiacanh']));

$OBJ->suaMaNV();
echo "{\"result\": \"success\"}";
?>