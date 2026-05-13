<?php
include("../../config.php");

$OBJCT = new ketoantonghop();
$OBJPSKT = new pskt();
$OBJHTTK = new hethongtaikhoan();
$OBJMACT = new dmsanpham();
$OBJMANOIDUNG = new manoidung();

$OBJCT->re_query("ALTER TABLE `bangtonghop_danhthu_chiphi_giathanhct` ADD `hienthi` INT(1) NOT NULL;");
$OBJCT->re_query("ALTER TABLE `bangtonghop_danhthu_chiphi_giathanhct` ADD `loaipb` char(2) NOT NULL;");
$DATA_LISTMABP = $OBJMACT->loadListMaCT_CoKeyLaMa();
$DATA_LISTMAND = $OBJMANOIDUNG->loadListMaNoiDung_CoKeyLaMa();

$MaTK_All_Con = $OBJCT->loadMaKHALL_TraVeChuoiMaTK(623);
$matk_623 = implode(",", $MaTK_All_Con);

$MaTK_All_Con = $OBJCT->loadMaKHALL_TraVeChuoiMaTK(627);
$matk_627 = implode(",", $MaTK_All_Con);

$MaTK_All_Con = $OBJCT->loadMaKHALL_TraVeChuoiMaTK(511);
$matk_511 = implode(",", $MaTK_All_Con);

$tungay = $_GET['tungay'];

$LoaiPB = $_GET['loaipb'];

$denngay = $_GET['denngay'];
$masp = $_GET['masp'];
$theocongdoan = $_GET['theocongdoan'];
$tutaobuttoan = $_GET['TuDongTaoButToanPhatSinh'];
$theobophan = "0001";

$theonoidung = "ALL";


$CTCAP1 = $OBJMACT->loadDSSPCap1_CT(0);
$STR_CTCAP1_ARR = $CTCAP1;
$STR_CTCAP1_ARR['0001'] = '0001';
$STR_CTCAP1 = implode("','", $STR_CTCAP1_ARR);

if ($theobophan == '0001') {
    $sql_mabp = " and mabp not in('" . $STR_CTCAP1 . "')";
    $sql_mabp1 = " and makho not in ('" . $STR_CTCAP1 . "')";
} else {
    $chuoimactsp_re = substr($OBJMACT->loadMaKHALL_TraVeChuoiMaCTSP($theobophan), 0, -1);
    $mactsp_string = str_replace(",", "','", $chuoimactsp_re);
    $sql_mabp = " and mabp in ('" . $mactsp_string . "')";
    $sql_mabp1 = " and makho in ('" . $mactsp_string . "')";
}

$DanhSachCTSP_ChaCon = $OBJMACT->loadMaKHALL_TraVeChuoiMaCTSP_TheoTungChaCon(0);


$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;

$sapxep = $_GET['sapxep'];

$matk = $_GET['mavt'];
$str_w = "";
$str_w2 = "";

$dodangdauky = $OBJCT->load_danhsach_dodang_dk();// Lấy đầu kỳ dỡ dang


$str_w2 = " and ngayghiso >='" . $tungay . "' and ngayghiso<='" . $denngay . "'  " . $sql_mabp1;
$OBJCT->setStrOderby2($str_w2);
$str_w = " and ngayghiso >='" . $tungay . "' and ngayghiso<= '" . $denngay . "'  " . $sql_mabp;
$OBJCT->setStrOderby($str_w);

//// Lấy danh sách Nguyên Liệu
$matk = "621";
$dataNguyenLieu = $OBJCT->load_danhsach_no_co_theocongtrinh($matk, $theonoidung, $sapxep);// lấy tất cả thu chi nhập xuất

//// Lấy danh sách Nhân Công cưa có phân bổ
$matk = "622";
$dataNhancong = $OBJCT->load_danhsach_no_co_theocongtrinh($matk, $theonoidung, $sapxep);// lấy tất cả thu chi  nhập xuất

