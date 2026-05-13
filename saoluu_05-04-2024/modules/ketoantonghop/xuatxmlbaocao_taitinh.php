<?php
session_start();
$dataBANGCDTK = $_SESSION["LISTCTBANGCDTRONGKY"];
$dataBANGCDTKDK = $_SESSION["LISTCTBANGCDDAUKY"];
$dataDanhSachXDKQKD = $_SESSION["LISTCTBANGKQKD"];
$ThongTinPhieu = $_SESSION["THONGTINPHIEUTKTNCN"];

$dataBCDTK = $_SESSION["dataBCDTK"];
$tungay = $_GET['tungay'];
$denngay = $_GET['denngay'];

$tungay_time = strtotime($tungay);
$denngay_time = strtotime($denngay);

$version = $_GET['version'];

//$xml = new DOMDocument();
//$doc->load( $_SESSION['DRIVER_PM']."/tmp/133_B01A_BCTC.xml");
$xmlload = simplexml_load_file( $_SESSION['DRIVER_PM']."/tmp/133_B01A_BCTC_{$version}.xml");

/// ------ Thông tin tờ khai --------------------------
$xmlload->HSoKhaiThue->TTinChung->TTinTKhaiThue->NNT->mst=$_SESSION['MST'];
$xmlload->HSoKhaiThue->TTinChung->TTinTKhaiThue->NNT->tenNNT=$_SESSION['TenCongTy'];
$xmlload->HSoKhaiThue->TTinChung->TTinTKhaiThue->NNT->dchiNNT=$_SESSION['DiaChi'];

$xmlload->HSoKhaiThue->TTinChung->TTinTKhaiThue->TKhaiThue->KyKKhaiThue->kyKKhai=$_SESSION['NienDo'];
$xmlload->HSoKhaiThue->TTinChung->TTinTKhaiThue->TKhaiThue->KyKKhaiThue->kyKKhaiTuNgay="01/01/".$_SESSION['NienDo'];
$xmlload->HSoKhaiThue->TTinChung->TTinTKhaiThue->TKhaiThue->KyKKhaiThue->kyKKhaiDenNgay=date("d/m/Y",$denngay_time);
if($version=="4.0.x"){
    $xmlload->HSoKhaiThue->TTinChung->TTinTKhaiThue->TKhaiThue->ngayLapTKhai = date("Y-m-d");
    $xmlload->HSoKhaiThue->TTinChung->TTinTKhaiThue->TKhaiThue->ngayKy = date("Y-m-d");
    $xmlload->HSoKhaiThue->CTieuTKhaiChinh->ngayLap =date("Y-m-d");
}else {
    $xmlload->HSoKhaiThue->TTinChung->TTinTKhaiThue->TKhaiThue->ngayLapTKhai = date("d/m/Y");
    $xmlload->HSoKhaiThue->TTinChung->TTinTKhaiThue->TKhaiThue->ngayKy = date("d/m/Y");
    $xmlload->HSoKhaiThue->CTieuTKhaiChinh->ngayLap =date("Y-m-d");
}


