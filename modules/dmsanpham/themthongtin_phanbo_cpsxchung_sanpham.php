<?php
include("../../config.php");

$OBJCT = new ketoantonghop();
$OBJHTTK = new hethongtaikhoan();
$OBJMACT = new dmsanpham();
$OBJMANOIDUNG = new manoidung();
$OBJPSKT = new pskt();
$DATA_LISTMABP = $OBJMACT->loadListMaCT_CoKeyLaMa();
$DATA_LISTMAND = $OBJMANOIDUNG->loadListMaNoiDung_CoKeyLaMa();

$MaTK_All_Con = $OBJCT->loadMaKHALL_TraVeChuoiMaTK(623);
$matk_623 = implode(",", $MaTK_All_Con);

$MaTK_All_Con = $OBJCT->loadMaKHALL_TraVeChuoiMaTK(627);
$matk_627 = implode(",", $MaTK_All_Con);

$MaTK_All_Con = $OBJCT->loadMaKHALL_TraVeChuoiMaTK(511);
$matk_511 = implode(",", $MaTK_All_Con);
// Khai báo mảng
$dodangdauky = array();
$dataNguyenLieu= array();
$dataNhancong= array();
$dataMay= array();
$dataCPSXC= array();
$dataDoanhThuThuan= array();
$dataGiaThanh= array();
$dataDoanhThuThuanSP= array();
$PPphanbo = 1;// Theo doanh thu thực hiện

$LoaiPB= $_GET['LoaiPB'];
$tungay = $_GET['tungay'];

$denngay = $_GET['denngay'];

$xoabuttoanps = $_GET['xoabuttoanps'];

$phuongphapphanbo = $_GET['phuongphapphanbo'];

$theobophan = "0001";

$theonoidung = "ALL";

if ($theobophan == '0001') {
    $sql_mabp = " and mabp!='0001'";
    $sql_mabp1 = " and makho!='0001'";
} else {
    $chuoimactsp_re = substr($OBJMACT->loadMaKHALL_TraVeChuoiMaCTSP($theobophan), 0, -1);
    $mactsp_string = str_replace(",", "','", $chuoimactsp_re);
    $sql_mabp = " and mabp in ('" . $mactsp_string . "')";
    $sql_mabp1 = " and makho in ('" . $mactsp_string . "')";
}

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;

$str_w = "";
$str_w2 = "";

$dodangdauky = $OBJCT->load_danhsach_dodang_dk("SP");// Lấy đầu kỳ dỡ dang


$str_w2 = " and ngayghiso >='" . $tungay . "' and ngayghiso<='" . $denngay . "'  " . $sql_mabp1;
$OBJCT->setStrOderby2($str_w2);
$str_w = " and ngayghiso >='" . $tungay . "' and ngayghiso<= '" . $denngay . "'  " . $sql_mabp;
$OBJCT->setStrOderby($str_w);
//// Lấy danh sách Nguyên Liệu
$matk = "621";
$dataNguyenLieu = $OBJCT->load_danhsach_no_co_theocongtrinh($matk, $theonoidung, $sapxep);// lấy tất cả thu chi

//// Lấy danh sách Nhân Công
$matk = "622";
$dataNhancong = $OBJCT->load_danhsach_no_co_theocongtrinh($matk, $theonoidung, $sapxep);// lấy tất cả thu chi
//// Lấy danh sách Máy
$matk = $matk_623;
$dataMay = $OBJCT->load_danhsach_no_co_theocongtrinh($matk, $theonoidung, $sapxep);// lấy tất cả thu chi
$dataMay_KhongGop_MaCT = $OBJCT->load_danhsach_no_co_theocongtrinh_khonggop_mact($matk, $theonoidung, $sapxep);// lấy tất cả CP 623 Nhưng KHÔNG gồm toàn bộ và KHÔNG cộng gộp vào mã SP/CT

//// Lấy danh sách chi phí Chung
$matk = $matk_627;
$dataCPSXC = $OBJCT->load_danhsach_no_co_theocongtrinh($matk, $theonoidung, $sapxep);// lấy tất cả CP 627 Nhưng KHÔNG gồm toàn bộ và cộng gộp vào mã SP/CT
$dataCPSXC_KhongGop_MaCT = $OBJCT->load_danhsach_no_co_theocongtrinh_khonggop_mact($matk, $theonoidung, $sapxep);// lấy tất cả CP 627 Nhưng KHÔNG gồm toàn bộ và KHÔNG cộng gộp vào mã SP/CT
$ListCT = ($dataNguyenLieu+$dataNhancong+$dataMay+$dataCPSXC);
//// Lấy danh sách giá thành
$matk = "632";
$dataGiaThanh = $OBJCT->load_danhsach_no_co_theocongtrinh_giathanh($matk, $theonoidung, "154");// lấy tất cả thu chi

