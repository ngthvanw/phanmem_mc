<?php
include("../../config.php");
$OBJ = new psmavattu();
$OBJ->setMaPSKT(check_data($_GET['STT']));
$OBJ->setSoPhieu(check_data($_GET['sophieu']));
$OBJ->setChietKhauDoanhSo(check_data(str_replace(",", "",$_GET['chietkhaudoanhso'])));

$sophieu = check_data($_GET['sophieu']);

$OBJ->setLP(check_data($_GET['loaiphieu']));
$OBJ->setLoaiSP(check_data($_GET['loaisp']));

$OBJ->setNgayGhiSo(check_data($_GET['ngayghiso']));
$OBJ->setMaLoai(check_data($_GET['loaict']));
$OBJ->setMauSo(check_data($_GET['mauso']));
$OBJ->setSeri(check_data(strtoupper($_GET['kyhieu'])));
$OBJ->setSCT(check_data($_GET['sohoadon']));
$OBJ->setNgayHD(check_data($_GET['ngayhoadon']));
$OBJ->setMaKH(check_data($_GET['makhachhang']));
$OBJ->setTenKH(addslashes($_GET['tenkhachhang']));
$OBJ->setDiaChi(addslashes($_GET['diachi']));
$OBJ->setMaSoThue(check_data($_GET['masothue']));
$OBJ->setMaND(check_data($_GET['manoidung']));
$OBJ->setTenND(check_data($_GET['noidung']));
$OBJ->setCoChungTuGoc(check_data($_GET['chungtugoc']));

$OBJ->setMaKho(check_data($_GET['makho']));

$OBJ->setTenKho(check_data($_GET['tenkho']));

$OBJ->setNhapVaoKho(check_data($_GET['NhapTuKho']));

$OBJ->setNgayTT(check_data($_GET['ngaythanhtoan']));
$OBJ->setCoThueGTGT(check_data($_GET['cothuegtgt']));

$OBJ->setCoBaoGomThue(check_data($_GET['baogomthue']));
$OBJ->setCoChietKhau(check_data($_GET['chietkhau']));

$OBJ->setChiPhiKhongLoaiTru(check_data($_GET['chiphikhongloaitru']));
$OBJ->setLoaiToKhai(check_data($_GET['loaitokhai']));

$OBJ->setMaSoBiMat(check_data($_GET['mabimat']));
$OBJ->setLoaiHDDT(check_data($_GET['loaihddt']));

$OBJ->setMaTKNo1(check_data($_GET['tkno1']));
$OBJ->setMaTKNo2(check_data($_GET['tkno2']));
$OBJ->setMaTKCo1(check_data($_GET['tkco1']));
$OBJ->setMaTKCo2(check_data($_GET['tkco2']));

$OBJ->setSoTien1(check_data($_GET['sotien1']));
$OBJ->setSoTien2(check_data($_GET['sotien2']));

$OBJ->setThanhTienMT(check_data(str_replace(",", "",$_GET['thanhtienmt'])));
$OBJ->setChiNhanhCongTy(check_data($_GET['chinhanh']));

$OBJ->setMaTKNo3(check_data($_GET['tkno3']));
$OBJ->setMaTKNo4(check_data($_GET['tkno4']));
$OBJ->setMaTKCo3(check_data($_GET['tkco3']));
$OBJ->setMaTKCo4(check_data($_GET['tkco4']));
$OBJ->setSoTien3(check_data($_GET['sotien3']));
$OBJ->setSoTien4(check_data($_GET['sotien4']));//
// khai bao tk nợ có

$tkno1=(check_data($_GET['tkno1']));
$tkno2=(check_data($_GET['tkno2']));
$tkco1=(check_data($_GET['tkco1']));
$tkco2=(check_data($_GET['tkco2']));
$sotien1=(check_data(str_replace(",", "",$_GET['sotien1'])));
$sotien2=(check_data(str_replace(",", "",$_GET['sotien2'])));
$tkno3=(check_data($_GET['tkno3']));
$tkno4=(check_data($_GET['tkno4']));
$tkco3=(check_data($_GET['tkco3']));
$tkco4=(check_data($_GET['tkco4']));
$sotien3=(check_data(str_replace(",", "",$_GET['sotien3'])));
$sotien4=(check_data(str_replace(",", "",$_GET['sotien4'])));

$sotiennt1=(check_data(str_replace(",", "",$_GET['sotiennt1'])));
$sotiennt2=(check_data(str_replace(",", "",$_GET['sotiennt2'])));
$sotiennt3=(check_data(str_replace(",", "",$_GET['sotiennt3'])));
$sotiennt4=(check_data(str_replace(",", "",$_GET['sotiennt4'])));

$array_dinhkhoan = array(
    array('tkno'=>$tkno1,'tkco'=>$tkco1,'sotien'=>$sotien1,'sotiennt'=>$sotiennt1),
    array('tkno'=>$tkno2,'tkco'=>$tkco2,'sotien'=>$sotien2,'sotiennt'=>$sotiennt2),
    array('tkno'=>$tkno3,'tkco'=>$tkco3,'sotien'=>$sotien3,'sotiennt'=>$sotiennt3),
    array('tkno'=>$tkno4,'tkco'=>$tkco4,'sotien'=>$sotien4,'sotiennt'=>$sotiennt4)
);