//// Lấy danh sách Máy
$matk = $matk_623;
$dataMay = $OBJCT->load_danhsach_no_co_theocongtrinh($matk, $theonoidung, $sapxep);// lấy tất cả thu chi  nhập xuất
$dataMay_CTTheoTK = $OBJCT->load_danhsach_no_co_theocongtrinh_tungtaikhoan($matk, $theonoidung, $sapxep);// lấy tất cả thu chi  nhập xuất

//// Lấy danh sách chi phí xhung
$matk = $matk_627;
$dataCPSXC = $OBJCT->load_danhsach_no_co_theocongtrinh($matk, $theonoidung, $sapxep);// lấy tất cả thu chi  nhập xuất
//debug($dataCPSXC);
$dataCPSXC_CTTheoTK = $OBJCT->load_danhsach_no_co_theocongtrinh_tungtaikhoan($matk, $theonoidung, $sapxep);// lấy tất cả thu chi  nhập xuất
//debug($dataCPSXC_CTTheoTK);
//// Lấy danh sách tổng 154
$matk = "154";
$dataTong154 = $OBJCT->load_danhsach_no_co_theocongtrinh_taikhoan154_khong_632($matk, $theonoidung, $sapxep);// lấy tất cả thu chi  nhập xuất

//debug($dataTong154);

$ListCT = ($dataNguyenLieu + $dataNhancong + $dataMay + $dataCPSXC);

//// Lấy danh sách danh thu thuần
$matk = $matk_511;
$dataDoanhThuThuan = $OBJCT->load_danhsach_no_co_theocongtrinh($matk, $theonoidung, $sapxep);// lấy tất cả thu chi  nhập xuất

echo "----------------Doanh thu thuần----------------------";
//debug($dataDoanhThuThuan);
//// Lấy danh sách chi phí sản xuất chi phí phân bổ
$matk = $matk_627;
$dataCPSXCPB = $OBJCT->load_danhsach_no_co_theocongtrinh_cpsxchungbp($matk, $theonoidung, $sapxep);// lấy tất cả thu chi  nhập xuất

//// Lấy danh sách nhân ca máy phân bổ
$matk = $matk_623;
$dataNCPB = $OBJCT->load_danhsach_no_co_theocongtrinh_cpsxchungbp($matk, $theonoidung, $sapxep);// lấy tất cả thu chi  nhập xuất

//// Lấy danh sách nhân công phân bổ
$matk = "622";///// Lấy Nhân công phân bổ của công trình
$dataNC622PB = $OBJCT->load_danhsach_no_co_theocongtrinh_cpsxchungbp($matk, $theonoidung, $sapxep);// lấy tất cả thu chi  nhập xuất
///debug($dataNhancong);
/// //// Lấy danh sách nhân công phân bổ
$matk = "622";///// Lấy Nhân công phân bổ của công trình
$dataNC622PBSP = $OBJCT->load_danhsach_no_co_theocongtrinh_cpsxchungbp_sp($matk, $theonoidung, $sapxep);// lấy tất cả thu chi  nhập xuất

//// Lấy danh sách giá thành
$matk = "632";
$dataGiaThanh = $OBJCT->load_danhsach_no_co_theocongtrinh_giathanh($matk, $theonoidung, "154");// lấy tất cả thu chi nhập xuất
//debug($dataGiaThanh);
//// Lấy danh sách tổng 154
$matk = "154";
$dataTong154 = $OBJCT->load_danhsach_no_co_theocongtrinh_taikhoan154_khong_632($matk, $theonoidung, "632");// Lấy tài khoản 154 không có 632


$dataTongCTKhoan = $OBJCT->load_danhsach_no_co_theocongtrinh_taikhoan154_khong_632_CT_Khoan($matk, $theonoidung, "632");// Không lấy mã phiếu 77 phân bổ CPSX Chung

//debug($dataTong154);