// Phân bổ Tổng Sản Phẩm
if ($phuongphapphanbo == "doanhthuthuchien") {
    $dataDoanhThuThuan = $OBJCT->load_danhsach_doanhthuthuchien_theotungcongtrinh();// lấy tất cả thu chi
    $dataDoanhThuThuanSP = $dataDoanhThuThuan;
    $TongDoanhThuThuanSP = 0;
    foreach ($dataDoanhThuThuan as $itemTongDT) {
        if ($itemTongDT['loaisp'] == "SP") {
            $TongDoanhThuThuanSP += ($itemTongDT['tienco'] - $itemTongDT['tienno']);
        }
    }
} else if ($phuongphapphanbo == "doanhthuthuan") {
    $dataDoanhThuThuan = $OBJCT->load_danhsach_doanhthuthuchien_theotungcongtrinh();// lấy tất cả thu chi
    $TongDoanhThuThuanSP = 0;
    foreach ($dataDoanhThuThuan as $itemTongDT) {
        if ($itemTongDT['loaisp'] == "SP") {
            $TongDoanhThuThuanSP += ($itemTongDT['tienco'] - $itemTongDT['tienno']);
        }
    }
    $dataDoanhThuThuanSP = $OBJCT->load_danhsach_doanhthuan_theosanpham($tungay, $denngay);// lấy tất cả thu chi

    $TongDoanhThuThuanSP = 0;// Bổ sung vào ngày 09-10-2024
    foreach ($dataDoanhThuThuanSP as $itemTongDTSP) {
        if ($itemTongDTSP['loaisp'] == "SP") {
            $TongDoanhThuThuanSP += ($itemTongDTSP['tienco']);
        }
    }
    debug($dataDoanhThuThuanSP);
} else if ($phuongphapphanbo == "nguyenvatlieu") {
    $dataDoanhThuThuan = $OBJCT->load_danhsach_doanhthuthuchien_theotungcongtrinh();// lấy tất cả thu chi
    $TongDoanhThuThuanSP = 0;
    foreach ($dataDoanhThuThuan as $itemTongDT) {
        if ($itemTongDT['loaisp'] == "SP") {
            $TongDoanhThuThuanSP += ($itemTongDT['tienco'] - $itemTongDT['tienno']);
        }
    }

    $str_w2 = " and ngayghiso >='" . $tungay . "' and ngayghiso<='" . $denngay . "' and psvt.loaisp!='' ";
    $OBJCT->setStrOderby2($str_w2);
    $str_w = " and ngayghiso >='" . $tungay . "' and ngayghiso<= '" . $denngay . "'  and mabp!='' and loaisp!='' ";
    $OBJCT->setStrOderby($str_w);

    $matk = "621";
    $dataDoanhThuThuanSP = $OBJCT->load_danhsach_no_co_theocongtrinh($matk, $theonoidung, $sapxep);// lấy tất cả thu chi
    $TongDoanhThuThuanSP = 0;// Bổ sung vào ngày 09-10-2024
    foreach ($dataDoanhThuThuanSP as $kSP => $itemTongDTSP) {
        if ($itemTongDTSP['loaisp'] == "SP") {
            $TongDoanhThuThuanSP += ($itemTongDTSP['tienno']);
        }
        $dataDoanhThuThuanSP[$kSP]['tienco'] = $itemTongDTSP['tienno'];// Chuyển tiền có về tiền nợ vì doanh thu chỉ nằm bên có
        $dataDoanhThuThuanSP[$kSP]['tienno'] = 0;
    }

} else if ($phuongphapphanbo == "nhancong") {
    $dataDoanhThuThuan = $OBJCT->load_danhsach_doanhthuthuchien_theotungcongtrinh();// lấy tất cả thu chi
    $TongDoanhThuThuanSP = 0;
    foreach ($dataDoanhThuThuan as $itemTongDT) {
        if ($itemTongDT['loaisp'] == "SP") {
            $TongDoanhThuThuanSP += ($itemTongDT['tienco'] - $itemTongDT['tienno']);
        }
    }

    $str_w2 = " and ngayghiso >='" . $tungay . "' and ngayghiso<='" . $denngay . "' and psvt.loaisp!='' ";
    $OBJCT->setStrOderby2($str_w2);
    $str_w = " and ngayghiso >='" . $tungay . "' and ngayghiso<= '" . $denngay . "'  and mabp!='' and loaisp!='' ";
    $OBJCT->setStrOderby($str_w);

    //// Lấy danh sách danh thu thuần
    $matk = "622";
    $dataDoanhThuThuanSP = $OBJCT->load_danhsach_no_co_theocongtrinh($matk, $theonoidung, $sapxep);// lấy tất cả thu chi

    $TongDoanhThuThuanSP = 0;// Bổ sung vào ngày 09-10-2024
    foreach ($dataDoanhThuThuanSP as $kSP => $itemTongDTSP) {
        if ($itemTongDTSP['loaisp'] == "SP") {
            $TongDoanhThuThuanSP += ($itemTongDTSP['tienno']);
        }
        $dataDoanhThuThuanSP[$kSP]['tienco'] = $itemTongDTSP['tienno'];// Chuyển tiền có về tiền nợ vì doanh thu chỉ nằm bên có
        $dataDoanhThuThuanSP[$kSP]['tienno'] = 0;
    }

}

//// Lấy danh sách chi phí sx chung tổng
$str_w2 = " and ngayghiso >='" . $tungay . "' and ngayghiso<='" . $denngay . "' and makho='0001' ";
$OBJCT->setStrOderby2($str_w2);
$str_w = " and ngayghiso >='" . $tungay . "' and ngayghiso<= '" . $denngay . "'  and mabp='0001' ";
$OBJCT->setStrOderby($str_w);

$matk = $matk_627;
$dataCPSXCTong = $OBJCT->load_danhsach_no_co_CPSXChungToanBo($matk, $theonoidung, $sapxep);// lấy tất cả thu chi

$matk = $matk_623;
$dataCPNCTong = $OBJCT->load_danhsach_no_co_CPSXChungToanBo($matk, $theonoidung, $sapxep);// lấy tất cả thu chi

$matk = "622";
$dataCPNC622Tong = $OBJCT->load_danhsach_no_co_CPSXChungToanBo($matk, $theonoidung, $sapxep);// lấy tất cả thu chi

$TongCPSXCTong = 0;
$TongCPSXSPTong = 0;
$TongCPSXCSPTong_001 = 0;
foreach ($dataCPSXCTong as $itemTongCPSXCTong) {
    if ($itemTongCPSXCTong['loaisp'] == "SP") {
        $TongCPSXSPTong += ($itemTongCPSXCTong['tienno']);
        $TongCPSXCTong_SPTheoTK627[$itemTongCPSXCTong['tk']] += $itemTongCPSXCTong['tienno'];
        if($itemTongCPSXCTong['mabp']=='0001'){
            $TongCPSXCSPTong_001+=($itemTongCPSXCTong['tienno']);
        }
    }
}
/////lẤY TỔNG CPSXCHUNG (CÓ CẤP 1 CÔNG TRÌNH VÀ TOÀN BỘ)

