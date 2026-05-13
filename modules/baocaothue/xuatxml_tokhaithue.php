<?php
session_start();
include("../../config.php");
$OBJCT = new baocaothue();
$thangtinhthue = $_GET['thangtinhthue'];

$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];
$loaitokhai= $_GET['loaitokhai'];

switch ($thangtinhthue) {
    case 1:
        $KTTheo = "M";
        $tenthang = "1/" . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-31";

        $tungaytruoc = "0000-00-00";
        $denngaytruoc = "0000-00-00";

        break;
    case 2:
        $KTTheo = "M";
        $tenthang = "2/" . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        if($_SESSION['NienDo']%4==0){
            $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-29";
        }else{
            $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-28";
        }

        $tungaytruoc = $_SESSION['NienDo'] . "-1-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-1-31";
        break;
    case 3:
        $KTTheo = "M";
        $tenthang = "3/" . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-31";

        $tungaytruoc = $_SESSION['NienDo'] . "-2-1";
        if($_SESSION['NienDo']%4==0){
            $denngaytruoc = $_SESSION['NienDo'] . "-2-29";
        }else{
            $denngaytruoc = $_SESSION['NienDo'] . "-2-28";
        }
        break;
    case 4:
        $KTTheo = "M";
        $tenthang = "4/" . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-30";

        $tungaytruoc = $_SESSION['NienDo'] . "-3-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-3-31";
        break;
    case 5:
        $KTTheo = "M";
        $tenthang = "5/" . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-31";

        $tungaytruoc = $_SESSION['NienDo'] . "-4-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-4-30";
        break;
    case 6:
        $KTTheo = "M";
        $tenthang = "6/" . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-30";

        $tungaytruoc = $_SESSION['NienDo'] . "-5-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-5-31";
        break;
    case 7:
        $KTTheo = "M";
        $tenthang = " 7/" . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-31";

        $tungaytruoc = $_SESSION['NienDo'] . "-6-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-6-30";
        break;
    case 8:
        $KTTheo = "M";
        $tenthang = " 8/" . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-31";

        $tungaytruoc = $_SESSION['NienDo'] . "-7-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-7-31";

        break;
    case 9:
        $KTTheo = "M";
        $tenthang = "9/" . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-30";

        $tungaytruoc = $_SESSION['NienDo'] . "-8-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-8-31";
        break;
    case 10:
        $KTTheo = "M";
        $tenthang = "10/" . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-31";

        $tungaytruoc = $_SESSION['NienDo'] . "-9-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-9-31";
        break;
    case 11:
        $KTTheo = "M";
        $tenthang = "11/" . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-30";


        $tungaytruoc = $_SESSION['NienDo'] . "-10-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-10-31";
        break;
    case 12:
        $KTTheo = "M";
        $tenthang = "12/" . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-31";

        $tungaytruoc = $_SESSION['NienDo'] . "-11-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-11-30";
        break;

    case "I":
        $KTTheo = "Q";
        $tenthang = "1/" . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-1-1";
        $denngay = $_SESSION['NienDo'] . "-3-31";

        $tungaytruoc = "0000-00-00";
        $denngaytruoc = "0000-00-00";
        break;
    case "II":
        $KTTheo = "Q";
        $tenthang = "2/" . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-4-1";
        $denngay = $_SESSION['NienDo'] . "-6-30";

        $tungaytruoc = $_SESSION['NienDo'] . "-1-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-3-31";
        break;
    case "III":
        $KTTheo = "Q";
        $tenthang = "3/" . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-7-1";
        $denngay = $_SESSION['NienDo'] . "-9-30";

        $tungaytruoc = $_SESSION['NienDo'] . "-4-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-6-30";
        break;
    case "IV":
        $KTTheo = "Q";
        $tenthang = " 4/" . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-10-1";
        $denngay = $_SESSION['NienDo'] . "-12-31";

        $tungaytruoc = $_SESSION['NienDo'] . "-7-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-9-30";

        break;
    case "V":
        $tungay = $_SESSION['NienDo'] . "-1-1";
        $denngay = $_SESSION['NienDo'] . "-12-31";
        break;

}