//// Lấy danh sách giá thành tiêu chuẩn
$dataGiaThanhTieuChuan = $OBJCT->load_danhsach_giathanh_tieuchuan();// lấy tất cả thu chi nhập xuất

//// Lấy danh sách chi phí sx chung tổng
$str_w2 = " and ngayghiso >='" . $tungay . "' and ngayghiso<='" . $denngay . "' and makho!='' ";
$OBJCT->setStrOderby2($str_w2);
$str_w = " and ngayghiso >='" . $tungay . "' and ngayghiso<= '" . $denngay . "'  and mabp!='' ";
$OBJCT->setStrOderby($str_w);

$matk = $matk_627;
$dataCPSXCTong = $OBJCT->load_danhsach_no_co_theocongtrinh($matk, $theonoidung, $sapxep);// lấy tất cả thu chi nhập xuất

$ListCT = ($dodangdauky + $dataNguyenLieu + $dataNhancong + $dataMay + $dataCPSXC + $dataTong154 + $dataTongCTKhoan);

$TongDoanhThuThuan = 0;
foreach ($dataDoanhThuThuan as $itemTongDT) {
    $TongDoanhThuThuan += ($itemTongDT['tienco']);// Không sử dụng doanh thu thuần trong tổng hợp giá thành CT
}

$TongCPSXCTong = 0;
$TongCPSXSPTong = 0;
foreach ($dataCPSXCTong as $itemTongCPSXCTong) {
    if ($itemTongCPSXCTong['loaisp'] == "CT")
        $TongCPSXCTong += ($itemTongCPSXCTong['tienno']-$itemTongCPSXCTong['tienco']);
    if ($itemTongCPSXCTong['loaisp'] == "SP")
        $TongCPSXSPTong += ($itemTongCPSXCTong['tienno']-$itemTongCPSXCTong['tienco']);
}
//// Tính cho sản phẩm

echo "cong trinh";
foreach ($DanhSachCTSP_ChaCon as $kNCTT => $itemNCTT) {
    $array = explode(",", $itemNCTT);
    $TongNCThucTeDaCong = 0;
    foreach ($dataNhancong as $kNCTT1 => $itemNCTT1) {
        if (in_array($kNCTT1, $array)) {
            $TongNCThucTeDaCong += ($itemNCTT1['tienno']-$itemNCTT1['tienco']);
        }
    }
    foreach ($dataNC622PBSP as $kNCTT2 => $itemNCTT2) {
        if (in_array($kNCTT2, $array)) {
            $TongNCThucTeDaCong += ($itemNCTT2['tienco']);
        }
    }
    $TongNCThucTe[$kNCTT] = $TongNCThucTeDaCong;
}

//debug($DanhSachCTSP_ChaCon);
echo "--------------Tổng nhân công thực tế--------------";
//debug($TongNCThucTe);

$dataSoLuongDuTruSanPham = $OBJMACT->ListSoLuongDuTruSanPham($tungay, $denngay);
echo "--------------Số lượng dự trù--------------";
//debug($dataSoLuongDuTruSanPham);

$dataSoLuongXuatkhoThanhPham = $OBJMACT->ListSoLuongXuatKhoThanhPham($tungay, $denngay);

echo "--------------Số lượng xuất kho--------------";
//debug($dataSoLuongXuatkhoThanhPham);

$TongNCTieuChuan = $OBJMACT->TongNhanCongTieuChuan($DanhSachCTSP_ChaCon, $dataSoLuongDuTruSanPham);


echo "--------------Tổng nhân công tiêu chuẩn--------------";
//debug($TongNCTieuChuan);

$DataNCTieuChuan = $OBJMACT->LoadDSNhanCongTieuChuan();
$DataNVLTieuChuan = $OBJMACT->LoadDSNguyenVatLieuTieuChuan();
$DataCPSXCTieuChuan = $OBJMACT->LoadDSChiPhiSXCTieuChuan();
$DataMayTieuChuan = $OBJMACT->LoadDSMayTieuChuan();