$CTCAP1 = $OBJMACT->loadDSSPCap1_CT(0);
$STR_CTCAP1_ARR = $CTCAP1;
$STR_CTCAP1_ARR['0001']= '0001';
$STR_CTCAP1 =implode("','",$STR_CTCAP1_ARR);
$str_w2 = " and ngayghiso >='" . $tungay . "' and ngayghiso<='" . $denngay . "' and makho in('".$STR_CTCAP1."') ";
$OBJCT->setStrOderby2($str_w2);
$str_w = " and ngayghiso >='" . $tungay . "' and ngayghiso<= '" . $denngay . "'  and mabp in('".$STR_CTCAP1."') ";
$OBJCT->setStrOderby($str_w);

$matk = $matk_627;
$dataCPSXCTong_0001_CTCAP1 = $OBJCT->load_danhsach_no_co_CPSXChungToanBo($matk, $theonoidung, $sapxep);// lấy tất cả thu chi

$matk = $matk_623;
$dataCPMayTong_0001_CTCAP1 = $OBJCT->load_danhsach_no_co_CPSXChungToanBo($matk, $theonoidung, $sapxep);// lấy tất cả thu chi

//debug($dataCPSXCTong_0001_CTCAP1);
//// Lấy danh sách chi phí sx chung tổng
$TongCPNCCTTong = 0;
$TongCPNCPSPTong = 0;
foreach ($dataCPNCTong as $itemTongCPNCTong) {
    if ($itemTongCPNCTong['loaisp'] == "SP"){
        $TongCPNCPSPTong += ($itemTongCPNCTong['tienno']);
        $TongCPNCCTTong_SPTheoTK623[$itemTongCPNCTong['tk']] += $itemTongCPNCTong['tienno'];
    }
}

$TongCPNC622CTTong = 0;
$TongCPNCP622SPTong = 0;
$TongCPNC622SPTong_001 = 0;

foreach ($dataCPNC622Tong as $itemTongCPNC622Tong) {
    if ($itemTongCPNC622Tong['loaisp'] == "SP") {
        $TongCPNCP622SPTong += ($itemTongCPNC622Tong['tienno']);// Tổng nhân công cho toán bộ sản phẩm
        if($TongCPNCP622SPTong['mabp']=='0001'){
            $TongCPNC622SPTong_001+=($itemTongCPNC622Tong['tienno']);// Tổng nhân công cho toán bộ sản phẩm
        }
    }
}
//debug($TongCPNCP622SPTong);
////---- Phân bổ chi phí sản xuất chung cho từng phân xưởng
/// //PHÂN BỔ CHO SẢN PHẨM CẤP 1
///
$SPCAP1 = $OBJMACT->loadDSSPCap1(0);

foreach ($SPCAP1 as $KMASP => $item) {// Duyệt tất cả sản phẩm cấp cao nhất
    $DSSPCONCAP1 = substr($OBJMACT->loadMaKHALL_TraVeChuoiMaCTSP($KMASP), 0, -1);// Lấy tất cả danh sách cấp 1
    $DSSPCONCAP1_ARRAY = explode(",", $DSSPCONCAP1);
    $TongDoanhThuThuanCap1 = 0;/// Là Tổng NVL Hoặc NC tùy theo lựa chọn phân bổ SXC
    $TongTienCPSXChungCap1 = $dataCPSXC[$KMASP]['tienno'];

    foreach ($DSSPCONCAP1_ARRAY as $ItemCap1) {
        $TongDoanhThuThuanCap1 += $dataDoanhThuThuanSP[$ItemCap1]['tienco'];
    }

    $HeSoPhanBo = $TongTienCPSXChungCap1 / $TongDoanhThuThuanCap1;
    $MaSPLuu = "";
    $TongTienDaPhanBoCap1 = 0;
    foreach ($DSSPCONCAP1_ARRAY as $ItemCap1) {
        $SoTienPhanBoChoTungSPCap1 = round($HeSoPhanBo * $dataDoanhThuThuanSP[$ItemCap1]['tienco']);
        $SoTienPhanBoCap1[$ItemCap1] = $SoTienPhanBoChoTungSPCap1;
        $TongTienDaPhanBoCap1 += $SoTienPhanBoChoTungSPCap1;
        if ($SoTienPhanBoCap1[$ItemCap1] != 0) {
            $MaSPLuu = $ItemCap1;
        }
        //$TongCPSXCTong_SPTheoTK627[$dataCPSXC[$KMASP]['tk']] += $SoTienPhanBoChoTungSPCap1;// Thêm vào ngày 03/03/2025
    }

    $TienChenLechGiuaTongPhanBoVaTongDaPhanBo = $TongTienCPSXChungCap1 - $TongTienDaPhanBoCap1;
    if ($TienChenLechGiuaTongPhanBoVaTongDaPhanBo != 0) {
        $SoTienPhanBoCap1[$MaSPLuu] = $SoTienPhanBoCap1[$MaSPLuu] + $TienChenLechGiuaTongPhanBoVaTongDaPhanBo;
        //$TongCPSXCTong_SPTheoTK627[$dataCPSXC[$KMASP]['tk']] += $TienChenLechGiuaTongPhanBoVaTongDaPhanBo; // Thêm vào ngày 03/03/2025
    }

    /// //PHÂN BỔ CHO SẢN PHẨM CẤP 2
    $SPCAP2 = $OBJMACT->loadDSSPCap1($KMASP);// Lấy DS SP Cấp 2
    foreach ($SPCAP2 as $KMASP2 => $item2) {
        $DSSPCONCAP2 = substr($OBJMACT->loadMaKHALL_TraVeChuoiMaCTSP($KMASP2), 0, -1);
        $DSSPCONCAP2_ARRAY = explode(",", $DSSPCONCAP2);
        $TongDoanhThuThuanCap2 = 0;/// Là Tổng NVL Hoặc NC tùy theo lựa chọn phân bổ SXC
        $TongTienCPSXChungCap2 = $dataCPSXC[$KMASP2]['tienno'];

        foreach ($DSSPCONCAP2_ARRAY as $ItemCap2) {
            $TongDoanhThuThuanCap2 += $dataDoanhThuThuanSP[$ItemCap2]['tienco'];
        }
        $HeSoPhanBoCap2 = $TongTienCPSXChungCap2 / $TongDoanhThuThuanCap2;
        $MaSPLuuCap2 = "";
        $TongTienDaPhanBoCap2 = 0;
        foreach ($DSSPCONCAP2_ARRAY as $ItemCap2) {
            $SoTienPhanBoChoTungSPCap2 = round($HeSoPhanBoCap2 * $dataDoanhThuThuanSP[$ItemCap2]['tienco']);
            $SoTienPhanBoCap2[$ItemCap2] = $SoTienPhanBoChoTungSPCap2;
            $TongTienDaPhanBoCap2 += $SoTienPhanBoChoTungSPCap2;
            if ($SoTienPhanBoCap2[$ItemCap2] != 0) {
                $MaSPLuuCap2 = $ItemCap2;
            }
            //$TongCPSXCTong_SPTheoTK627[$dataCPSXC[$KMASP2]['tk']] += $SoTienPhanBoChoTungSPCap2;// Thêm vào ngày 03/03/2025
        }
        $TienChenLechGiuaTongPhanBoVaTongDaPhanBoCap2 = $TongTienCPSXChungCap2 - $TongTienDaPhanBoCap2;
        if ($TienChenLechGiuaTongPhanBoVaTongDaPhanBoCap2 != 0) {
            $SoTienPhanBoCap2[$MaSPLuuCap2] = $SoTienPhanBoCap2[$MaSPLuuCap2] + $TienChenLechGiuaTongPhanBoVaTongDaPhanBoCap2;
           //$TongCPSXCTong_SPTheoTK627[$dataCPSXC[$KMASP2]['tk']] += $TienChenLechGiuaTongPhanBoVaTongDaPhanBoCap2;// Thêm vào ngày 03/03/2025
        }
        // echo $TongDoanhThuThuanCap1;//
    }
/// KẾT THÚC PHÂN BỔ CHO SẢN PHẨM CẤP 2
///
}
/// KẾT THÚC PHÂN BỔ CHO SẢN PHẨM CẤP 1