$OBJ->setTienHang(check_data(str_replace(",", "", $_GET['tienhang'])));
$OBJ->setTienThue(check_data(str_replace(",", "", $_GET['tienthue'])));
$OBJ->setTienChietKhau(check_data(str_replace(",", "", $_GET['tienchietkhau'])));
$OBJ->setTongCong(check_data(str_replace(",", "", $_GET['tongcong'])));
$OBJ->setTongTienNT(check_data(str_replace(",", "", $_GET['tongtiennt'])));


//$OBJ->set_SoTT(check_data($_GET['tongtien']));
$OBJ->set_ChuThich(check_data($_GET['ghichu']));
$OBJ->setDaThem(check_data($_GET['dathem']));

$OBJ->setCoNgayKhaiThue(check_data($_GET['congaykhaithue']));
$OBJ->setNgayKhaiThue(check_data($_GET['ngaykhaithue']));

$OBJ->setLoaiHangHoaDichVu(check_data($_GET['loaihanghoadichvu']));

$OBJ->setTenCaNhan(check_data($_GET['tencanhan']));
$OBJ->setLaCongTrinh(check_data($_GET['lacongtrinh']));
$OBJ->setDuAnDauTu(check_data($_GET['duandautu']));

database::re_query("ALTER TABLE `psvt` ADD `chietkhaudoanhso` BIGINT NOT NULL;");
database::re_query("ALTER TABLE `psvt` ADD `chiphikhongloaitru` INT NOT NULL;");
database::re_query("ALTER TABLE `psvt` ADD `loaitokhai` INT NOT NULL DEFAULT '1';");
database::re_query("ALTER TABLE `psvt` ADD `capnhat_chungtugoc` DATETIME NOT NULL;");
database::re_query("ALTER TABLE `psvt` ADD `capnhat_chiphikhongloaitru` DATETIME NOT NULL;");
database::re_query("ALTER TABLE `psvt` ADD `loaisp` CHAR(2) NOT NULL;");
database::re_query("ALTER TABLE `dinhkhoan_psvt` ADD `sotiennt` DOUBLE NOT NULL;");
database::re_query("ALTER TABLE `psvt` ADD `tongcongnt` DOUBLE NOT NULL;");
database::re_query("ALTER TABLE `psvt` ADD `loaihanghoadichvu` INT(1) NOT NULL DEFAULT '1';");
database::re_query("ALTER TABLE `psvt` ADD `chungtuthamchieu` CHAR(20) NOT NULL;");
database::re_query("ALTER TABLE `psvt` ADD `tencanhan` CHAR(200) NOT NULL;");
database::re_query("ALTER TABLE `psvt` ADD `lacongtrinh` INT(1) NOT NULL;");
database::re_query("ALTER TABLE `psvt` ADD `duandautu` INT(1) NOT NULL;");
database::re_query("ALTER TABLE `psvt` ADD `machinhanh` CHAR(14) NOT NULL, ADD INDEX `index_macn` (`machinhanh`);");
$OBJ->xoaDinhKhoanMaPSVT();
foreach ($array_dinhkhoan as $item){
    if($item['tkno']!=""){
        database::re_query("insert into dinhkhoan_psvt(sophieu,tkno,tkco,sotien,sotiennt) VALUE ('".$sophieu."','".$item['tkno']."','".$item['tkco']."','".$item['sotien']."','".$item['sotiennt']."')");
    }
}

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
$QUERY_NHATKY = database::re_query($SQL_CHECK_NHATKY);
$RES_NHATKY = database::re_fetch($QUERY_NHATKY);

$check = $OBJ->checkSoPhieuTonTai();
if ($check == TRUE) {// Cập nhật phiếu nhập kho
    $OBJ->suaPhieuNhapKho();
    if ($RES_NHATKY['sodong']<1 && $_GET['dathem']!=0 && $_GET['dathem']!=""){
        $sql_ins = "INSERT INTO nhatkylamviec(hanhdong,loaiphieu,dulieu,dulieukd,dulieumahoa,thoigianghi,nguoighi) VALUES ('SỬA','{$tenphieu}','" . $nhatky . "','" . khu_dau_vn($nhatky) . "','" . $mahoa . "','" . date("Y-m-d H:i:s") . "','" . $_SESSION['User'] . "')";
        database::re_query($sql_ins);
    }
} else {// thêm phiếu nhập kho
    $OBJ->themPhieuNhapKho();
}
if($_GET['chungtugoc']==0){
    database::re_query("update psvt set capnhat_chungtugoc = '".date("Y-m-d h:i:s")."' where sophieu='".$sophieu."'");
}
if($_GET['chiphikhongloaitru']==1){
    database::re_query("update psvt set capnhat_chiphikhongloaitru = '".date("Y-m-d h:i:s")."' where sophieu='".$sophieu."'");
}
?>