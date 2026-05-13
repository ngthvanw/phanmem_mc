<?php
include("../../config.php");

$OBJCT = new ketoantonghop();
$OBJHTTK = new hethongtaikhoan();
$OBJMACT = new dmsanpham();
$OBJMANOIDUNG = new manoidung();
$DATA_LISTMABP = $OBJMACT->loadListMaCT_CoKeyLaMa();
$DATA_LISTMAND = $OBJMANOIDUNG->loadListMaNoiDung_CoKeyLaMa();

$tungay = $_GET['tungay'];

$denngay = $_GET['denngay'];
$theobophan = "0001";

$theonoidung = "ALL";
$congdontheosocai = $_GET['congdontheosocai'];
if($theobophan=='0001'){
    $sql_mabp = " and mabp!='0001'";
    $sql_mabp1 = " and makho!='0001'";
}else{
    $chuoimactsp_re = substr($OBJMACT->loadMaKHALL_TraVeChuoiMaCTSP($theobophan),0,-1);
    $mactsp_string = str_replace(",","','",$chuoimactsp_re);
    $sql_mabp = " and mabp in ('".$mactsp_string."')";
    $sql_mabp1 = " and makho in ('".$mactsp_string."')";
}

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;
$intheothuesuat = $_GET['intheothuesuat'];
$intheochungtu= $_GET['intheochungtu'];
$sapxep= $_GET['sapxep'];
$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];
$matk =  $_GET['mavt'];
$str_w="";
$str_w2="";

$dodangdauky = $OBJCT->load_danhsach_dodang_dk();// Lấy đầu kỳ dỡ dang


$str_w2=" and ngayghiso >='".$tungay."' and ngayghiso<='".$denngay."'  ".$sql_mabp1;
$OBJCT->setStrOderby2($str_w2);
$str_w=" and ngayghiso >='".$tungay."' and ngayghiso<= '".$denngay."'  ".$sql_mabp;
$OBJCT->setStrOderby($str_w);

//// Lấy danh sách Nguyên Liệu
$matk = "621";
$dataNguyenLieu = $OBJCT->load_danhsach_no_co_theocongtrinh($matk,$theonoidung,$sapxep);// lấy tất cả thu chi nhập xuất

//// Lấy danh sách Nhân Công
$matk = "622";
$dataNhancong = $OBJCT->load_danhsach_no_co_theocongtrinh($matk,$theonoidung,$sapxep);// lấy tất cả thu chi  nhập xuất

//debug($dataNhancong);

//// Lấy danh sách Máy
$matk = "623";
$dataMay = $OBJCT->load_danhsach_no_co_theocongtrinh($matk,$theonoidung,$sapxep);// lấy tất cả thu chi  nhập xuất

//// Lấy danh sách chi phí xhung
$matk = "627";
$dataCPSXC = $OBJCT->load_danhsach_no_co_theocongtrinh($matk,$theonoidung,$sapxep);// lấy tất cả thu chi  nhập xuất
$ListCT = array_merge($dataNguyenLieu,$dataNhancong,$dataMay,$dataCPSXC);

//// Lấy danh sách danh thu thuần
$matk = "5111,5112,5113";
$dataDoanhThuThuan = $OBJCT->load_danhsach_no_co_theocongtrinh($matk,$theonoidung,$sapxep);// lấy tất cả thu chi  nhập xuất

//// Lấy danh sách chi phí sản xuất chi phí phân bổ
$matk = "627";
$dataCPSXCPB = $OBJCT->load_danhsach_no_co_theocongtrinh_cpsxchungbp($matk,$theonoidung,$sapxep);// lấy tất cả thu chi  nhập xuất

//// Lấy danh sách giá thành
$matk = "632";
$dataGiaThanh = $OBJCT->load_danhsach_no_co_theocongtrinh_giathanh($matk,$theonoidung,"154");// lấy tất cả thu chi nhập xuất

//// Lấy danh sách giá thành tiêu chuẩn
$dataGiaThanhTieuChuan = $OBJCT->load_danhsach_giathanh_tieuchuan();// lấy tất cả thu chi nhập xuất

