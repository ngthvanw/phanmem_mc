<?php
include("../../config.php");
$OBJ = new pskt;
$sott = $OBJ->createSoTT();
$OBJ->set_SoTT($sott);
// PSKT
$OBJ->setMaPSKT(check_data($_GET['mapskt']));
$OBJ->setLoaiSP(check_data($_GET['loaisp']));
$OBJ->setMaKH(check_data($_GET['makhachhang']));//
$OBJ->setTenKH(addslashes($_GET['tenkhachhang']));//
$OBJ->setDiaChi(addslashes($_GET['diachi']));//
$OBJ->setMaSoThue(check_data($_GET['masothue']));//
$OBJ->setNgay(check_data($_GET['ngayghiso']));//
$OBJ->setMaTKCo(check_data($_GET['tkco']));//
$OBJ->setTenTKCo(check_data($_GET['tentkco']));//
$OBJ->setLP(check_data($_GET['loaiphieu']));///

$OBJ->setMaSoBiMat(check_data($_GET['mabimat']));///
$OBJ->setLoaiHDDT(check_data($_GET['loaihddt']));///
$OBJ->setChiNhanhCongTy(check_data($_GET['chinhanh']));///

$OBJ->setTongCong(str_replace(",", "", $_GET['tongcong']));

$OBJ->setSoTienNT1(str_replace(",", "", $_GET['sotiennt1']));
$OBJ->setSoTienNT2(str_replace(",", "", $_GET['sotiennt2']));
$OBJ->setTongTienNT(str_replace(",", "", $_GET['tongtiennt']));
$OBJ->setTongCongNT(str_replace(",", "", $_GET['tongcongnt']));
$OBJ->setTyGia(str_replace(",", "", $_GET['tygia']));
$OBJ->setChungTuThamChieu(check_data($_GET['chungtuthamchieu']));
//End PSKT

$mauso =$_GET['mauso'];

$OBJ->setMauSo(check_data($mauso));
$OBJ->setSeri(check_data(strtoupper($_GET['kyhieu'])));//
$OBJ->setSCT(khu_dau_vn(check_data($_GET['sohoadon'])));//
$OBJ->setNgayHD(check_data($_GET['ngayhoadon']));//
$OBJ->setNgayTT(check_data($_GET['hanthanhtoan']));

$OBJ->setMaKHNo(check_data($_GET['makhachhang2']));
$OBJ->setTenKH2(addslashes($_GET['tenkhachhang2']));
$OBJ->setMaSoThue2(addslashes($_GET['masothue2']));
$OBJ->setDiaChi2(addslashes($_GET['diachi2']));

$OBJ->setMaKH3(check_data($_GET['makhachhang3']));
$OBJ->setTenKH3(addslashes($_GET['tenkhachhang3']));

$OBJ->setThueSuat1(check_data($_GET['thuesuat1']));

$OBJ->setMaBP(check_data($_GET['mabophan']));
$OBJ->setTenBP(check_data($_GET['bophan']));

$OBJ->setMaND(check_data($_GET['manoidung1']));
$OBJ->setTenND(check_data($_GET['noidung1']));
$OBJ->setMaTKNo1(check_data($_GET['tkno1']));
$OBJ->setGTVND1(check_data(str_replace(",", "",$_GET['sotien1'])));

$OBJ->setMaND2(check_data($_GET['manoidung2']));
$OBJ->setTenND2(check_data($_GET['noidung2']));
$OBJ->setMaTKNo2(check_data($_GET['tkno2']));
$sophieu = $_GET['sophieu'];
$OBJ->setSoPhieu(check_data($_GET['sophieu']));
$OBJ->setCoThueGTGT(check_data($_GET['cothuegtgt']));
$OBJ->setCoBaoGomThue(check_data($_GET['baogomthue']));
$OBJ->setChiPhiKhongLoaiTru(check_data($_GET['chiphikhongloaitru']));
$OBJ->setCoChungTuGoc(check_data($_GET['chungtugoc']));

$OBJ->setGTVND2(check_data(str_replace(",", "",$_GET['sotien2'])));


$OBJ->setMaLoai(check_data($_GET['loaict']));

$OBJ->setTongTien(check_data(str_replace(",", "",$_GET['tongtien'])));