echo "--------------Giá thành nhân công tiêu chuẩn--------------";
//debug($DataNCTieuChuan);

echo "--------------Nguyên vật liệu tiêu chuẩn--------------";
//debug($DataNVLTieuChuan);

echo "--------------Nguyên vật liệu thực tế--------------";
//debug($dataNguyenLieu);

echo "--------------Chi phí SXC tiêu chuẩn--------------";
//debug($TongNCTieuChuan);

foreach ($TongNCTieuChuan as $kHeSoNC => $itemHeSoNC) {
    $HeSoNC[$kHeSoNC] = $TongNCThucTe[$kHeSoNC] / round($TongNCTieuChuan[$kHeSoNC]);
}
//debug($TongNCThucTe);
//debug($DanhSachCTSP_ChaCon);
/// Điền hệ số vo cho các sản phẩm con
foreach ($DanhSachCTSP_ChaCon as $kNCTTC => $itemNCTTC) {
    $arrayC = explode(",", $itemNCTTC);
    foreach ($arrayC as $itemHeSoChuyen) {
        $HeSoTungSanPham[$itemHeSoChuyen] = $HeSoNC[$kNCTTC];
    }
}

$ListCT = ($dodangdauky + $dataNguyenLieu + $dataNhancong + $dataMay + $dataCPSXC + $dataDoanhThuThuan + $dataGiaThanh + $dataCPSXCPB + $dataTongCTKhoan);
echo "--------------Hệ số--------------";
//

$dataPhanBoPhanXuong = $OBJMACT->loadListThongTinBangCPSXChungCongTrinh_CoKey("SP");

$sophieuCPC = $OBJPSKT->createSoPhieu();

$TinhCPChuaPhanCap = $OBJCT->load_danhsach_congtrinh_dodang_chuaphancap_cocpsxpb($ListCT, $dodangdauky, $dataNguyenLieu, $dataNhancong, $dataMay, $dataCPSXC, $dataDoanhThuThuan, $TongDoanhThuThuan, $TongCPSXCTong, $dataGiaThanh, $dataCPSXCPB, $dataGiaThanhTieuChuan, $HeSoTungSanPham, $DataNCTieuChuan, $TongNCThucTe, $dataSoLuongXuatkhoThanhPham, $DataNVLTieuChuan, $DataCPSXCTieuChuan, $DataMayTieuChuan, $dataSoLuongDuTruSanPham, $sophieuCPC, $tutaobuttoan, $dataNCPB, $masp, $dataNC622PB, $dataTong154, $dataPhanBoPhanXuong, $dataMay_CTTheoTK, $dataCPSXC_CTTheoTK, $dataNC622PBSP, $dataTongCTKhoan, $denngay);

$dataThemVaoBang = $OBJMACT->loadThemBangTongHop_DoanhThu_ChiPhi_GiaThanhCongTrinh(0, $TinhCPChuaPhanCap, $theocongdoan, $LoaiPB);

$TongNVLTT = 0;
$TongCPSXChungTT = 0;
$TongCPSXChungDT = 0;
$TongCPSXChungDT623 = 0;
$TongCPSXRiengTT = 0;
$TongCPSXRiengDT = 0;
$TongCPSXRiengDT623 = 0;
$TongNVLDT = 0;
$TongNCTT = 0;
$TongNCDT = 0;
$TongMayPhanBoTT = 0;
$TongMayRiengTT = 0;