//// Lấy danh sách chi phí sx chung tổng
$str_w2=" and ngayghiso >='".$tungay."' and ngayghiso<='".$denngay."' and makho!='' ";
$OBJCT->setStrOderby2($str_w2);
$str_w=" and ngayghiso >='".$tungay."' and ngayghiso<= '".$denngay."'  and mabp!='' ";
$OBJCT->setStrOderby($str_w);

$matk = "627";
$dataCPSXCTong = $OBJCT->load_danhsach_no_co_theocongtrinh($matk,$theonoidung,$sapxep);// lấy tất cả thu chi nhập xuất

$ListCT = array_merge($dodangdauky,$dataNguyenLieu,$dataNhancong,$dataMay,$dataCPSXC);

$TongDoanhThuThuan=0;

foreach ($dataDoanhThuThuan as $itemTongDT){
    $TongDoanhThuThuan+=($itemTongDT['tienco']-$itemTongDT['tienno']);// Không sử dụng doanh thu thuần trong tổng hợp giá thành CT
}

$TongCPSXCTong=0;
$TongCPSXSPTong=0;
foreach ($dataCPSXCTong as $itemTongCPSXCTong){
    if($itemTongCPSXCTong['loaisp']=="CT")
        $TongCPSXCTong+=($itemTongCPSXCTong['tienno']-$itemTongCPSXCTong['tienco']);
    if($itemTongCPSXCTong['loaisp']=="SP")
        $TongCPSXSPTong+=($itemTongCPSXCTong['tienno']-$itemTongCPSXCTong['tienco']);
}


$ListCT = array_merge($dodangdauky,$dataNguyenLieu,$dataNhancong,$dataMay,$dataCPSXC,$dataDoanhThuThuan,$dataGiaThanh,$dataCPSXCPB);


$TinhCPChuaPhanCap = $OBJCT->load_danhsach_congtrinh_dodang_chuaphancap_cocpsxpb($ListCT,$dodangdauky,$dataNguyenLieu,$dataNhancong,$dataMay,$dataCPSXC,$dataDoanhThuThuan,$TongDoanhThuThuan,$TongCPSXCTong,$dataGiaThanh,$dataCPSXCPB,$dataGiaThanhTieuChuan);

$dataThemVaoBang = $OBJMACT->loadThemBangTongHop_DoanhThu_ChiPhi_GiaThanhCongTrinh(0,$TinhCPChuaPhanCap);

$valins="";
foreach ($dataThemVaoBang as $itemCT){
    $valins.="('".$itemCT['sottxuat']."','".$itemCT['masp']."','".$itemCT['tensp']."','".$itemCT['sotiendk']."','".$itemCT['sotiennl']."','".$itemCT['sotiennc']."','".$itemCT['sotienmay']."','".$itemCT['sotiencpsxc']."','".$itemCT['maspcha']."','".$itemCT['doanhthuthuan']."','".$itemCT['tongcong']."','".$itemCT['sotiencpsxcpb']."','".$itemCT['tylenl']."','".$itemCT['tylenc']."','".$itemCT['tylemay']."','".$itemCT['tylecpsxc']."','".$itemCT['tylecpsxcpb']."','".$itemCT['giathanh']."','".$itemCT['lailo']."','".$itemCT['dodangck']."','".$itemCT['dodangck_']."','".$itemCT['loaisp']."','".$itemCT['giathanhtoanbo']."','".$itemCT['giathanhdonvi']."'),";
}
database::re_query("TRUNCATE bangtonghop_danhthu_chiphi_giathanhct");
database::re_query("insert into bangtonghop_danhthu_chiphi_giathanhct(sottxuat,mact,tenct,dodangdk,sotiennl,sotiennc,sotienmay,sotiencpsxc,mactcha,doanhthuthuan,tongcong,sotiencpsxcpb,tylenl,tylenc,tylemay,tylecpsxc,tylecpsxcpb,giathanh,lailo,dodangck,dodangck_,loaisp,giathanhtoanbo,giathanhdonvi) VALUES ".substr($valins,0,-1));

//echo $valins;