////---- Phân bổ chi phí sản xuất chung cho công trình con khi nhập phiếu chọn công trình cha
/// //PHÂN BỔ CHO SẢN PHẨM CẤP 1

foreach ($CTCAP1 as $KMACT => $item) {// Duyệt tất cả sản phẩm cấp cao nhất
    $DSCTCONCAP1 = substr($OBJMACT->loadMaKHALL_TraVeChuoiMaCTSP($KMACT), 0, -1);// Lấy tất cả danh sách cấp 1
    $DSCTCONCAP1_ARRAY = explode(",", $DSCTCONCAP1);
    $TongDoanhThuThuanCap1 = 0;/// Là Tổng NVL Hoặc NC tùy theo lựa chọn phân bổ SXC
    $TongTienCPSXChungCTCap1 = $dataCPSXC[$KMACT]['tienno'];
    foreach ($DSCTCONCAP1_ARRAY as $ItemCap1) {
        $TongDoanhThuThuanCap1 += $dataDoanhThuThuanSP[$ItemCap1]['tienco'];
    }
    $HeSoPhanBo = $TongTienCPSXChungCTCap1 / $TongDoanhThuThuanCap1;
    $MaSPLuu = "";
    $TongTienDaPhanBoCap1 = 0;
    foreach ($DSCTCONCAP1_ARRAY as $ItemCap1) {
        $SoTienPhanBoChoTungSPCap1 = round($HeSoPhanBo * $dataDoanhThuThuanSP[$ItemCap1]['tienco']);
        $SoTienPhanBo627CTCap1[$ItemCap1] = $SoTienPhanBoChoTungSPCap1;
        $TongTienDaPhanBoCap1 += $SoTienPhanBoChoTungSPCap1;
        if ($SoTienPhanBo627CTCap1[$ItemCap1] != 0) {
            $MaSPLuu = $ItemCap1;
        }
    }
    $TienChenLechGiuaTongPhanBoVaTongDaPhanBo = $TongTienCPSXChungCTCap1 - $TongTienDaPhanBoCap1;
    if ($TienChenLechGiuaTongPhanBoVaTongDaPhanBo != 0) {
        $SoTienPhanBo627CTCap1[$MaSPLuu] = $SoTienPhanBo627CTCap1[$MaSPLuu] + $TienChenLechGiuaTongPhanBoVaTongDaPhanBo;
    }

/// KẾT THÚC PHÂN BỔ CHO SẢN PHẨM CẤP 2
///
}