$OBJ->set_ChuThich(check_data($_GET['ghichu']));
$OBJ->setDaThem(check_data($_GET['dathem']));
$OBJ->setLoaiToKhai(check_data($_GET['loaitokhai']));
$OBJ->setCoNgayKhaiThue(check_data($_GET['congaykhaithue']));
$OBJ->setNgayKhaiThue(check_data($_GET['ngaykhaithue']));
$OBJ->setLoaiHangHoaDichVu(check_data($_GET['loaihanghoadichvu']));

$OBJ->setTenCaNhan(check_data($_GET['tencanhan']));
$OBJ->setLaCongTrinh(check_data($_GET['lacongtrinh']));
$OBJ->setDuAnDauTu(check_data($_GET['duandautu']));

$sottpsct = $_GET['sottpsct'];
$OBJ->setSottpsct($sottpsct);

database::re_query("ALTER TABLE `chitiet_pskt` ADD `chiphikhongloaitru` INT NOT NULL;");
database::re_query("ALTER TABLE `chitiet_pskt` ADD `loaitokhai` INT NOT NULL DEFAULT '1'");
database::re_query("ALTER TABLE `chitiet_pskt` ADD `capnhat_chungtugoc` DATETIME NOT NULL;");
database::re_query("ALTER TABLE `chitiet_pskt` ADD `capnhat_chiphikhongloaitru` DATETIME NOT NULL;");
database::re_query("ALTER TABLE `chitiet_pskt` ADD `loaisp` CHAR(2) NOT NULL;");
database::re_query("ALTER TABLE `chitiet_pskt` ADD `loaihanghoadichvu` INT(1) NOT NULL DEFAULT '1';");
database::re_query("ALTER TABLE `chitiet_pskt` ADD `masothuekh` VARCHAR(15) NOT NULL;");
database::re_query("ALTER TABLE `chitiet_pskt` ADD `chungtuthamchieu` CHAR(20) NOT NULL;");
database::re_query("ALTER TABLE `pskt` ADD `tencanhan` CHAR(200) NOT NULL;");
database::re_query("ALTER TABLE `chitiet_pskt` ADD `lacongtrinh` INT(1) NOT NULL;");
database::re_query("ALTER TABLE `chitiet_pskt` ADD `duandautu` INT(1) NOT NULL;");
database::re_query("ALTER TABLE `pskt` ADD `machinhanh` CHAR(14) NOT NULL, ADD INDEX `index_macn` (`machinhanh`);");

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

$TonTai = $OBJ->checkSoPhieuTonTai();
$TonTaiCT = $OBJ->checSoTTCTTonTai();
if($TonTai==TRUE){
    $OBJ->suaPSKT();
    if($TonTaiCT==FALSE) {
        $OBJ->themChiTietPSKT();
    }else {
        $OBJ->suaChiTietPSKT();
    }

}else{
    $OBJ->themPSKT();
    if($TonTaiCT==FALSE) {
        $OBJ->themChiTietPSKT();
    }else {
        $OBJ->suaChiTietPSKT();
    }
}
if($_GET['chungtugoc']==0){
    //echo "update chitiet_pskt set capnhat_chungtugoc = '".date("Y-m-d h:i:s")."' where sophieu='".$sophieu."'";
    database::re_query("update chitiet_pskt set capnhat_chungtugoc = '".date("Y-m-d h:i:s")."' where sophieu='".$sophieu."'");
}
if($_GET['chiphikhongloaitru']==1){
    database::re_query("update chitiet_pskt set capnhat_chiphikhongloaitru = '".date("Y-m-d h:i:s")."' where sophieu='".$sophieu."'");
}

if ($RES_NHATKY['sodong']<1){
    $sql_ins = "INSERT INTO nhatkylamviec(hanhdong,loaiphieu,dulieu,dulieukd,dulieumahoa,thoigianghi,nguoighi) VALUES ('SỬA','{$tenphieu}','" . $nhatky . "','" . khu_dau_vn($nhatky) . "','" . $mahoa . "','" . date("Y-m-d H:i:s") . "','" . $_SESSION['User'] . "')";
    database::re_query($sql_ins);
}
?>