$data = $OBJCT->load_danhsach_tokhai($thangtinhthue,$loaitokhai);// thông tin tồn đầu kỳ

//debug($data);
$xmlload = simplexml_load_file( $_SESSION['DRIVER_PM']."/tmp/01_GTGT.xml");

/// ------ Thông tin tờ khai --------------------------
$xmlload->HSoKhaiThue->TTinChung->TTinTKhaiThue->NNT->mst=$_SESSION['MST'];
$xmlload->HSoKhaiThue->TTinChung->TTinTKhaiThue->NNT->tenNNT=$_SESSION['TenCongTy'];
$xmlload->HSoKhaiThue->TTinChung->TTinTKhaiThue->NNT->dchiNNT=$_SESSION['DiaChi'];

$xmlload->HSoKhaiThue->TTinChung->TTinTKhaiThue->TKhaiThue->KyKKhaiThue->kieuKy=$KTTheo;
$xmlload->HSoKhaiThue->TTinChung->TTinTKhaiThue->TKhaiThue->KyKKhaiThue->kyKKhai=$tenthang;
$xmlload->HSoKhaiThue->TTinChung->TTinTKhaiThue->TKhaiThue->KyKKhaiThue->kyKKhaiTuNgay=date("d-m-Y",strtotime($tungay));
$xmlload->HSoKhaiThue->TTinChung->TTinTKhaiThue->TKhaiThue->KyKKhaiThue->kyKKhaiDenNgay=date("d-m-Y",strtotime($denngay));
$xmlload->HSoKhaiThue->TTinChung->TTinTKhaiThue->TKhaiThue->ngayLapTKhai = date("Y-m-d");
$xmlload->HSoKhaiThue->TTinChung->TTinTKhaiThue->TKhaiThue->ngayKy = date("Y-m-d");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->ngayLap =date("Y-m-d");



/// ------ Thông tin bảng cân đối kế toán --------------------------
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->ct21=number_format($data['A']['thue'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->ct22=number_format($data['B']['thue'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->GiaTriVaThueGTGTHHDVMuaVao->ct23=number_format($data['I1']['gthh'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->GiaTriVaThueGTGTHHDVMuaVao->ct24=number_format($data['I2']['thue'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->ct25=number_format($data['I2']['thue'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->ct26=number_format($data['II1']['gthh'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->HHDVBRaChiuThueGTGT->ct27=number_format($data['II2']['gthh'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->HHDVBRaChiuThueGTGT->ct28=number_format($data['II2']['thue'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->ct29=number_format($data['II2a']['gthh'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->HHDVBRaChiuTSuat5->ct30=number_format($data['II2b']['gthh'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->HHDVBRaChiuTSuat5->ct31=number_format($data['II2b']['thue'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->HHDVBRaChiuTSuat10->ct32=number_format($data['II2c']['gthh'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->HHDVBRaChiuTSuat10->ct33=number_format($data['II2c']['thue'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->HHDVBRaKhongTinhThue->ct32a=number_format($data['II2d']['gthh'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->TongDThuVaThueGTGTHHDVBRa->ct34=number_format($data['II3']['gthh'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->TongDThuVaThueGTGTHHDVBRa->ct35=number_format($data['II3']['thue'],0,",","");

$xmlload->HSoKhaiThue->CTieuTKhaiChinh->ct36=number_format($data['III']['thue'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->ct37=number_format($data['IV1']['thue'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->ct38=number_format($data['IV2']['thue'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->ct39=number_format($data['V']['thue'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->ct40a=number_format($data['VI1']['thue'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->ct40b=number_format($data['VI2']['thue'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->ct40=number_format($data['VI3']['thue'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->ct41=number_format($data['VI4']['thue'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->ct42=number_format($data['VI41']['thue'],0,",","");
$xmlload->HSoKhaiThue->CTieuTKhaiChinh->ct43=number_format($data['VI42']['thue'],0,",","");


file_put_contents($_SESSION['DRIVER_PM']."/datafile/".$_SESSION['MST']."/".$_SESSION['NienDo']."/01_GTGT.xml", $xmlload->asXML());

?>