foreach ($CTCAP1 as $KMACT => $item) {// Duyệt tất cả sản phẩm cấp cao nhất
    $DSCTCONCAP1 = substr($OBJMACT->loadMaKHALL_TraVeChuoiMaCTSP($KMACT), 0, -1);// Lấy tất cả danh sách cấp 1
    $DSCTCONCAP1_ARRAY = explode(",", $DSCTCONCAP1);
    $TongDoanhThuThuanCap1 = 0;/// Là Tổng NVL Hoặc NC tùy theo lựa chọn phân bổ SXC
    $TongTienCPMayCTCap1 = $dataMay[$KMACT]['tienno'];
    foreach ($DSCTCONCAP1_ARRAY as $ItemCap1) {
        $TongDoanhThuThuanCap1 += $dataDoanhThuThuanSP[$ItemCap1]['tienco'];
    }
    $HeSoPhanBo = $TongTienCPMayCTCap1 / $TongDoanhThuThuanCap1;
    $MaSPLuu = "";
    $TongTienDaPhanBoCap1 = 0;
    foreach ($DSCTCONCAP1_ARRAY as $ItemCap1) {
        $SoTienPhanBoChoTungSPCap1 = round($HeSoPhanBo * $dataDoanhThuThuanSP[$ItemCap1]['tienco']);
        $SoTienPhanBo623CTCap1[$ItemCap1] = $SoTienPhanBoChoTungSPCap1;
        $TongTienDaPhanBoCap1 += $SoTienPhanBoChoTungSPCap1;
        if ($SoTienPhanBo623CTCap1[$ItemCap1] != 0) {
            $MaSPLuu = $ItemCap1;
        }
    }
    $TienChenLechGiuaTongPhanBoVaTongDaPhanBo = $TongTienCPMayCTCap1 - $TongTienDaPhanBoCap1;
    if ($TienChenLechGiuaTongPhanBoVaTongDaPhanBo != 0) {
        $SoTienPhanBo623CTCap1[$MaSPLuu] = $SoTienPhanBo623CTCap1[$MaSPLuu] + $TienChenLechGiuaTongPhanBoVaTongDaPhanBo;
    }

/// KẾT THÚC PHÂN BỔ CHO SẢN PHẨM CẤP 2
///
}

foreach ($CTCAP1 as $KMACT => $item) {// Duyệt tất cả sản phẩm cấp cao nhất
    $DSCTCONCAP1 = substr($OBJMACT->loadMaKHALL_TraVeChuoiMaCTSP($KMACT), 0, -1);// Lấy tất cả danh sách cấp 1
    $DSCTCONCAP1_ARRAY = explode(",", $DSCTCONCAP1);
    $TongDoanhThuThuanCap1 = 0;/// Là Tổng NVL Hoặc NC tùy theo lựa chọn phân bổ SXC
    $TongTienCPNCCTCap1 = $dataNhancong[$KMACT]['tienno'];
    foreach ($DSCTCONCAP1_ARRAY as $ItemCap1) {
        $TongDoanhThuThuanCap1 += $dataDoanhThuThuanSP[$ItemCap1]['tienco'];
    }
    $HeSoPhanBo = $TongTienCPNCCTCap1 / $TongDoanhThuThuanCap1;
    $MaSPLuu = "";
    $TongTienDaPhanBoCap1 = 0;
    foreach ($DSCTCONCAP1_ARRAY as $ItemCap1) {
        $SoTienPhanBoChoTungSPCap1 = round($HeSoPhanBo * $dataDoanhThuThuanSP[$ItemCap1]['tienco']);
        $SoTienPhanBo622CTCap1[$ItemCap1] = $SoTienPhanBoChoTungSPCap1;
        $TongTienDaPhanBoCap1 += $SoTienPhanBoChoTungSPCap1;
        if ($SoTienPhanBo622CTCap1[$ItemCap1] != 0) {
            $MaSPLuu = $ItemCap1;
        }
    }
    $TienChenLechGiuaTongPhanBoVaTongDaPhanBo = $TongTienCPNCCTCap1 - $TongTienDaPhanBoCap1;
    if ($TienChenLechGiuaTongPhanBoVaTongDaPhanBo != 0) {
        $SoTienPhanBo622CTCap1[$MaSPLuu] = $SoTienPhanBo622CTCap1[$MaSPLuu] + $TienChenLechGiuaTongPhanBoVaTongDaPhanBo;
    }

/// KẾT THÚC PHÂN BỔ CHO SẢN PHẨM CẤP 2
///
}

/// KẾT THÚC PHÂN BỔ CHO SẢN PHẨM CẤP 1

//echo $TongTienCPSXChungCap2;

$DataNCTieuChuan = $OBJMACT->LoadDSNhanCongTieuChuan();
$DataCPSXCTieuChuan = $OBJMACT->LoadDSChiPhiSXCTieuChuan();
$DataMayTieuChuan = $OBJMACT->LoadDSMayTieuChuan();

$ListCT = array_merge($dodangdauky,$dataNguyenLieu,$dataNhancong,$dataMay,$dataCPSXC,$dataDoanhThuThuan,$dataGiaThanh,$dataDoanhThuThuanSP);

$TinhCPChuaPhanCap = $OBJCT->load_danhsach_congtrinh_dodang_chuaphancap($ListCT, $dodangdauky, $dataNguyenLieu, $dataNhancong, $dataMay, $dataCPSXC, $dataDoanhThuThuan, $TongDoanhThuThuan, $TongCPSXCTong, $dataGiaThanh, $TongCPSXSPTong, $TongDoanhThuThuanSP, $dataDoanhThuThuanSP, $dataCPNCTong, $TongCPNCCTTong, $TongCPNCPSPTong, $TongCPNC622CTTong, $TongCPNCP622SPTong,$SoTienPhanBoCap1,$SoTienPhanBoCap2,$SoTienPhanBo627CTCap1,$SoTienPhanBo623CTCap1,$SoTienPhanBo622CTCap1);

foreach($dataCPSXC_KhongGop_MaCT as $itemCPSXC_KhongGop_MaCT){ //Thêm vào ngày 03/03/2025
    foreach($itemCPSXC_KhongGop_MaCT as $itemTam627){
        $Tong627_Tam = ($itemTam627['tienno']- $itemTam627['tienco']);
        if($itemTam627['loaisp'] =="SP" && $Tong627_Tam!=0){
            $TongCPSXCTong_SPTheoTK627[$itemTam627['tk']] +=$Tong627_Tam;// Thêm vào ngày 03/03/2025
        }
    }
}

//// Thêm bút toán phát sinh tự động

$sql_emp_pskt = "delete from pskt where loaiphieu='0'";
$OBJCT->re_query($sql_emp_pskt);