foreach ($TinhCPChuaPhanCap as $itemCPChuaPhanCap) {
    if ($itemCPChuaPhanCap['loaisp'] == 'SP') {
        $TongNVLTT += $itemCPChuaPhanCap['sotiennl'];
        $TongNCTT += ($itemCPChuaPhanCap['sotiennc'] + $itemCPChuaPhanCap['sotiennc622pb']);
        $TongCPSXChungTT += $itemCPChuaPhanCap['sotiencpsxcpb'];
        $TongCPSXChungDT += $itemCPChuaPhanCap['tiencpsxchungtieuchuan'];
        $TongCPSXChungDT623 += $itemCPChuaPhanCap['tiencpmaychungtieuchuan'];
        $TongCPSXRiengTT += $itemCPChuaPhanCap['sotiencpsxc'];
        $TongMayRiengTT += $itemCPChuaPhanCap['sotienmay'];
        $TongMayPhanBoTT += $itemCPChuaPhanCap['sotienncpb'];
        $TongCPSXRiengDT += $itemCPChuaPhanCap['sotiencpsxctieuchuan'];
        $TongCPSXRiengDT623 += $itemCPChuaPhanCap['tiencpmayriengtieuchuan'];
        $TongNVLDT += $itemCPChuaPhanCap['sotiennltieuchuan'];
        $TongNCDT += $itemCPChuaPhanCap['sotiennctieuchuan'];
    }
}

$valins = "";
foreach ($dataThemVaoBang as $itemCT) {
    $valins .= "('" . $itemCT['sottxuat'] . "','" . $itemCT['masp'] . "','" . $itemCT['tensp'] . "','" . $itemCT['sotiendk'] . "','" . $itemCT['sotiennl'] . "','" . $itemCT['sotiennc'] . "','" . $itemCT['sotienmay'] . "','" . $itemCT['sotiencpsxc'] . "','" . $itemCT['maspcha'] . "','" . $itemCT['doanhthuthuan'] . "','" . $itemCT['tongcong'] . "','" . $itemCT['sotiencpsxcpb'] . "','" . $itemCT['tylenl'] . "','" . $itemCT['tylenc'] . "','" . $itemCT['tylemay'] . "','" . $itemCT['tylecpsxc'] . "','" . $itemCT['tylecpsxcpb'] . "','" . $itemCT['giathanh'] . "','" . $itemCT['lailo'] . "','" . $itemCT['dodangck'] . "','" . $itemCT['dodangck_'] . "','" . $itemCT['loaisp'] . "','" . $itemCT['giathanhtoanbo'] . "','" . $itemCT['giathanhdonvi'] . "','" . $itemCT['sotiennltieuchuan'] . "','" . $itemCT['sotiennctieuchuan'] . "','" . $itemCT['sotienmaytieuchuan'] . "','" . $itemCT['sotiencpsxctieuchuan'] . "','" . $itemCT['sotienncpb'] . "','" . $itemCT['sotiennc622pb'] . "','" . $itemCT['ctkhoan'] . "','" . $itemCT['hienthi'] . "','" . $itemCT['loaisp'] . "'),";
}
database::re_query("ALTER TABLE `bangtonghop_danhthu_chiphi_giathanhct` ADD `ctkhoan` BIGINT NOT NULL;");
database::re_query("ALTER TABLE `bangtonghop_danhthu_chiphi_giathanhct` ADD `loaipb` CHAR(2) NOT NULL;");
database::re_query("delete from bangtonghop_danhthu_chiphi_giathanhct where `loaipb`='CT'");
database::re_query("delete from bangtonghop_danhthu_chiphi_giathanhct where `loaipb`=''");
database::re_query("insert into bangtonghop_danhthu_chiphi_giathanhct(sottxuat,mact,tenct,dodangdk,sotiennl,sotiennc,sotienmay,sotiencpsxc,mactcha,doanhthuthuan,tongcong,sotiencpsxcpb,tylenl,tylenc,tylemay,tylecpsxc,tylecpsxcpb,giathanh,lailo,dodangck,dodangck_,loaisp,giathanhtoanbo,giathanhdonvi,sotiennltieuchuan,sotiennctieuchuan,sotienmaytieuchuan,sotiencpsxctieuchuan,sotienncpb,sotiennc622pb,ctkhoan,hienthi,`loaipb`) VALUES " . substr($valins, 0, -1));