/// ------ Thông tin bảng cân đối kế toán --------------------------
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct110=number_format($dataBCDTK['110']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct110=number_format($dataBCDTK['110']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct120=number_format($dataBCDTK['120']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct120=number_format($dataBCDTK['120']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct121=number_format($dataBCDTK['121']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct121=number_format($dataBCDTK['121']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct122=number_format($dataBCDTK['122']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct122=number_format($dataBCDTK['122']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct123=number_format($dataBCDTK['123']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct123=number_format($dataBCDTK['123']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct124=number_format((0-$dataBCDTK['124']['soduck']),0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct124=number_format((0-$dataBCDTK['124']['sodudk']),0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct130=number_format($dataBCDTK['130']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct130=number_format($dataBCDTK['130']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct131=number_format($dataBCDTK['131']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct131=number_format($dataBCDTK['131']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct132=number_format($dataBCDTK['132']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct132=number_format($dataBCDTK['132']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct133=number_format($dataBCDTK['133']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct133=number_format($dataBCDTK['133']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct134=number_format($dataBCDTK['134']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct134=number_format($dataBCDTK['134']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct135=number_format($dataBCDTK['135']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct135=number_format($dataBCDTK['135']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct136=number_format((0-$dataBCDTK['136']['soduck']),0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct136=number_format((0-$dataBCDTK['136']['sodudk']),0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct140=number_format($dataBCDTK['140']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct140=number_format($dataBCDTK['140']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct141=number_format($dataBCDTK['141']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct141=number_format($dataBCDTK['141']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct142=number_format($dataBCDTK['142']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct142=number_format($dataBCDTK['142']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct150=number_format($dataBCDTK['150']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct150=number_format($dataBCDTK['150']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct151=number_format($dataBCDTK['151']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct151=number_format($dataBCDTK['151']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct152=number_format((0-$dataBCDTK['152']['soduck']),0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct152=number_format((0-$dataBCDTK['152']['sodudk']),0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct160=number_format($dataBCDTK['160']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct160=number_format($dataBCDTK['160']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct161=number_format($dataBCDTK['161']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct161=number_format($dataBCDTK['161']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct162=number_format((0-$dataBCDTK['162']['soduck']),0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct162=number_format((0-$dataBCDTK['162']['sodudk']),0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct170=number_format($dataBCDTK['170']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct170=number_format($dataBCDTK['170']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct180=number_format($dataBCDTK['180']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct180=number_format($dataBCDTK['180']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct181=number_format($dataBCDTK['181']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct181=number_format($dataBCDTK['181']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct182=number_format($dataBCDTK['182']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct182=number_format($dataBCDTK['182']['sodudk'],0,",","");

$sum200ck = $dataBCDTK['110']['soduck']+$dataBCDTK['120']['soduck']+$dataBCDTK['130']['soduck']+$dataBCDTK['140']['soduck']+$dataBCDTK['150']['soduck']+$dataBCDTK['160']['soduck']+$dataBCDTK['170']['soduck']+$dataBCDTK['180']['soduck'];
$sum200dk = $dataBCDTK['110']['sodudk']+$dataBCDTK['120']['sodudk']+$dataBCDTK['130']['sodudk']+$dataBCDTK['140']['sodudk']+$dataBCDTK['150']['sodudk']+$dataBCDTK['160']['sodudk']+$dataBCDTK['170']['sodudk']+$dataBCDTK['180']['sodudk'];


$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct200=$sum200ck;
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct200=$sum200dk;

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct300=number_format($dataBCDTK['300']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct300=number_format($dataBCDTK['300']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct311=number_format($dataBCDTK['311']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct311=number_format($dataBCDTK['311']['sodudk'],0,",","");


$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct312=number_format($dataBCDTK['312']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct312=number_format($dataBCDTK['312']['sodudk'],0,",","");


$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct313=number_format($dataBCDTK['313']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct313=number_format($dataBCDTK['313']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct314=number_format($dataBCDTK['314']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct314=number_format($dataBCDTK['314']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct315=number_format($dataBCDTK['315']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct315=number_format($dataBCDTK['315']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct316=number_format($dataBCDTK['316']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct316=number_format($dataBCDTK['316']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct317=number_format($dataBCDTK['317']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct317=number_format($dataBCDTK['317']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct318=number_format($dataBCDTK['318']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct318=number_format($dataBCDTK['318']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct319=number_format($dataBCDTK['319']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct319=number_format($dataBCDTK['319']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct400=number_format($dataBCDTK['400']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct400=number_format($dataBCDTK['400']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct411=number_format($dataBCDTK['411']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct411=number_format($dataBCDTK['411']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct412=number_format($dataBCDTK['412']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct412=number_format($dataBCDTK['412']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct413=number_format($dataBCDTK['413']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct413=number_format($dataBCDTK['413']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct414=number_format((0-$dataBCDTK['414']['soduck']),0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct414=number_format((0-$dataBCDTK['414']['sodudk']),0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct415=number_format($dataBCDTK['415']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct415=number_format($dataBCDTK['415']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct416=number_format($dataBCDTK['416']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct416=number_format($dataBCDTK['416']['sodudk'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct417=number_format($dataBCDTK['417']['soduck'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct417=number_format($dataBCDTK['417']['sodudk'],0,",","");

$sum500ck = ($dataBCDTK['300']['soduck']+$dataBCDTK['400']['soduck']);
$sum500dk = ($dataBCDTK['300']['sodudk']+$dataBCDTK['400']['sodudk']);

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoCuoiNam->ct500=$sum500ck;
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->SoDauNam->ct500=$sum500dk;

/// ------ KQKD --------------------------
$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamNay->ct01=number_format($dataDanhSachXDKQKD['01']['namnay'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamTruoc->ct01=number_format($dataDanhSachXDKQKD['01']['namtruoc'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamNay->ct02=number_format($dataDanhSachXDKQKD['02']['namnay'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamTruoc->ct02=number_format($dataDanhSachXDKQKD['02']['namtruoc'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamNay->ct10=number_format($dataDanhSachXDKQKD['10']['namnay'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamTruoc->ct10=number_format($dataDanhSachXDKQKD['10']['namtruoc'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamNay->ct11=number_format($dataDanhSachXDKQKD['11']['namnay'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamTruoc->ct11=number_format($dataDanhSachXDKQKD['11']['namtruoc'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamNay->ct20=number_format($dataDanhSachXDKQKD['20']['namnay'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamTruoc->ct20=number_format($dataDanhSachXDKQKD['20']['namtruoc'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamNay->ct21=number_format($dataDanhSachXDKQKD['21']['namnay'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamTruoc->ct21=number_format($dataDanhSachXDKQKD['21']['namtruoc'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamNay->ct22=number_format($dataDanhSachXDKQKD['22']['namnay'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamTruoc->ct22=number_format($dataDanhSachXDKQKD['22']['namtruoc'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamNay->ct23=number_format($dataDanhSachXDKQKD['23']['namnay'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamTruoc->ct23=number_format($dataDanhSachXDKQKD['23']['namtruoc'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamNay->ct24=number_format($dataDanhSachXDKQKD['24']['namnay'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamTruoc->ct24=number_format($dataDanhSachXDKQKD['24']['namtruoc'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamNay->ct30=number_format($dataDanhSachXDKQKD['30']['namnay'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamTruoc->ct30=number_format($dataDanhSachXDKQKD['30']['namtruoc'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamNay->ct31=number_format($dataDanhSachXDKQKD['31']['namnay'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamTruoc->ct31=number_format($dataDanhSachXDKQKD['31']['namtruoc'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamNay->ct32=number_format($dataDanhSachXDKQKD['32']['namnay'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamTruoc->ct32=number_format($dataDanhSachXDKQKD['32']['namtruoc'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamNay->ct40=number_format($dataDanhSachXDKQKD['40']['namnay'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamTruoc->ct40=number_format($dataDanhSachXDKQKD['40']['namtruoc'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamNay->ct50=number_format($dataDanhSachXDKQKD['50']['namnay'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamTruoc->ct50=number_format($dataDanhSachXDKQKD['50']['namtruoc'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamNay->ct51=number_format($dataDanhSachXDKQKD['51']['namnay'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamTruoc->ct51=number_format($dataDanhSachXDKQKD['51']['namtruoc'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamNay->ct60=number_format($dataDanhSachXDKQKD['60']['namnay'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_KQHDSXKD->NamTruoc->ct60=number_format($dataDanhSachXDKQKD['60']['namtruoc'],0,",","");

/// ------ Bảng cân đối tài khoản--------------------------

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct111=number_format($dataBANGCDTK['111']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct111=number_format($dataBANGCDTK['111']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct111=number_format($dataBANGCDTK['111']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct111=number_format($dataBANGCDTK['111']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct111=number_format($dataBANGCDTK['111']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct111=number_format($dataBANGCDTK['111']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct1111=number_format($dataBANGCDTK['1111']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct1111=number_format($dataBANGCDTK['1111']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct1111=number_format($dataBANGCDTK['1111']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct1111=number_format($dataBANGCDTK['1111']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct1111=number_format($dataBANGCDTK['1111']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct1111=number_format($dataBANGCDTK['1111']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct1112=number_format($dataBANGCDTK['1112']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct1112=number_format($dataBANGCDTK['1112']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct1112=number_format($dataBANGCDTK['1112']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct1112=number_format($dataBANGCDTK['1112']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct1112=number_format($dataBANGCDTK['1112']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct1112=number_format($dataBANGCDTK['1112']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct112=number_format($dataBANGCDTK['112']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct112=number_format($dataBANGCDTK['112']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct112=number_format($dataBANGCDTK['112']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct112=number_format($dataBANGCDTK['112']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct112=number_format($dataBANGCDTK['112']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct112=number_format($dataBANGCDTK['112']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct1121=number_format($dataBANGCDTK['1121']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct1121=number_format($dataBANGCDTK['1121']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct1121=number_format($dataBANGCDTK['1121']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct1121=number_format($dataBANGCDTK['1121']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct1121=number_format($dataBANGCDTK['1121']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct1121=number_format($dataBANGCDTK['1121']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct1122=number_format($dataBANGCDTK['1122']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct1122=number_format($dataBANGCDTK['1122']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct1122=number_format($dataBANGCDTK['1122']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct1122=number_format($dataBANGCDTK['1122']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct1122=number_format($dataBANGCDTK['1122']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct1122=number_format($dataBANGCDTK['1122']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct121=number_format($dataBANGCDTK['121']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct121=number_format($dataBANGCDTK['121']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct121=number_format($dataBANGCDTK['121']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct121=number_format($dataBANGCDTK['121']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct121=number_format($dataBANGCDTK['121']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct121=number_format($dataBANGCDTK['121']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct128=number_format($dataBANGCDTK['128']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct128=number_format($dataBANGCDTK['128']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct128=number_format($dataBANGCDTK['128']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct128=number_format($dataBANGCDTK['128']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct128=number_format($dataBANGCDTK['128']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct128=number_format($dataBANGCDTK['128']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct1281=number_format($dataBANGCDTK['1281']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct1281=number_format($dataBANGCDTK['1281']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct1281=number_format($dataBANGCDTK['1281']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct1281=number_format($dataBANGCDTK['1281']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct1281=number_format($dataBANGCDTK['1281']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct1281=number_format($dataBANGCDTK['1281']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct1288=number_format($dataBANGCDTK['1288']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct1288=number_format($dataBANGCDTK['1288']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct1288=number_format($dataBANGCDTK['1288']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct1288=number_format($dataBANGCDTK['1288']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct1288=number_format($dataBANGCDTK['1288']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct1288=number_format($dataBANGCDTK['1288']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct131=number_format($dataBANGCDTK['131']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct131=number_format($dataBANGCDTK['131']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct131=number_format($dataBANGCDTK['131']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct131=number_format($dataBANGCDTK['131']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct131=number_format($dataBANGCDTK['131']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct131=number_format($dataBANGCDTK['131']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct131=number_format($dataBANGCDTK['131']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct131=number_format($dataBANGCDTK['131']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct131=number_format($dataBANGCDTK['131']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct131=number_format($dataBANGCDTK['131']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct131=number_format($dataBANGCDTK['131']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct131=number_format($dataBANGCDTK['131']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct133=number_format($dataBANGCDTK['133']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct133=number_format($dataBANGCDTK['133']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct133=number_format($dataBANGCDTK['133']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct133=number_format($dataBANGCDTK['133']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct133=number_format($dataBANGCDTK['133']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct133=number_format($dataBANGCDTK['133']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct1331=number_format($dataBANGCDTK['1331']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct1331=number_format($dataBANGCDTK['1331']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct1331=number_format($dataBANGCDTK['1331']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct1331=number_format($dataBANGCDTK['1331']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct1331=number_format($dataBANGCDTK['1331']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct1331=number_format($dataBANGCDTK['1331']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct1332=number_format($dataBANGCDTK['1332']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct1332=number_format($dataBANGCDTK['1332']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct1332=number_format($dataBANGCDTK['1332']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct1332=number_format($dataBANGCDTK['1332']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct1332=number_format($dataBANGCDTK['1332']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct1332=number_format($dataBANGCDTK['1332']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct136=number_format($dataBANGCDTK['136']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct136=number_format($dataBANGCDTK['136']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct136=number_format($dataBANGCDTK['136']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct136=number_format($dataBANGCDTK['136']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct136=number_format($dataBANGCDTK['136']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct136=number_format($dataBANGCDTK['136']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct1361=number_format($dataBANGCDTK['1361']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct1361=number_format($dataBANGCDTK['1361']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct1361=number_format($dataBANGCDTK['1361']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct1361=number_format($dataBANGCDTK['1361']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct1361=number_format($dataBANGCDTK['1361']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct1361=number_format($dataBANGCDTK['1361']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct1368=number_format($dataBANGCDTK['1368']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct1368=number_format($dataBANGCDTK['1368']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct1368=number_format($dataBANGCDTK['1368']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct1368=number_format($dataBANGCDTK['1368']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct1368=number_format($dataBANGCDTK['1368']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct1368=number_format($dataBANGCDTK['1368']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct138=number_format($dataBANGCDTK['138']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct138=number_format($dataBANGCDTK['138']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct138=number_format($dataBANGCDTK['138']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct138=number_format($dataBANGCDTK['138']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct138=number_format($dataBANGCDTK['138']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct138=number_format($dataBANGCDTK['138']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct1381=number_format($dataBANGCDTK['1381']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct1381=number_format($dataBANGCDTK['1381']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct1381=number_format($dataBANGCDTK['1381']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct1381=number_format($dataBANGCDTK['1381']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct1381=number_format($dataBANGCDTK['1381']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct1381=number_format($dataBANGCDTK['1381']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct1386=number_format($dataBANGCDTK['1386']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct1386=number_format($dataBANGCDTK['1386']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct1386=number_format($dataBANGCDTK['1386']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct1386=number_format($dataBANGCDTK['1386']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct1386=number_format($dataBANGCDTK['1386']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct1386=number_format($dataBANGCDTK['1386']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct1388=number_format($dataBANGCDTK['1388']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct1388=number_format($dataBANGCDTK['1388']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct1388=number_format($dataBANGCDTK['1388']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct1388=number_format($dataBANGCDTK['1388']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct1388=number_format($dataBANGCDTK['1388']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct1388=number_format($dataBANGCDTK['1388']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct141=number_format($dataBANGCDTK['141']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct141=number_format($dataBANGCDTK['141']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct141=number_format($dataBANGCDTK['141']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct141=number_format($dataBANGCDTK['141']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct141=number_format($dataBANGCDTK['141']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct141=number_format($dataBANGCDTK['141']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct151=number_format($dataBANGCDTK['151']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct151=number_format($dataBANGCDTK['151']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct151=number_format($dataBANGCDTK['151']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct151=number_format($dataBANGCDTK['151']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct151=number_format($dataBANGCDTK['151']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct151=number_format($dataBANGCDTK['151']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct152=number_format($dataBANGCDTK['152']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct152=number_format($dataBANGCDTK['152']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct152=number_format($dataBANGCDTK['152']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct152=number_format($dataBANGCDTK['152']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct152=number_format($dataBANGCDTK['152']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct152=number_format($dataBANGCDTK['152']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct153=number_format($dataBANGCDTK['153']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct153=number_format($dataBANGCDTK['153']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct153=number_format($dataBANGCDTK['153']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct153=number_format($dataBANGCDTK['153']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct153=number_format($dataBANGCDTK['153']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct153=number_format($dataBANGCDTK['153']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct154=number_format($dataBANGCDTK['154']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct154=number_format($dataBANGCDTK['154']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct154=number_format($dataBANGCDTK['154']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct154=number_format($dataBANGCDTK['154']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct154=number_format($dataBANGCDTK['154']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct154=number_format($dataBANGCDTK['154']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct155=number_format($dataBANGCDTK['155']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct155=number_format($dataBANGCDTK['155']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct155=number_format($dataBANGCDTK['155']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct155=number_format($dataBANGCDTK['155']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct155=number_format($dataBANGCDTK['155']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct155=number_format($dataBANGCDTK['155']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct156=number_format($dataBANGCDTK['156']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct156=number_format($dataBANGCDTK['156']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct156=number_format($dataBANGCDTK['156']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct156=number_format($dataBANGCDTK['156']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct156=number_format($dataBANGCDTK['156']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct156=number_format($dataBANGCDTK['156']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct157=number_format($dataBANGCDTK['157']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct157=number_format($dataBANGCDTK['157']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct157=number_format($dataBANGCDTK['157']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct157=number_format($dataBANGCDTK['157']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct157=number_format($dataBANGCDTK['157']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct157=number_format($dataBANGCDTK['157']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct211=number_format($dataBANGCDTK['211']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct211=number_format($dataBANGCDTK['211']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct211=number_format($dataBANGCDTK['211']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct211=number_format($dataBANGCDTK['211']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct211=number_format($dataBANGCDTK['211']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct211=number_format($dataBANGCDTK['211']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct2111=number_format($dataBANGCDTK['2111']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct2111=number_format($dataBANGCDTK['2111']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct2111=number_format($dataBANGCDTK['2111']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct2111=number_format($dataBANGCDTK['2111']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct2111=number_format($dataBANGCDTK['2111']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct2111=number_format($dataBANGCDTK['2111']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct2112=number_format($dataBANGCDTK['2112']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct2112=number_format($dataBANGCDTK['2112']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct2112=number_format($dataBANGCDTK['2112']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct2112=number_format($dataBANGCDTK['2112']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct2112=number_format($dataBANGCDTK['2112']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct2112=number_format($dataBANGCDTK['2112']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct2113=number_format($dataBANGCDTK['2113']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct2113=number_format($dataBANGCDTK['2113']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct2113=number_format($dataBANGCDTK['2113']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct2113=number_format($dataBANGCDTK['2113']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct2113=number_format($dataBANGCDTK['2113']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct2113=number_format($dataBANGCDTK['2113']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct214=number_format($dataBANGCDTK['214']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct214=number_format($dataBANGCDTK['214']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct214=number_format($dataBANGCDTK['214']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct214=number_format($dataBANGCDTK['214']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct214=number_format($dataBANGCDTK['214']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct214=number_format($dataBANGCDTK['214']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct2141=number_format($dataBANGCDTK['2141']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct2141=number_format($dataBANGCDTK['2141']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct2141=number_format($dataBANGCDTK['2141']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct2141=number_format($dataBANGCDTK['2141']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct2141=number_format($dataBANGCDTK['2141']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct2141=number_format($dataBANGCDTK['2141']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct2142=number_format($dataBANGCDTK['2142']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct2142=number_format($dataBANGCDTK['2142']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct2142=number_format($dataBANGCDTK['2142']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct2142=number_format($dataBANGCDTK['2142']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct2142=number_format($dataBANGCDTK['2142']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct2142=number_format($dataBANGCDTK['2142']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct2143=number_format($dataBANGCDTK['2143']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct2143=number_format($dataBANGCDTK['2143']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct2143=number_format($dataBANGCDTK['2143']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct2143=number_format($dataBANGCDTK['2143']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct2143=number_format($dataBANGCDTK['2143']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct2143=number_format($dataBANGCDTK['2143']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct2147=number_format($dataBANGCDTK['2147']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct2147=number_format($dataBANGCDTK['2147']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct2147=number_format($dataBANGCDTK['2147']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct2147=number_format($dataBANGCDTK['2147']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct2147=number_format($dataBANGCDTK['2147']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct2147=number_format($dataBANGCDTK['2147']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct217=number_format($dataBANGCDTK['217']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct217=number_format($dataBANGCDTK['217']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct217=number_format($dataBANGCDTK['217']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct217=number_format($dataBANGCDTK['217']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct217=number_format($dataBANGCDTK['217']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct217=number_format($dataBANGCDTK['217']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct228=number_format($dataBANGCDTK['228']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct228=number_format($dataBANGCDTK['228']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct228=number_format($dataBANGCDTK['228']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct228=number_format($dataBANGCDTK['228']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct228=number_format($dataBANGCDTK['228']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct228=number_format($dataBANGCDTK['228']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct2281=number_format($dataBANGCDTK['2281']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct2281=number_format($dataBANGCDTK['2281']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct2281=number_format($dataBANGCDTK['2281']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct2281=number_format($dataBANGCDTK['2281']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct2281=number_format($dataBANGCDTK['2281']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct2281=number_format($dataBANGCDTK['2281']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct2288=number_format($dataBANGCDTK['2288']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct2288=number_format($dataBANGCDTK['2288']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct2288=number_format($dataBANGCDTK['2288']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct2288=number_format($dataBANGCDTK['2288']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct2288=number_format($dataBANGCDTK['2288']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct2288=number_format($dataBANGCDTK['2288']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct229=number_format($dataBANGCDTK['229']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct229=number_format($dataBANGCDTK['229']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct229=number_format($dataBANGCDTK['229']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct229=number_format($dataBANGCDTK['229']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct229=number_format($dataBANGCDTK['229']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct229=number_format($dataBANGCDTK['229']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct2291=number_format($dataBANGCDTK['2291']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct2291=number_format($dataBANGCDTK['2291']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct2291=number_format($dataBANGCDTK['2291']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct2291=number_format($dataBANGCDTK['2291']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct2291=number_format($dataBANGCDTK['2291']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct2291=number_format($dataBANGCDTK['2291']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct2292=number_format($dataBANGCDTK['2292']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct2292=number_format($dataBANGCDTK['2292']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct2292=number_format($dataBANGCDTK['2292']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct2292=number_format($dataBANGCDTK['2292']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct2292=number_format($dataBANGCDTK['2292']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct2292=number_format($dataBANGCDTK['2292']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct2293=number_format($dataBANGCDTK['2293']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct2293=number_format($dataBANGCDTK['2293']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct2293=number_format($dataBANGCDTK['2293']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct2293=number_format($dataBANGCDTK['2293']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct2293=number_format($dataBANGCDTK['2293']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct2293=number_format($dataBANGCDTK['2293']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct2294=number_format($dataBANGCDTK['2294']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct2294=number_format($dataBANGCDTK['2294']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct2294=number_format($dataBANGCDTK['2294']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct2294=number_format($dataBANGCDTK['2294']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct2294=number_format($dataBANGCDTK['2294']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct2294=number_format($dataBANGCDTK['2294']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct241=number_format($dataBANGCDTK['241']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct241=number_format($dataBANGCDTK['241']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct241=number_format($dataBANGCDTK['241']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct241=number_format($dataBANGCDTK['241']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct241=number_format($dataBANGCDTK['241']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct241=number_format($dataBANGCDTK['241']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct2411=number_format($dataBANGCDTK['2411']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct2411=number_format($dataBANGCDTK['2411']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct2411=number_format($dataBANGCDTK['2411']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct2411=number_format($dataBANGCDTK['2411']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct2411=number_format($dataBANGCDTK['2411']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct2411=number_format($dataBANGCDTK['2411']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct2412=number_format($dataBANGCDTK['2412']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct2412=number_format($dataBANGCDTK['2412']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct2412=number_format($dataBANGCDTK['2412']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct2412=number_format($dataBANGCDTK['2412']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct2412=number_format($dataBANGCDTK['2412']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct2412=number_format($dataBANGCDTK['2412']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct2413=number_format($dataBANGCDTK['2413']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct2413=number_format($dataBANGCDTK['2413']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct2413=number_format($dataBANGCDTK['2413']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct2413=number_format($dataBANGCDTK['2413']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct2413=number_format($dataBANGCDTK['2413']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct2413=number_format($dataBANGCDTK['2413']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct242=number_format($dataBANGCDTK['242']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct242=number_format($dataBANGCDTK['242']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct242=number_format($dataBANGCDTK['242']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct242=number_format($dataBANGCDTK['242']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct242=number_format($dataBANGCDTK['242']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct242=number_format($dataBANGCDTK['242']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct331=number_format($dataBANGCDTK['331']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct331=number_format($dataBANGCDTK['331']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct331=number_format($dataBANGCDTK['331']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct331=number_format($dataBANGCDTK['331']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct331=number_format($dataBANGCDTK['331']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct331=number_format($dataBANGCDTK['331']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct333=number_format($dataBANGCDTK['333']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct333=number_format($dataBANGCDTK['333']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct333=number_format($dataBANGCDTK['333']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct333=number_format($dataBANGCDTK['333']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct333=number_format($dataBANGCDTK['333']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct333=number_format($dataBANGCDTK['333']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3331=number_format($dataBANGCDTK['3331']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3331=number_format($dataBANGCDTK['3331']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3331=number_format($dataBANGCDTK['3331']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3331=number_format($dataBANGCDTK['3331']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3331=number_format($dataBANGCDTK['3331']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3331=number_format($dataBANGCDTK['3331']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct33311=number_format($dataBANGCDTK['33311']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct33311=number_format($dataBANGCDTK['33311']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct33311=number_format($dataBANGCDTK['33311']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct33311=number_format($dataBANGCDTK['33311']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct33311=number_format($dataBANGCDTK['33311']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct33311=number_format($dataBANGCDTK['33311']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct33312=number_format($dataBANGCDTK['33312']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct33312=number_format($dataBANGCDTK['33312']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct33312=number_format($dataBANGCDTK['33312']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct33312=number_format($dataBANGCDTK['33312']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct33312=number_format($dataBANGCDTK['33312']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct33312=number_format($dataBANGCDTK['33312']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3332=number_format($dataBANGCDTK['3332']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3332=number_format($dataBANGCDTK['3332']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3332=number_format($dataBANGCDTK['3332']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3332=number_format($dataBANGCDTK['3332']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3332=number_format($dataBANGCDTK['3332']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3332=number_format($dataBANGCDTK['3332']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3333=number_format($dataBANGCDTK['3333']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3333=number_format($dataBANGCDTK['3333']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3333=number_format($dataBANGCDTK['3333']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3333=number_format($dataBANGCDTK['3333']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3333=number_format($dataBANGCDTK['3333']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3333=number_format($dataBANGCDTK['3333']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3334=number_format($dataBANGCDTK['3334']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3334=number_format($dataBANGCDTK['3334']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3334=number_format($dataBANGCDTK['3334']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3334=number_format($dataBANGCDTK['3334']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3334=number_format($dataBANGCDTK['3334']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3334=number_format($dataBANGCDTK['3334']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3335=number_format($dataBANGCDTK['3335']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3335=number_format($dataBANGCDTK['3335']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3335=number_format($dataBANGCDTK['3335']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3335=number_format($dataBANGCDTK['3335']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3335=number_format($dataBANGCDTK['3335']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3335=number_format($dataBANGCDTK['3335']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3336=number_format($dataBANGCDTK['3336']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3336=number_format($dataBANGCDTK['3336']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3336=number_format($dataBANGCDTK['3336']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3336=number_format($dataBANGCDTK['3336']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3336=number_format($dataBANGCDTK['3336']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3336=number_format($dataBANGCDTK['3336']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3337=number_format($dataBANGCDTK['3337']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3337=number_format($dataBANGCDTK['3337']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3337=number_format($dataBANGCDTK['3337']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3337=number_format($dataBANGCDTK['3337']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3337=number_format($dataBANGCDTK['3337']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3337=number_format($dataBANGCDTK['3337']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3338=number_format($dataBANGCDTK['3338']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3338=number_format($dataBANGCDTK['3338']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3338=number_format($dataBANGCDTK['3338']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3338=number_format($dataBANGCDTK['3338']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3338=number_format($dataBANGCDTK['3338']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3338=number_format($dataBANGCDTK['3338']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct33381=number_format($dataBANGCDTK['33381']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct33381=number_format($dataBANGCDTK['33381']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct33381=number_format($dataBANGCDTK['33381']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct33381=number_format($dataBANGCDTK['33381']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct33381=number_format($dataBANGCDTK['33381']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct33381=number_format($dataBANGCDTK['33381']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct33382=number_format($dataBANGCDTK['33382']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct33382=number_format($dataBANGCDTK['33382']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct33382=number_format($dataBANGCDTK['33382']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct33382=number_format($dataBANGCDTK['33382']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct33382=number_format($dataBANGCDTK['33382']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct33382=number_format($dataBANGCDTK['33382']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3339=number_format($dataBANGCDTK['3339']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3339=number_format($dataBANGCDTK['3339']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3339=number_format($dataBANGCDTK['3339']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3339=number_format($dataBANGCDTK['3339']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3339=number_format($dataBANGCDTK['3339']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3339=number_format($dataBANGCDTK['3339']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct334=number_format($dataBANGCDTK['334']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct334=number_format($dataBANGCDTK['334']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct334=number_format($dataBANGCDTK['334']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct334=number_format($dataBANGCDTK['334']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct334=number_format($dataBANGCDTK['334']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct334=number_format($dataBANGCDTK['334']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct335=number_format($dataBANGCDTK['335']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct335=number_format($dataBANGCDTK['335']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct335=number_format($dataBANGCDTK['335']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct335=number_format($dataBANGCDTK['335']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct335=number_format($dataBANGCDTK['335']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct335=number_format($dataBANGCDTK['335']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct336=number_format($dataBANGCDTK['336']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct336=number_format($dataBANGCDTK['336']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct336=number_format($dataBANGCDTK['336']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct336=number_format($dataBANGCDTK['336']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct336=number_format($dataBANGCDTK['336']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct336=number_format($dataBANGCDTK['336']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3361=number_format($dataBANGCDTK['3361']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3361=number_format($dataBANGCDTK['3361']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3361=number_format($dataBANGCDTK['3361']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3361=number_format($dataBANGCDTK['3361']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3361=number_format($dataBANGCDTK['3361']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3361=number_format($dataBANGCDTK['3361']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3368=number_format($dataBANGCDTK['3368']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3368=number_format($dataBANGCDTK['3368']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3368=number_format($dataBANGCDTK['3368']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3368=number_format($dataBANGCDTK['3368']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3368=number_format($dataBANGCDTK['3368']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3368=number_format($dataBANGCDTK['3368']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct338=number_format($dataBANGCDTK['338']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct338=number_format($dataBANGCDTK['338']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct338=number_format($dataBANGCDTK['338']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct338=number_format($dataBANGCDTK['338']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct338=number_format($dataBANGCDTK['338']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct338=number_format($dataBANGCDTK['338']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3381=number_format($dataBANGCDTK['3381']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3381=number_format($dataBANGCDTK['3381']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3381=number_format($dataBANGCDTK['3381']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3381=number_format($dataBANGCDTK['3381']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3381=number_format($dataBANGCDTK['3381']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3381=number_format($dataBANGCDTK['3381']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3382=number_format($dataBANGCDTK['3382']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3382=number_format($dataBANGCDTK['3382']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3382=number_format($dataBANGCDTK['3382']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3382=number_format($dataBANGCDTK['3382']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3382=number_format($dataBANGCDTK['3382']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3382=number_format($dataBANGCDTK['3382']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3383=number_format($dataBANGCDTK['3383']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3383=number_format($dataBANGCDTK['3383']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3383=number_format($dataBANGCDTK['3383']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3383=number_format($dataBANGCDTK['3383']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3383=number_format($dataBANGCDTK['3383']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3383=number_format($dataBANGCDTK['3383']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3384=number_format($dataBANGCDTK['3384']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3384=number_format($dataBANGCDTK['3384']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3384=number_format($dataBANGCDTK['3384']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3384=number_format($dataBANGCDTK['3384']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3384=number_format($dataBANGCDTK['3384']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3384=number_format($dataBANGCDTK['3384']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3385=number_format($dataBANGCDTK['3385']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3385=number_format($dataBANGCDTK['3385']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3385=number_format($dataBANGCDTK['3385']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3385=number_format($dataBANGCDTK['3385']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3385=number_format($dataBANGCDTK['3385']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3385=number_format($dataBANGCDTK['3385']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3386=number_format($dataBANGCDTK['3386']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3386=number_format($dataBANGCDTK['3386']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3386=number_format($dataBANGCDTK['3386']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3386=number_format($dataBANGCDTK['3386']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3386=number_format($dataBANGCDTK['3386']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3386=number_format($dataBANGCDTK['3386']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3387=number_format($dataBANGCDTK['3387']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3387=number_format($dataBANGCDTK['3387']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3387=number_format($dataBANGCDTK['3387']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3387=number_format($dataBANGCDTK['3387']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3387=number_format($dataBANGCDTK['3387']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3387=number_format($dataBANGCDTK['3387']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3388=number_format($dataBANGCDTK['3388']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3388=number_format($dataBANGCDTK['3388']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3388=number_format($dataBANGCDTK['3388']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3388=number_format($dataBANGCDTK['3388']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3388=number_format($dataBANGCDTK['3388']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3388=number_format($dataBANGCDTK['3388']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct341=number_format($dataBANGCDTK['341']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct341=number_format($dataBANGCDTK['341']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct341=number_format($dataBANGCDTK['341']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct341=number_format($dataBANGCDTK['341']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct341=number_format($dataBANGCDTK['341']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct341=number_format($dataBANGCDTK['341']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3411=number_format($dataBANGCDTK['3411']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3411=number_format($dataBANGCDTK['3411']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3411=number_format($dataBANGCDTK['3411']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3411=number_format($dataBANGCDTK['3411']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3411=number_format($dataBANGCDTK['3411']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3411=number_format($dataBANGCDTK['3411']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3412=number_format($dataBANGCDTK['3412']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3412=number_format($dataBANGCDTK['3412']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3412=number_format($dataBANGCDTK['3412']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3412=number_format($dataBANGCDTK['3412']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3412=number_format($dataBANGCDTK['3412']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3412=number_format($dataBANGCDTK['3412']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct352=number_format($dataBANGCDTK['352']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct352=number_format($dataBANGCDTK['352']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct352=number_format($dataBANGCDTK['352']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct352=number_format($dataBANGCDTK['352']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct352=number_format($dataBANGCDTK['352']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct352=number_format($dataBANGCDTK['352']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3521=number_format($dataBANGCDTK['3521']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3521=number_format($dataBANGCDTK['3521']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3521=number_format($dataBANGCDTK['3521']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3521=number_format($dataBANGCDTK['3521']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3521=number_format($dataBANGCDTK['3521']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3521=number_format($dataBANGCDTK['3521']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3522=number_format($dataBANGCDTK['3522']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3522=number_format($dataBANGCDTK['3522']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3522=number_format($dataBANGCDTK['3522']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3522=number_format($dataBANGCDTK['3522']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3522=number_format($dataBANGCDTK['3522']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3522=number_format($dataBANGCDTK['3522']['tongducock'],0,",","");


$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3524=number_format($dataBANGCDTK['3524']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3524=number_format($dataBANGCDTK['3524']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3524=number_format($dataBANGCDTK['3524']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3524=number_format($dataBANGCDTK['3524']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3524=number_format($dataBANGCDTK['3524']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3524=number_format($dataBANGCDTK['3524']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct353=number_format($dataBANGCDTK['353']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct353=number_format($dataBANGCDTK['353']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct353=number_format($dataBANGCDTK['353']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct353=number_format($dataBANGCDTK['353']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct353=number_format($dataBANGCDTK['353']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct353=number_format($dataBANGCDTK['353']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3531=number_format($dataBANGCDTK['3531']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3531=number_format($dataBANGCDTK['3531']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3531=number_format($dataBANGCDTK['3531']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3531=number_format($dataBANGCDTK['3531']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3531=number_format($dataBANGCDTK['3531']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3531=number_format($dataBANGCDTK['3531']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3532=number_format($dataBANGCDTK['3532']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3532=number_format($dataBANGCDTK['3532']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3532=number_format($dataBANGCDTK['3532']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3532=number_format($dataBANGCDTK['3532']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3532=number_format($dataBANGCDTK['3532']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3532=number_format($dataBANGCDTK['3532']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3533=number_format($dataBANGCDTK['3533']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3533=number_format($dataBANGCDTK['3533']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3533=number_format($dataBANGCDTK['3533']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3533=number_format($dataBANGCDTK['3533']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3533=number_format($dataBANGCDTK['3533']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3533=number_format($dataBANGCDTK['3533']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3534=number_format($dataBANGCDTK['3534']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3534=number_format($dataBANGCDTK['3534']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3534=number_format($dataBANGCDTK['3534']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3534=number_format($dataBANGCDTK['3534']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3534=number_format($dataBANGCDTK['3534']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3534=number_format($dataBANGCDTK['3534']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct356=number_format($dataBANGCDTK['356']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct356=number_format($dataBANGCDTK['356']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct356=number_format($dataBANGCDTK['356']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct356=number_format($dataBANGCDTK['356']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct356=number_format($dataBANGCDTK['356']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct356=number_format($dataBANGCDTK['356']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3561=number_format($dataBANGCDTK['3561']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3561=number_format($dataBANGCDTK['3561']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3561=number_format($dataBANGCDTK['3561']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3561=number_format($dataBANGCDTK['3561']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3561=number_format($dataBANGCDTK['3561']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3561=number_format($dataBANGCDTK['3561']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct3562=number_format($dataBANGCDTK['3562']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct3562=number_format($dataBANGCDTK['3562']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct3562=number_format($dataBANGCDTK['3562']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct3562=number_format($dataBANGCDTK['3562']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct3562=number_format($dataBANGCDTK['3562']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct3562=number_format($dataBANGCDTK['3562']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct411=number_format($dataBANGCDTK['411']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct411=number_format($dataBANGCDTK['411']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct411=number_format($dataBANGCDTK['411']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct411=number_format($dataBANGCDTK['411']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct411=number_format($dataBANGCDTK['411']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct411=number_format($dataBANGCDTK['411']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct4111=number_format($dataBANGCDTK['4111']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct4111=number_format($dataBANGCDTK['4111']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct4111=number_format($dataBANGCDTK['4111']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct4111=number_format($dataBANGCDTK['4111']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct4111=number_format($dataBANGCDTK['4111']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct4111=number_format($dataBANGCDTK['4111']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct4112=number_format($dataBANGCDTK['4112']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct4112=number_format($dataBANGCDTK['4112']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct4112=number_format($dataBANGCDTK['4112']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct4112=number_format($dataBANGCDTK['4112']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct4112=number_format($dataBANGCDTK['4112']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct4112=number_format($dataBANGCDTK['4112']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct4118=number_format($dataBANGCDTK['4118']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct4118=number_format($dataBANGCDTK['4118']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct4118=number_format($dataBANGCDTK['4118']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct4118=number_format($dataBANGCDTK['4118']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct4118=number_format($dataBANGCDTK['4118']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct4118=number_format($dataBANGCDTK['4118']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct413=number_format($dataBANGCDTK['413']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct413=number_format($dataBANGCDTK['413']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct413=number_format($dataBANGCDTK['413']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct413=number_format($dataBANGCDTK['413']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct413=number_format($dataBANGCDTK['413']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct413=number_format($dataBANGCDTK['413']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct418=number_format($dataBANGCDTK['418']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct418=number_format($dataBANGCDTK['418']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct418=number_format($dataBANGCDTK['418']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct418=number_format($dataBANGCDTK['418']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct418=number_format($dataBANGCDTK['418']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct418=number_format($dataBANGCDTK['418']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct419=number_format($dataBANGCDTK['419']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct419=number_format($dataBANGCDTK['419']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct419=number_format($dataBANGCDTK['419']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct419=number_format($dataBANGCDTK['419']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct419=number_format($dataBANGCDTK['419']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct419=number_format($dataBANGCDTK['419']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct421=number_format($dataBANGCDTK['421']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct421=number_format($dataBANGCDTK['421']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct421=number_format($dataBANGCDTK['421']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct421=number_format($dataBANGCDTK['421']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct421=number_format($dataBANGCDTK['421']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct421=number_format($dataBANGCDTK['421']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct4211=number_format($dataBANGCDTK['4211']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct4211=number_format($dataBANGCDTK['4211']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct4211=number_format($dataBANGCDTK['4211']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct4211=number_format($dataBANGCDTK['4211']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct4211=number_format($dataBANGCDTK['4211']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct4211=number_format($dataBANGCDTK['4211']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct4212=number_format($dataBANGCDTK['4212']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct4212=number_format($dataBANGCDTK['4212']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct4212=number_format($dataBANGCDTK['4212']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct4212=number_format($dataBANGCDTK['4212']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct4212=number_format($dataBANGCDTK['4212']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct4212=number_format($dataBANGCDTK['4212']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct511=number_format($dataBANGCDTK['511']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct511=number_format($dataBANGCDTK['511']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct511=number_format($dataBANGCDTK['511']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct511=number_format($dataBANGCDTK['511']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct511=number_format($dataBANGCDTK['511']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct511=number_format($dataBANGCDTK['511']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct5111=number_format($dataBANGCDTK['5111']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct5111=number_format($dataBANGCDTK['5111']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct5111=number_format($dataBANGCDTK['5111']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct5111=number_format($dataBANGCDTK['5111']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct5111=number_format($dataBANGCDTK['5111']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct5111=number_format($dataBANGCDTK['5111']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct5112=number_format($dataBANGCDTK['5112']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct5112=number_format($dataBANGCDTK['5112']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct5112=number_format($dataBANGCDTK['5112']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct5112=number_format($dataBANGCDTK['5112']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct5112=number_format($dataBANGCDTK['5112']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct5112=number_format($dataBANGCDTK['5112']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct5113=number_format($dataBANGCDTK['5113']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct5113=number_format($dataBANGCDTK['5113']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct5113=number_format($dataBANGCDTK['5113']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct5113=number_format($dataBANGCDTK['5113']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct5113=number_format($dataBANGCDTK['5113']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct5113=number_format($dataBANGCDTK['5113']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct5118=number_format($dataBANGCDTK['5118']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct5118=number_format($dataBANGCDTK['5118']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct5118=number_format($dataBANGCDTK['5118']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct5118=number_format($dataBANGCDTK['5118']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct5118=number_format($dataBANGCDTK['5118']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct5118=number_format($dataBANGCDTK['5118']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct515=number_format($dataBANGCDTK['515']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct515=number_format($dataBANGCDTK['515']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct515=number_format($dataBANGCDTK['515']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct515=number_format($dataBANGCDTK['515']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct515=number_format($dataBANGCDTK['515']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct515=number_format($dataBANGCDTK['515']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct611=number_format($dataBANGCDTK['611']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct611=number_format($dataBANGCDTK['611']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct611=number_format($dataBANGCDTK['611']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct611=number_format($dataBANGCDTK['611']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct611=number_format($dataBANGCDTK['611']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct611=number_format($dataBANGCDTK['611']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct631=number_format($dataBANGCDTK['631']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct631=number_format($dataBANGCDTK['631']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct631=number_format($dataBANGCDTK['631']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct631=number_format($dataBANGCDTK['631']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct631=number_format($dataBANGCDTK['631']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct631=number_format($dataBANGCDTK['631']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct632=number_format($dataBANGCDTK['632']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct632=number_format($dataBANGCDTK['632']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct632=number_format($dataBANGCDTK['632']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct632=number_format($dataBANGCDTK['632']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct632=number_format($dataBANGCDTK['632']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct632=number_format($dataBANGCDTK['632']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct635=number_format($dataBANGCDTK['635']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct635=number_format($dataBANGCDTK['635']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct635=number_format($dataBANGCDTK['635']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct635=number_format($dataBANGCDTK['635']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct635=number_format($dataBANGCDTK['635']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct635=number_format($dataBANGCDTK['635']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct642=number_format($dataBANGCDTK['642']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct642=number_format($dataBANGCDTK['642']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct642=number_format($dataBANGCDTK['642']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct642=number_format($dataBANGCDTK['642']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct642=number_format($dataBANGCDTK['642']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct642=number_format($dataBANGCDTK['642']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct6421=number_format($dataBANGCDTK['6421']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct6421=number_format($dataBANGCDTK['6421']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct6421=number_format($dataBANGCDTK['6421']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct6421=number_format($dataBANGCDTK['6421']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct6421=number_format($dataBANGCDTK['6421']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct6421=number_format($dataBANGCDTK['6421']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct6422=number_format($dataBANGCDTK['6422']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct6422=number_format($dataBANGCDTK['6422']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct6422=number_format($dataBANGCDTK['6422']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct6422=number_format($dataBANGCDTK['6422']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct6422=number_format($dataBANGCDTK['6422']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct6422=number_format($dataBANGCDTK['6422']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct711=number_format($dataBANGCDTK['711']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct711=number_format($dataBANGCDTK['711']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct711=number_format($dataBANGCDTK['711']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct711=number_format($dataBANGCDTK['711']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct711=number_format($dataBANGCDTK['711']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct711=number_format($dataBANGCDTK['711']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct811=number_format($dataBANGCDTK['811']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct811=number_format($dataBANGCDTK['811']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct811=number_format($dataBANGCDTK['811']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct811=number_format($dataBANGCDTK['811']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct811=number_format($dataBANGCDTK['811']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct811=number_format($dataBANGCDTK['811']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct821=number_format($dataBANGCDTK['821']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct821=number_format($dataBANGCDTK['821']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct821=number_format($dataBANGCDTK['821']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct821=number_format($dataBANGCDTK['821']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct821=number_format($dataBANGCDTK['821']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct821=number_format($dataBANGCDTK['821']['tongducock'],0,",","");

$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->ct911=number_format($dataBANGCDTK['911']['tongduno'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->ct911=number_format($dataBANGCDTK['911']['tongduco'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->ct911=number_format($dataBANGCDTK['911']['tongdunops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->ct911=number_format($dataBANGCDTK['911']['tongducops'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->ct911=number_format($dataBANGCDTK['911']['tongdunock'],0,",","");
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->ct911=number_format($dataBANGCDTK['911']['tongducock'],0,",","");

$tongCongNoDK = $dataBANGCDTK['111']['tongduno']+$dataBANGCDTK['112']['tongduno']+$dataBANGCDTK['121']['tongduno']+$dataBANGCDTK['128']['tongduno']+$dataBANGCDTK['131']['tongduno']+$dataBANGCDTK['133']['tongduno']+$dataBANGCDTK['136']['tongduno']+$dataBANGCDTK['138']['tongduno']+$dataBANGCDTK['141']['tongduno']+$dataBANGCDTK['151']['tongduno']+$dataBANGCDTK['152']['tongduno']+$dataBANGCDTK['153']['tongduno']+$dataBANGCDTK['154']['tongduno']+$dataBANGCDTK['155']['tongduno']+$dataBANGCDTK['156']['tongduno']+$dataBANGCDTK['157']['tongduno']+$dataBANGCDTK['211']['tongduno']+$dataBANGCDTK['214']['tongduno']+$dataBANGCDTK['217']['tongduno']+$dataBANGCDTK['228']['tongduno']+$dataBANGCDTK['229']['tongduno']+$dataBANGCDTK['241']['tongduno']+$dataBANGCDTK['242']['tongduno']+$dataBANGCDTK['331']['tongduno']+$dataBANGCDTK['333']['tongduno']+$dataBANGCDTK['334']['tongduno']+$dataBANGCDTK['335']['tongduno']+$dataBANGCDTK['336']['tongduno']+$dataBANGCDTK['338']['tongduno']+$dataBANGCDTK['341']['tongduno']+$dataBANGCDTK['352']['tongduno']+$dataBANGCDTK['353']['tongduno']+$dataBANGCDTK['356']['tongduno']+$dataBANGCDTK['411']['tongduno']+$dataBANGCDTK['413']['tongduno']+$dataBANGCDTK['418']['tongduno']+$dataBANGCDTK['419']['tongduno']+$dataBANGCDTK['421']['tongduno']+$dataBANGCDTK['511']['tongduno']+$dataBANGCDTK['515']['tongduno']+$dataBANGCDTK['611']['tongduno']+$dataBANGCDTK['631']['tongduno']+$dataBANGCDTK['632']['tongduno']+$dataBANGCDTK['635']['tongduno']+$dataBANGCDTK['642']['tongduno']+$dataBANGCDTK['711']['tongduno']+$dataBANGCDTK['811']['tongduno']+$dataBANGCDTK['821']['tongduno']+$dataBANGCDTK['911']['tongduno'];
$tongCongCoDK = $dataBANGCDTK['111']['tongduco']+$dataBANGCDTK['112']['tongduco']+$dataBANGCDTK['121']['tongduco']+$dataBANGCDTK['128']['tongduco']+$dataBANGCDTK['131']['tongduco']+$dataBANGCDTK['133']['tongduco']+$dataBANGCDTK['136']['tongduco']+$dataBANGCDTK['138']['tongduco']+$dataBANGCDTK['141']['tongduco']+$dataBANGCDTK['151']['tongduco']+$dataBANGCDTK['152']['tongduco']+$dataBANGCDTK['153']['tongduco']+$dataBANGCDTK['154']['tongduco']+$dataBANGCDTK['155']['tongduco']+$dataBANGCDTK['156']['tongduco']+$dataBANGCDTK['157']['tongduco']+$dataBANGCDTK['211']['tongduco']+$dataBANGCDTK['214']['tongduco']+$dataBANGCDTK['217']['tongduco']+$dataBANGCDTK['228']['tongduco']+$dataBANGCDTK['229']['tongduco']+$dataBANGCDTK['241']['tongduco']+$dataBANGCDTK['242']['tongduco']+$dataBANGCDTK['331']['tongduco']+$dataBANGCDTK['333']['tongduco']+$dataBANGCDTK['334']['tongduco']+$dataBANGCDTK['335']['tongduco']+$dataBANGCDTK['336']['tongduco']+$dataBANGCDTK['338']['tongduco']+$dataBANGCDTK['341']['tongduco']+$dataBANGCDTK['352']['tongduco']+$dataBANGCDTK['353']['tongduco']+$dataBANGCDTK['356']['tongduco']+$dataBANGCDTK['411']['tongduco']+$dataBANGCDTK['413']['tongduco']+$dataBANGCDTK['418']['tongduco']+$dataBANGCDTK['419']['tongduco']+$dataBANGCDTK['421']['tongduco']+$dataBANGCDTK['511']['tongduco']+$dataBANGCDTK['515']['tongduco']+$dataBANGCDTK['611']['tongduco']+$dataBANGCDTK['631']['tongduco']+$dataBANGCDTK['632']['tongduco']+$dataBANGCDTK['635']['tongduco']+$dataBANGCDTK['642']['tongduco']+$dataBANGCDTK['711']['tongduco']+$dataBANGCDTK['811']['tongduco']+$dataBANGCDTK['821']['tongduco']+$dataBANGCDTK['911']['tongduco'];
$tongCongNoPS = $dataBANGCDTK['111']['tongdunops']+$dataBANGCDTK['112']['tongdunops']+$dataBANGCDTK['121']['tongdunops']+$dataBANGCDTK['128']['tongdunops']+$dataBANGCDTK['131']['tongdunops']+$dataBANGCDTK['133']['tongdunops']+$dataBANGCDTK['136']['tongdunops']+$dataBANGCDTK['138']['tongdunops']+$dataBANGCDTK['141']['tongdunops']+$dataBANGCDTK['151']['tongdunops']+$dataBANGCDTK['152']['tongdunops']+$dataBANGCDTK['153']['tongdunops']+$dataBANGCDTK['154']['tongdunops']+$dataBANGCDTK['155']['tongdunops']+$dataBANGCDTK['156']['tongdunops']+$dataBANGCDTK['157']['tongdunops']+$dataBANGCDTK['211']['tongdunops']+$dataBANGCDTK['214']['tongdunops']+$dataBANGCDTK['217']['tongdunops']+$dataBANGCDTK['228']['tongdunops']+$dataBANGCDTK['229']['tongdunops']+$dataBANGCDTK['241']['tongdunops']+$dataBANGCDTK['242']['tongdunops']+$dataBANGCDTK['331']['tongdunops']+$dataBANGCDTK['333']['tongdunops']+$dataBANGCDTK['334']['tongdunops']+$dataBANGCDTK['335']['tongdunops']+$dataBANGCDTK['336']['tongdunops']+$dataBANGCDTK['338']['tongdunops']+$dataBANGCDTK['341']['tongdunops']+$dataBANGCDTK['352']['tongdunops']+$dataBANGCDTK['353']['tongdunops']+$dataBANGCDTK['356']['tongdunops']+$dataBANGCDTK['411']['tongdunops']+$dataBANGCDTK['413']['tongdunops']+$dataBANGCDTK['418']['tongdunops']+$dataBANGCDTK['419']['tongdunops']+$dataBANGCDTK['421']['tongdunops']+$dataBANGCDTK['511']['tongdunops']+$dataBANGCDTK['515']['tongdunops']+$dataBANGCDTK['611']['tongdunops']+$dataBANGCDTK['631']['tongdunops']+$dataBANGCDTK['632']['tongdunops']+$dataBANGCDTK['635']['tongdunops']+$dataBANGCDTK['642']['tongdunops']+$dataBANGCDTK['711']['tongdunops']+$dataBANGCDTK['811']['tongdunops']+$dataBANGCDTK['821']['tongdunops']+$dataBANGCDTK['911']['tongdunops'];
$tongCongCoPS = $dataBANGCDTK['111']['tongducops']+$dataBANGCDTK['112']['tongducops']+$dataBANGCDTK['121']['tongducops']+$dataBANGCDTK['128']['tongducops']+$dataBANGCDTK['131']['tongducops']+$dataBANGCDTK['133']['tongducops']+$dataBANGCDTK['136']['tongducops']+$dataBANGCDTK['138']['tongducops']+$dataBANGCDTK['141']['tongducops']+$dataBANGCDTK['151']['tongducops']+$dataBANGCDTK['152']['tongducops']+$dataBANGCDTK['153']['tongducops']+$dataBANGCDTK['154']['tongducops']+$dataBANGCDTK['155']['tongducops']+$dataBANGCDTK['156']['tongducops']+$dataBANGCDTK['157']['tongducops']+$dataBANGCDTK['211']['tongducops']+$dataBANGCDTK['214']['tongducops']+$dataBANGCDTK['217']['tongducops']+$dataBANGCDTK['228']['tongducops']+$dataBANGCDTK['229']['tongducops']+$dataBANGCDTK['241']['tongducops']+$dataBANGCDTK['242']['tongducops']+$dataBANGCDTK['331']['tongducops']+$dataBANGCDTK['333']['tongducops']+$dataBANGCDTK['334']['tongducops']+$dataBANGCDTK['335']['tongducops']+$dataBANGCDTK['336']['tongducops']+$dataBANGCDTK['338']['tongducops']+$dataBANGCDTK['341']['tongducops']+$dataBANGCDTK['352']['tongducops']+$dataBANGCDTK['353']['tongducops']+$dataBANGCDTK['356']['tongducops']+$dataBANGCDTK['411']['tongducops']+$dataBANGCDTK['413']['tongducops']+$dataBANGCDTK['418']['tongducops']+$dataBANGCDTK['419']['tongducops']+$dataBANGCDTK['421']['tongducops']+$dataBANGCDTK['511']['tongducops']+$dataBANGCDTK['515']['tongducops']+$dataBANGCDTK['611']['tongducops']+$dataBANGCDTK['631']['tongducops']+$dataBANGCDTK['632']['tongducops']+$dataBANGCDTK['635']['tongducops']+$dataBANGCDTK['642']['tongducops']+$dataBANGCDTK['711']['tongducops']+$dataBANGCDTK['811']['tongducops']+$dataBANGCDTK['821']['tongducops']+$dataBANGCDTK['911']['tongducops'];
$tongCongNoCK = $dataBANGCDTK['111']['tongdunock']+$dataBANGCDTK['112']['tongdunock']+$dataBANGCDTK['121']['tongdunock']+$dataBANGCDTK['128']['tongdunock']+$dataBANGCDTK['131']['tongdunock']+$dataBANGCDTK['133']['tongdunock']+$dataBANGCDTK['136']['tongdunock']+$dataBANGCDTK['138']['tongdunock']+$dataBANGCDTK['141']['tongdunock']+$dataBANGCDTK['151']['tongdunock']+$dataBANGCDTK['152']['tongdunock']+$dataBANGCDTK['153']['tongdunock']+$dataBANGCDTK['154']['tongdunock']+$dataBANGCDTK['155']['tongdunock']+$dataBANGCDTK['156']['tongdunock']+$dataBANGCDTK['157']['tongdunock']+$dataBANGCDTK['211']['tongdunock']+$dataBANGCDTK['214']['tongdunock']+$dataBANGCDTK['217']['tongdunock']+$dataBANGCDTK['228']['tongdunock']+$dataBANGCDTK['229']['tongdunock']+$dataBANGCDTK['241']['tongdunock']+$dataBANGCDTK['242']['tongdunock']+$dataBANGCDTK['331']['tongdunock']+$dataBANGCDTK['333']['tongdunock']+$dataBANGCDTK['334']['tongdunock']+$dataBANGCDTK['335']['tongdunock']+$dataBANGCDTK['336']['tongdunock']+$dataBANGCDTK['338']['tongdunock']+$dataBANGCDTK['341']['tongdunock']+$dataBANGCDTK['352']['tongdunock']+$dataBANGCDTK['353']['tongdunock']+$dataBANGCDTK['356']['tongdunock']+$dataBANGCDTK['411']['tongdunock']+$dataBANGCDTK['413']['tongdunock']+$dataBANGCDTK['418']['tongdunock']+$dataBANGCDTK['419']['tongdunock']+$dataBANGCDTK['421']['tongdunock']+$dataBANGCDTK['511']['tongdunock']+$dataBANGCDTK['515']['tongdunock']+$dataBANGCDTK['611']['tongdunock']+$dataBANGCDTK['631']['tongdunock']+$dataBANGCDTK['632']['tongdunock']+$dataBANGCDTK['635']['tongdunock']+$dataBANGCDTK['642']['tongdunock']+$dataBANGCDTK['711']['tongdunock']+$dataBANGCDTK['811']['tongdunock']+$dataBANGCDTK['821']['tongdunock']+$dataBANGCDTK['911']['tongdunock'];
$tongCongCoCK = $dataBANGCDTK['111']['tongducock']+$dataBANGCDTK['112']['tongducock']+$dataBANGCDTK['121']['tongducock']+$dataBANGCDTK['128']['tongducock']+$dataBANGCDTK['131']['tongducock']+$dataBANGCDTK['133']['tongducock']+$dataBANGCDTK['136']['tongducock']+$dataBANGCDTK['138']['tongducock']+$dataBANGCDTK['141']['tongducock']+$dataBANGCDTK['151']['tongducock']+$dataBANGCDTK['152']['tongducock']+$dataBANGCDTK['153']['tongducock']+$dataBANGCDTK['154']['tongducock']+$dataBANGCDTK['155']['tongducock']+$dataBANGCDTK['156']['tongducock']+$dataBANGCDTK['157']['tongducock']+$dataBANGCDTK['211']['tongducock']+$dataBANGCDTK['214']['tongducock']+$dataBANGCDTK['217']['tongducock']+$dataBANGCDTK['228']['tongducock']+$dataBANGCDTK['229']['tongducock']+$dataBANGCDTK['241']['tongducock']+$dataBANGCDTK['242']['tongducock']+$dataBANGCDTK['331']['tongducock']+$dataBANGCDTK['333']['tongducock']+$dataBANGCDTK['334']['tongducock']+$dataBANGCDTK['335']['tongducock']+$dataBANGCDTK['336']['tongducock']+$dataBANGCDTK['338']['tongducock']+$dataBANGCDTK['341']['tongducock']+$dataBANGCDTK['352']['tongducock']+$dataBANGCDTK['353']['tongducock']+$dataBANGCDTK['356']['tongducock']+$dataBANGCDTK['411']['tongducock']+$dataBANGCDTK['413']['tongducock']+$dataBANGCDTK['418']['tongducock']+$dataBANGCDTK['419']['tongducock']+$dataBANGCDTK['421']['tongducock']+$dataBANGCDTK['511']['tongducock']+$dataBANGCDTK['515']['tongducock']+$dataBANGCDTK['611']['tongducock']+$dataBANGCDTK['631']['tongducock']+$dataBANGCDTK['632']['tongducock']+$dataBANGCDTK['635']['tongducock']+$dataBANGCDTK['642']['tongducock']+$dataBANGCDTK['711']['tongducock']+$dataBANGCDTK['811']['tongducock']+$dataBANGCDTK['821']['tongducock']+$dataBANGCDTK['911']['tongducock'];




$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->No->tongCong=$tongCongNoDK;
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuDauKy->Co->tongCong=$tongCongCoDK;
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->No->tongCong=$tongCongNoPS;
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoPhatSinhTrongKy->Co->tongCong=$tongCongCoPS;
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->No->tongCong=$tongCongNoCK ;
$xmlload->HSoKhaiThue->PLuc->PL_CDTK->SoDuCuoiKy->Co->tongCong=$tongCongCoCK ;

file_put_contents($_SESSION['DRIVER_PM']."/datafile/".$_SESSION['MST']."/".$_SESSION['NienDo']."/133_B01A_BCTC_{$version}.xml", $xmlload->asXML());

?>