$sql_emp_chitiet_pskt = "delete from chitiet_pskt where loaiphieu='0'";
$OBJCT->re_query($sql_emp_chitiet_pskt);


$sql_emp_pskt = "delete from pskt where loaiphieu='95'";
$OBJCT->re_query($sql_emp_pskt);

$sql_emp_chitiet_pskt = "delete from chitiet_pskt where loaiphieu='95'";
$OBJCT->re_query($sql_emp_chitiet_pskt);

$sophieu = $OBJPSKT->createSoPhieu();

foreach ($TinhCPChuaPhanCap as $kmact => $itemChuaPhanCap) {
    $LoaiPhieu = 77;
    if($itemChuaPhanCap['loaisp'] == "SP"){
        $LoaiPhieu = 95;//// Loại Phiếu nhân công SP phân bổ không xoá, Không hiện trong bảng sổ cái, cđtk
    }
    $value_pskt .= "('" . ($sophieu) . "',1,'" . $denngay . "','154','{$LoaiPhieu}','" . abs($itemChuaPhanCap['sotiennc622pb']) . "','{$LoaiPhieu}'),";
    $value_chitiet_pskt .= "(1,'" . $denngay . "','" . abs($itemChuaPhanCap['sotiennc622pb']) . "','','" . $kmact . "','" . $itemChuaPhanCap['tenct'] . "','100094','Phân bổ chi phí nhân công Mã CT/SP:{$kmact}','','','622','','" . abs($itemChuaPhanCap['sotiennc622pb']) . "','4','{$LoaiPhieu}','" . ($sophieu) . "','77','" . $itemChuaPhanCap['loaisp'] . "'),";
    if ($itemChuaPhanCap['loaisp'] == "CT") {// Công trình
        $tongtiencpmayspdaphanbo = 0;
        $tongsotienmaypbcuasp = $itemChuaPhanCap['sotienncpb'];
        foreach ($TongCPNCCTTong_CTTheoTK623 as $kmatk => $item_CTTheoTK623) {
            if ($item_CTTheoTK623 != 0) {
                $tongtencamay = 0;
                $tmp = 0;
                $tmp = $item_CTTheoTK623 - $tongsotienmaypbcuasp;
                if ($tmp > 0) {
                    if ($tongtiencpmayspdaphanbo < abs($itemChuaPhanCap['sotienncpb'])) {/// nếu mà số đã phân bổ còn nhỏ hơn tổng thì phân bổ hết
                        $tongtencamay = $tongsotienmaypbcuasp;
                        $TongCPNCCTTong_CTTheoTK623[$kmatk] = $tmp;
                        $tongsotienmaypbcuasp = 0;
                    }
                } else {
                    if ($tongtiencpmayspdaphanbo < abs($itemChuaPhanCap['sotienncpb'])) {
                        $tongtencamay = abs($item_CTTheoTK623);
                        $TongCPNCCTTong_CTTheoTK623[$kmatk] = 0;
                        $tongsotienmaypbcuasp -= $tongtencamay;
                    }
                }
                $tongtiencpmayspdaphanbo += $tongtencamay;
                $sophieu++;
                $value_pskt .= "('" . $sophieu . "'," . 2 . ",'" . $denngay . "','154','77','" . abs($tongtencamay) . "','77'),";
                $value_chitiet_pskt .= "(" . 2 . ",'" . $denngay . "','" . abs($tongtencamay) . "','','" . $kmact . "','" . $itemChuaPhanCap['tenct'] . "','100094','Phân bổ chi phí ca máy Mã CT/SP:{$kmact}','','','" . $kmatk . "','','" . abs($tongtencamay) . "','4','77','" . $sophieu . "','77','" . $itemChuaPhanCap['loaisp'] . "'),";
            }
        }

        $tongtiencpsxcspdaphanbo = 0;
        $tongsotiencpsxcpbcuasp = $itemChuaPhanCap['sotiencpsxcpb'];

        foreach ($TongCPSXCTong_CTTheoTK627 as $kmatk => $item_CTTheoTK627) {
            if ($item_CTTheoTK627 != 0) {
                $tongtenxpsxc = 0;
                $tmp = 0;
                $tmp = $item_CTTheoTK627 - $tongsotiencpsxcpbcuasp;
                if ($tmp > 0) {
                    if ($tongtiencpsxcspdaphanbo < abs($itemChuaPhanCap['sotiencpsxcpb'])) {/// nếu mà số đã phân bổ còn nhỏ hơn tổng thì phân bổ hết
                        $tongtenxpsxc = $tongsotiencpsxcpbcuasp;
                        $tongsotiencpsxcpbcuasp = 0;
                        $TongCPSXCTong_CTTheoTK627[$kmatk] = $tmp;
                    }
                } else {
                    if ($tongtiencpsxcspdaphanbo < abs($itemChuaPhanCap['sotiencpsxcpb'])) {
                        $tongtenxpsxc = abs($item_CTTheoTK627);
                        $tongsotiencpsxcpbcuasp -= $tongtenxpsxc;
                        $TongCPSXCTong_CTTheoTK627[$kmatk] = 0;
                    }
                }

                $sophieu++;
                $value_pskt .= "('" . $sophieu . "'," . 3 . ",'" . $denngay . "','154','77','" . abs($tongtenxpsxc) . "','77'),";
                $value_chitiet_pskt .= "(" . 3 . ",'" . $denngay . "','" . abs($tongtenxpsxc) . "','','" . $kmact . "','" . $itemChuaPhanCap['tenct'] . "','100094','Phân bổ chi phí sản xuất chung Mã CT/SP:{$kmact}','','','" . $kmatk . "','','" . abs($tongtenxpsxc) . "','4','77','" . $sophieu . "','77','" . $itemChuaPhanCap['loaisp'] . "'),";
            }
        }
    } else if ($itemChuaPhanCap['loaisp'] == "SP") {// Sản phẩm
        $loaiphieu =0;
        $tongtiencpmayspdaphanbo = 0;
        $tongsotienmaypbcuasp = $itemChuaPhanCap['sotienncpb'];
        foreach ($TongCPNCCTTong_SPTheoTK623 as $kmatk => $item_CTTheoTK623) {
            if(array_sum($DataMayTieuChuan)==0){
                //$loaiphieu=77;
            }
            if ($item_CTTheoTK623 != 0) {
                $tongtencamay = 0;
                $tmp = 0;
                $tmp = $item_CTTheoTK623 - $tongsotienmaypbcuasp;
                if ($tmp > 0) {
                    if ($tongtiencpmayspdaphanbo < abs($itemChuaPhanCap['sotienncpb'])) {/// nếu mà số đã phân bổ còn nhỏ hơn tổng thì phân bổ hết
                        $tongtencamay = $tongsotienmaypbcuasp;
                        $TongCPNCCTTong_SPTheoTK623[$kmatk] = $tmp;
                        $tongsotienmaypbcuasp = 0;
                    }
                } else {
                    if ($tongtiencpmayspdaphanbo < abs($itemChuaPhanCap['sotienncpb'])) {
                        $tongtencamay = abs($item_CTTheoTK623);
                        $TongCPNCCTTong_SPTheoTK623[$kmatk] = 0;
                        $tongsotienmaypbcuasp -= $tongtencamay;
                    }
                }
                $tongtiencpmayspdaphanbo += $tongtencamay;

                $sophieu++;
                $value_pskt .= "('" . $sophieu . "'," . 2 . ",'" . $denngay . "','154','{$loaiphieu}','" . abs($tongtencamay) . "','{$loaiphieu}'),";
                $value_chitiet_pskt .= "(" . 2 . ",'" . $denngay . "','" . abs($tongtencamay) . "','','" . $kmact . "','" . $itemChuaPhanCap['tenct'] . "','100094','Phân bổ chi phí ca máy Mã CT/SP:{$kmact}','','','" . $kmatk . "','','" . abs($tongtencamay) . "','4','{$loaiphieu}','" . $sophieu . "','{$loaiphieu}','" . $itemChuaPhanCap['loaisp'] . "'),";
            }
        }
        $tongtiencpsxcspdaphanbo = 0;
        $tongsotiencpsxcpbcuasp = $itemChuaPhanCap['sotiencpsxcpb']+ $itemChuaPhanCap['sotienpbcpsxccap1']+$itemChuaPhanCap['sotienpbcpsxccap2'];
        foreach ($TongCPSXCTong_SPTheoTK627 as $kmatk => $item_CTTheoTK627) {
            if(array_sum($DataCPSXCTieuChuan)==0){
                //$loaiphieu=77;
            }
            if ($item_CTTheoTK627 != 0) {
                $tongtenxpsxc = 0;
                $tmp = 0;
                $sotiencpsxcpb = $itemChuaPhanCap['sotiencpsxcpb']+ $itemChuaPhanCap['sotienpbcpsxccap1']+$itemChuaPhanCap['sotienpbcpsxccap2'];
                $tmp = $item_CTTheoTK627 - $tongsotiencpsxcpbcuasp;
                if ($tmp > 0) {
                    if ($tongtiencpsxcspdaphanbo < abs($sotiencpsxcpb)) {/// nếu mà số đã phân bổ còn nhỏ hơn tổng thì phân bổ hết
                        $tongtenxpsxc = $tongsotiencpsxcpbcuasp;
                        $tongsotiencpsxcpbcuasp = 0;
                        $TongCPSXCTong_SPTheoTK627[$kmatk] = $tmp;
                    }
                } else {
                    if ($tongtiencpsxcspdaphanbo < abs($sotiencpsxcpb)) {
                        $tongtenxpsxc = abs($item_CTTheoTK627);
                        $tongsotiencpsxcpbcuasp -= $tongtenxpsxc;
                        $TongCPSXCTong_SPTheoTK627[$kmatk] = 0;
                    }
                }
                $tongtiencpsxcspdaphanbo += $tongtenxpsxc;
                $sophieu++;
                $value_pskt .= "('" . $sophieu . "'," . 3 . ",'" . $denngay . "','154','{$loaiphieu}','" . abs($tongtenxpsxc) . "','{$loaiphieu}'),";
                $value_chitiet_pskt .= "(" . 3 . ",'" . $denngay . "','" . abs($tongtenxpsxc) . "','','" . $kmact . "','" . $itemChuaPhanCap['tenct'] . "','100094','Phân bổ chi phí sãn xuất chung Mã CT/SP:{$kmact}','','','" . $kmatk . "','','" . abs($tongtenxpsxc) . "','4','{$loaiphieu}','" . $sophieu . "','{$loaiphieu}','" . $itemChuaPhanCap['loaisp'] . "'),";
            }
        }
    }

    $sophieu += 4;
}

