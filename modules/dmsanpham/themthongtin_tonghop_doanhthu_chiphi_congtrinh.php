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
//$dataDoanhThuThuan = $OBJCT->load_danhsach_no_co_theocongtrinh($matk, $theonoidung, $sapxep);// lấy tất cả thu chi  nhập xuất
//debug($dataDoanhThuThuan);
// Cập nhật cách lấy Doanh thu sản phẩm ngày 28/02/2024
$dataDoanhThuThuan = $OBJCT->load_danhsach_doanhthu_thuan_sanpham($tungay, $denngay);// lấy tất cả thu chi  nhập xuất
///echo "----------------Doanh thu thuần----------------------";
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
        $TongCPSXCTong += ($itemTongCPSXCTong['tienno']);
    if ($itemTongCPSXCTong['loaisp'] == "SP")
        $TongCPSXSPTong += ($itemTongCPSXCTong['tienno']);
}
//// Tính cho sản phẩm

///echo "cong trinh";
foreach ($DanhSachCTSP_ChaCon as $kNCTT => $itemNCTT) {
    $array = explode(",", $itemNCTT);
    $TongNCThucTeDaCong = 0;
    foreach ($dataNhancong as $kNCTT1 => $itemNCTT1) {
        if (in_array($kNCTT1, $array)) {
            $TongNCThucTeDaCong += ($itemNCTT1['tienno']);
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
///echo "--------------Tổng nhân công thực tế--------------";
//debug($TongNCThucTe);

$dataSoLuongDuTruSanPham = $OBJMACT->ListSoLuongDuTruSanPham($tungay, $denngay);
///echo "--------------Số lượng dự trù--------------";
//debug($dataSoLuongDuTruSanPham);

$dataSoLuongXuatkhoThanhPham = $OBJMACT->ListSoLuongXuatKhoThanhPham($tungay, $denngay);

///echo "--------------Số lượng xuất kho--------------";
//debug($dataSoLuongXuatkhoThanhPham);

$TongNCTieuChuan = $OBJMACT->TongNhanCongTieuChuan($DanhSachCTSP_ChaCon, $dataSoLuongDuTruSanPham);


//echo "--------------Tổng nhân công tiêu chuẩn--------------";
//debug($TongNCTieuChuan);

$DataNCTieuChuan = $OBJMACT->LoadDSNhanCongTieuChuan();
$DataNVLTieuChuan = $OBJMACT->LoadDSNguyenVatLieuTieuChuan();
$DataCPSXCTieuChuan = $OBJMACT->LoadDSChiPhiSXCTieuChuan();
$DataMayTieuChuan = $OBJMACT->LoadDSMayTieuChuan();

//echo "--------------Giá thành nhân công tiêu chuẩn--------------";
//debug($DataNCTieuChuan);

//echo "--------------Nguyên vật liệu tiêu chuẩn--------------";
//debug($DataNVLTieuChuan);

//echo "--------------Nguyên vật liệu thực tế--------------";
//debug($dataNguyenLieu);

//echo "--------------Chi phí SXC tiêu chuẩn--------------";
//debug($TongNCTieuChuan);

foreach ($TongNCTieuChuan as $kHeSoNC => $itemHeSoNC) {
    $HeSoNC[$kHeSoNC] = $TongNCThucTe[$kHeSoNC] / round($TongNCTieuChuan[$kHeSoNC]);
}

/// Điền hệ số vo cho các sản phẩm con
foreach ($DanhSachCTSP_ChaCon as $kNCTTC => $itemNCTTC) {
    $arrayC = explode(",", $itemNCTTC);
    foreach ($arrayC as $itemHeSoChuyen) {
        $HeSoTungSanPham[$itemHeSoChuyen] = $HeSoNC[$kNCTTC];
    }
}

$ListCT = ($dodangdauky + $dataNguyenLieu + $dataNhancong + $dataMay + $dataCPSXC + $dataDoanhThuThuan + $dataGiaThanh + $dataCPSXCPB + $dataTongCTKhoan);
//echo "--------------Hệ số--------------";
//

$dataPhanBoPhanXuong = $OBJMACT->loadListThongTinBangCPSXChungCongTrinh_CoKey("SP");

$sophieuCPC = $OBJPSKT->createSoPhieu();

$sql_emp_pskt = "DELETE chitiet_pskt, pskt 
                        FROM pskt 
                        INNER JOIN chitiet_pskt ON pskt.sophieu = chitiet_pskt.sophieu 
                        WHERE pskt.loaiphieu = '79' AND pskt.btps = '2' and ngayghiso>='".$tungay."' and ngayghiso<='".$denngay."';";
$OBJCT->re_query($sql_emp_pskt);
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
    $valins .= "('" . $itemCT['sottxuat'] . "','" . $itemCT['masp'] . "','" . $itemCT['tensp'] . "','" . $itemCT['sotiendk'] . "','" . $itemCT['sotiennl'] . "','" . $itemCT['sotiennc'] . "','" . $itemCT['sotienmay'] . "','" . $itemCT['sotiencpsxc'] . "','" . $itemCT['maspcha'] . "','" . $itemCT['doanhthuthuan'] . "','" . $itemCT['tongcong'] . "','" . $itemCT['sotiencpsxcpb'] . "','" . $itemCT['tylenl'] . "','" . $itemCT['tylenc'] . "','" . $itemCT['tylemay'] . "','" . $itemCT['tylecpsxc'] . "','" . $itemCT['tylecpsxcpb'] . "','" . $itemCT['giathanh'] . "','" . $itemCT['lailo'] . "','" . $itemCT['dodangck'] . "','" . $itemCT['dodangck_'] . "','" . $itemCT['loaisp'] . "','" . $itemCT['giathanhtoanbo'] . "','" . $itemCT['giathanhdonvi'] . "','" . $itemCT['sotiennltieuchuan'] . "','" . $itemCT['sotiennctieuchuan'] . "','" . $itemCT['sotienmaytieuchuan'] . "','" . $itemCT['sotiencpsxctieuchuan'] . "','" . $itemCT['sotienncpb'] . "','" . $itemCT['sotiennc622pb'] . "','" . $itemCT['ctkhoan'] . "','" . $itemCT['hienthi'] . "','" . $itemCT['loaisp'] . "','" . $itemCT['LapCapThapNhat'] . "'),";
}
$OBJCT->re_query("ALTER TABLE `bangtonghop_danhthu_chiphi_giathanhct` ADD `ctkhoan` BIGINT NOT NULL;");
$OBJCT->re_query("ALTER TABLE `bangtonghop_danhthu_chiphi_giathanhct` ADD `loaipb` CHAR(2) NOT NULL;");
$OBJCT->re_query("ALTER TABLE `bangtonghop_danhthu_chiphi_giathanhct` ADD `lacapthapnhat` INT(1) NOT NULL;");
$OBJCT->re_query("delete from bangtonghop_danhthu_chiphi_giathanhct where `loaipb`='SP'");
$OBJCT->re_query("delete from bangtonghop_danhthu_chiphi_giathanhct where `loaipb`=''");
$OBJCT->re_query("insert into bangtonghop_danhthu_chiphi_giathanhct(sottxuat,mact,tenct,dodangdk,sotiennl,sotiennc,sotienmay,sotiencpsxc,mactcha,doanhthuthuan,tongcong,sotiencpsxcpb,tylenl,tylenc,tylemay,tylecpsxc,tylecpsxcpb,giathanh,lailo,dodangck,dodangck_,loaisp,giathanhtoanbo,giathanhdonvi,sotiennltieuchuan,sotiennctieuchuan,sotienmaytieuchuan,sotiencpsxctieuchuan,sotienncpb,sotiennc622pb,ctkhoan,hienthi,`loaipb`,lacapthapnhat) VALUES " . substr($valins, 0, -1));
///////////
$sophieu = $OBJPSKT->createSoPhieu();
// CHUYỂN CHÊNH LỆCH CỦA SP

// HẾT CHUYỂN CHÊNH LỆCH CỦA SP
$tienchienlech = $TongNVLTT - $TongNVLDT;

//echo $TongNCTT;
$tienchienlechnc = $TongNCTT - $TongNCDT;

$tienchienlechcpsxpb = $TongCPSXChungTT;
$tienchienlechcpsxrieng = $TongCPSXRiengTT - ($TongCPSXRiengDT);

$tienchienlechcpMayPB = $TongMayPhanBoTT;
$tienchienlechMayRieng = $TongMayRiengTT - $TongCPSXRiengDT623 - $TongCPSXChungDT623;

$sql_tongtien_nhapsp = "select sum(chitiet_psvt.thanhtien) as thanhtien from chitiet_psvt INNER JOIN masp on (masp.masp = mavt) INNER JOIN psvt on (psvt.sophieu = chitiet_psvt.sophieu) WHERE psvt.loaiphieu = 1 and masp.loaisp='SP'";
$res_tongtien_nhapsp = $OBJCT->re_query($sql_tongtien_nhapsp);
$data_tongtien_nhapsp = $OBJCT->re_fetch($res_tongtien_nhapsp);
$tongtien_nhapsp = $data_tongtien_nhapsp['thanhtien'];

$TONGTIENDIEUCHINHCHENHLECH = 0;

$GiaTriKCQua_taikhoanchung_623_627 = $OBJCT->load_danhsach_tmp_taikhoanchung_623_627();
{// Lấy danh sách giá trị KC từ 154 sang 155 trong danh sách hợp đồng
    $sql_taikhoanchung_623_627 = "select matk,sotien from tmp_taikhoanchung_623_627";
    $result_taikhoanchung_623_627 = $OBJCT->re_query($sql_taikhoanchung_623_627);
    while ($data_taikhoanchung_623_627 = $OBJCT->re_fetch($result_taikhoanchung_623_627)) {
        if(substr($data_taikhoanchung_623_627['matk'],0,3)=='623'){
            $GiaTriKCQua_taikhoanchung_623_627['623'][$data_taikhoanchung_623_627['matk']] = $data_taikhoanchung_623_627['sotien'];
        }else if(substr($data_taikhoanchung_623_627['matk'],0,3)=='627'){
            $GiaTriKCQua_taikhoanchung_623_627['627'][$data_taikhoanchung_623_627['matk']] = $data_taikhoanchung_623_627['sotien'];
        }

    }
}
$value_pskt = "";
$value_chitiet_pskt = "";
$sophieu++;
$value_pskt .= "('" . $sophieu . "','1','" . $denngay . "','632','75','" . ($tienchienlech - $TONGTIENDIEUCHINHCHENHLECH) . "','2'),";
$value_chitiet_pskt .= "('" . 1 . "','" . $denngay . "','" . ($tienchienlech - $TONGTIENDIEUCHINHCHENHLECH) . "','0001','Toàn Bộ','100093','Kết chuyển nguyên vật liệu TTT chênh lệch so với tiêu chuẩn sang giá vốn ','621','" . ($tienchienlech - $TONGTIENDIEUCHINHCHENHLECH) . "','4','75','" . $sophieu . "','2'),";

$sophieu++;
$value_pskt .= "('" . $sophieu . "','1','" . $denngay . "','632','75','" . ($tienchienlechnc) . "','2'),";
$value_chitiet_pskt .= "('" . 1 . "','" . $denngay . "','" . ($tienchienlechnc) . "','0001','Toàn Bộ','100093','Kết chuyển nhân công TT chênh lệch so với tiêu chuẩn sang giá vốn ','622','" . ($tienchienlechnc) . "','4','75','" . $sophieu . "','2'),";

$TongTienCPSXTieuChuan627 = abs($tienchienlechcpsxrieng + $tienchienlechcpsxpb);// Tổng Tiền 623 của sản phẩm
foreach ($GiaTriKCQua_taikhoanchung_623_627['627'] as $K_taikhoanchung_627=>$Item_taikhoanchung_627){// Duyệt tài khoản tạm 623
    $TienHoachToan_627 = 0;
    if($TongTienCPSXTieuChuan627>0){
        if($Item_taikhoanchung_627>=$TongTienCPSXTieuChuan627){
            $TienHoachToan_627 = $TongTienCPSXTieuChuan627;
            $Item_taikhoanchung_627 = $Item_taikhoanchung_627-$TongTienCPSXTieuChuan627;
            $GiaTriKCQua_taikhoanchung_623_627['627'][$K_taikhoanchung_627] = $Item_taikhoanchung_627;
            $TongTienCPSXTieuChuan627 = 0;
        }else if($Item_taikhoanchung_627<=$TongTienCPSXTieuChuan627){
            $TienHoachToan_627 = $Item_taikhoanchung_627;
            $TongTienCPSXTieuChuan627 =$TongTienCPSXTieuChuan627 - $Item_taikhoanchung_627;
            $GiaTriKCQua_taikhoanchung_623_627['627'][$K_taikhoanchung_627] = 0;
            $Item_taikhoanchung_627 = 0;
        }
        $sophieu++;
        $value_pskt .= "('" . $sophieu . "','1','" . $denngay . "','632','75','" . ($TienHoachToan_627) . "','2'),";
        $value_chitiet_pskt .= "('" . 1 . "','" . $denngay . "','" . ($TienHoachToan_627) . "','0001','Toàn Bộ','100093','Kết chuyển CP SXC TT chênh lệch so với tiêu chuẩn sang giá vốn ','".$K_taikhoanchung_627."','" . ($TienHoachToan_627) . "','4','75','" . $sophieu . "','2'),";
    }
}

$TongTienCPSXTieuChuan623 = abs($tienchienlechcpMayPB+$tienchienlechMayRieng);// Tổng Tiền 623 của sản phẩm
foreach ($GiaTriKCQua_taikhoanchung_623_627['623'] as $K_taikhoanchung_623=>$Item_taikhoanchung_623){// Duyệt tài khoản tạm 623
    $TienHoachToan_623 = 0;
    if($TongTienCPSXTieuChuan623>0){
        if($Item_taikhoanchung_623>=$TongTienCPSXTieuChuan623){
            $TienHoachToan_623 = $TongTienCPSXTieuChuan623;
            $Item_taikhoanchung_623 = $Item_taikhoanchung_623-$TongTienCPSXTieuChuan623;
            $GiaTriKCQua_taikhoanchung_623_627['623'][$K_taikhoanchung_623] = $Item_taikhoanchung_623;
            $TongTienCPSXTieuChuan623 = 0;
        }else if($Item_taikhoanchung_623<=$TongTienCPSXTieuChuan623){
            $TienHoachToan_623 = $Item_taikhoanchung_623;
            $TongTienCPSXTieuChuan623 =$TongTienCPSXTieuChuan623 - $Item_taikhoanchung_623;
            $GiaTriKCQua_taikhoanchung_623_627['623'][$K_taikhoanchung_623] = 0;
            $Item_taikhoanchung_623 = 0;
        }
        $sophieu++;
        $value_pskt .= "('" . $sophieu . "','1','" . $denngay . "','632','75','" . $TienHoachToan_623 . "','2'),";
        $value_chitiet_pskt .= "('" . 1 . "','" . $denngay . "','" . $TienHoachToan_623 . "','0001','Toàn Bộ','100093','Kết chuyển CP Máy TT chênh lệch so với tiêu chuẩn sang giá vốn ','".$K_taikhoanchung_623."','" . $TienHoachToan_623 . "','4','75','" . $sophieu . "','2'),";
    }
}
$sql_pskt = "insert into pskt(sophieu,mapskt,ngayghiso,tkco,loaiphieu,tongcong,btps) VALUE " . substr($value_pskt, 0, -1);
$sql_chitiet_pskt = "insert into chitiet_pskt(mapskt,ngayhoadon,gtvnd1,mabp,bophan,mand1,noidung1,tkno1,tongtien,maloai,loaiphieu,sophieu,btps) VALUE " . substr($value_chitiet_pskt, 0, -1);
if ($tutaobuttoan == "true") {
    $OBJCT->re_query($sql_pskt);
    $OBJCT->re_query($sql_chitiet_pskt);
}
$sql_emp_pskt = "DELETE chitiet_pskt, pskt 
					FROM pskt 
					INNER JOIN chitiet_pskt ON pskt.sophieu = chitiet_pskt.sophieu 
					WHERE pskt.loaiphieu = '79' AND pskt.btps = '4' and ngayghiso>='".$tungay."' and ngayghiso<='".$denngay."';";
$OBJCT->re_query($sql_emp_pskt); // btps = 4, SP-Phan bo SP theo NVL
try {    // Thực hiện truy vấn hoặc logic xử lý dữ liệu
    $data = ['status' => 'success', 'message' => 'Dữ liệu xử lý thành công'];
    echo json_encode($data);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