$sql_pskt = "insert into pskt(sophieu,mapskt,ngayghiso,tkco,loaiphieu,tongcong,btps) VALUE " . substr($value_pskt, 0, -1);
$sql_chitiet_pskt = "insert into chitiet_pskt(mapskt,ngayhoadon,gtvnd1,gtvnd2,mabp,bophan,mand1,noidung1,mand2,noidung2,tkno1,tkno2,tongtien,maloai,loaiphieu,sophieu,btps,loaisp) VALUE " . substr($value_chitiet_pskt, 0, -1);

if ($xoabuttoanps != "true") {
    $OBJCT->re_query($sql_pskt);
    $OBJCT->re_query($sql_chitiet_pskt);
}

/// Lấy giá trị tài khoản con 623,627 đưa vào bảng tạm
$OBJCT->re_query("CREATE TABLE `tmp_taikhoanchung_623_627_phanbo` ( `sott` INT NOT NULL AUTO_INCREMENT , `matk` CHAR(10) NOT NULL , `sotien` BIGINT NOT NULL , `ghichu` TEXT NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
$OBJCT->re_query("ALTER TABLE `tmp_taikhoanchung_623_627_phanbo` ADD `lan` INT(1) NOT NULL DEFAULT '1';");
$OBJCT->re_query("CREATE TABLE `tmp_taikhoanchung_623_627` ( `sott` INT NOT NULL AUTO_INCREMENT , `matk` CHAR(10) NOT NULL , `sotien` BIGINT NOT NULL , `ghichu` TEXT NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
$OBJCT->re_query("ALTER TABLE `tmp_taikhoanchung_623_627` ADD `lan` INT(1) NOT NULL DEFAULT '1';");

$OBJCT->re_query("DELETE FROM tmp_taikhoanchung_623_627_phanbo");

//---------------Thêm tất cả TK 627 liên quan đến SP vào bang tài khoản tạm
$MangTam627_SP = array();
$MangTam623_SP = array();
foreach($dataMay_KhongGop_MaCT as $itemdataMay_KhongGop_MaCT){
	foreach($itemdataMay_KhongGop_MaCT as $itemTam623){
		$Tong623_Tam = ($itemTam623['tienno']-$itemTam623['tienco']);
		if($itemTam623['loaisp'] =="SP" && $Tong623_Tam!=0){
			//$OBJCT->re_query("INSERT INTO tmp_taikhoanchung_623_627_phanbo(sotien,matk) value('".$Tong623_Tam."','".$itemTam623['tk']."')");
		}
	}
}
foreach($dataCPSXC_KhongGop_MaCT as $itemCPSXC_KhongGop_MaCT){
	foreach($itemCPSXC_KhongGop_MaCT as $itemTam627){
		$Tong627_Tam = ($itemTam627['tienno']-$itemTam627['tienco']);
		if($itemTam627['loaisp'] =="SP" && $Tong627_Tam!=0){
			//$OBJCT->re_query("INSERT INTO tmp_taikhoanchung_623_627_phanbo(sotien,matk) value('".($itemTam627['tienno']-$itemTam627['tienco'])."','".$itemTam627['tk']."')");
		}
	}
}
//Bổ sung thêm hàm load_danhsach_no_co_theocongtrinh_khonggop_mact vào lib ketoantonghop
//---------------Kết thúc Thêm tất cả TK 627 liên quan đến SP vào bang tài khoản tạm

$OBJCT->re_query("INSERT INTO tmp_taikhoanchung_623_627_phanbo(sotien,matk)
                    select sum(gtvnd1) tien,tkno1 tk FROM chitiet_pskt WHERE loaiphieu='0' GROUP by tkno1");
//// End Thêm bút toán phát sinh tự động
$dataThemVaoBang = $OBJMACT->loadThemBangTongHop_DoanhThu_ChiPhi_GiaThanhCongTrinh(0, $TinhCPChuaPhanCap,"",$LoaiPB);

$valins = "";
foreach ($dataThemVaoBang as $itemCT) {
    $valins .= "('" . $itemCT['sottxuat'] . "','" . $itemCT['masp'] . "','" . $itemCT['tensp'] . "','" . $itemCT['sotiendk'] . "','" . $itemCT['sotiennl'] . "','" . $itemCT['sotiennc'] . "','" . $itemCT['sotienmay'] . "','" . $itemCT['sotiencpsxc'] . "','" . $itemCT['maspcha'] . "','" . $itemCT['doanhthuthuan'] . "','" . $itemCT['tongcong'] . "','" . $itemCT['sotiencpsxcpb'] . "','" . $itemCT['tylenl'] . "','" . $itemCT['tylenc'] . "','" . $itemCT['tylemay'] . "','" . $itemCT['tylecpsxc'] . "','" . $itemCT['tylecpsxcpb'] . "','" . $itemCT['giathanh'] . "','" . $itemCT['lailo'] . "','" . $itemCT['dodangck'] . "','" . $itemCT['dodangck_'] . "','" . $itemCT['doanhthuhopdong'] . "','" . $itemCT['tylethucte'] . "','" . $itemCT['sotienncpb'] . "','" . $itemCT['sotiennc622pb'] . "','" . $itemCT['sotienpbcpsxccap1'] . "','" . $itemCT['sotienpbcpsxccap2'] . "','" . $itemCT['loaisp'] . "'),";
}

$OBJCT->re_query("ALTER TABLE `bangphanbo_chiphi_sxchung` ADD `sotienpbcpsxccap1` BIGINT NOT NULL, ADD `sotienpbcpsxccap2` BIGINT NOT NULL AFTER `sotienpbcpsxccap1`, ADD `sotienpbnccap1` BIGINT NOT NULL AFTER `sotienpbcpsxccap2`, ADD `sotienpbnccap2` BIGINT NOT NULL AFTER `sotienpbnccap1`;");
$OBJCT->re_query("ALTER TABLE `bangphanbo_chiphi_sxchung` ADD `loaipb` CHAR(2) NOT NULL;");
$OBJCT->re_query("delete from bangphanbo_chiphi_sxchung where loaipb = 'SP'");
$OBJCT->re_query("delete from bangphanbo_chiphi_sxchung where loaipb = ''");
$OBJCT->re_query("insert into bangphanbo_chiphi_sxchung(sottxuat,mact,tenct,dodangdk,sotiennl,sotiennc,sotienmay,sotiencpsxc,mactcha,doanhthuthuan,tongcong,sotiencpsxcpb,tylenl,tylenc,tylemay,tylecpsxc,tylecpsxcpb,giathanh,lailo,dodangck,dodangck_,doanhthuhopdong,tylethucte,sotienncpb,sotiennc622pb,sotienpbcpsxccap1,sotienpbcpsxccap2,loaipb) VALUES " . substr($valins, 0, -1));
