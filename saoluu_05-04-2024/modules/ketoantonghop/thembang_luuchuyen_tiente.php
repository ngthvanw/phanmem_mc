<?php
include("../../config.php");
$OBJCT = new ketoantonghop();
$OBJBCT = new baocaothue();
$tungay = $_GET['tungay'];

$denngay = $_GET['denngay'];

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;

$captaikhoan = $_GET['intheothuesuat'];
$intheochungtu= $_GET['intheochungtu'];
$sapxeptheohoadon= $_GET['sapxeptheohoadon'];
$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];
//-----------------------------------------------------------------------------
$str_w=" and ngayghiso <'".$tungay."' and ngayghiso<= '".$denngay."'";
$str_w2=" and ngayghiso <'".$tungay."' and ngayghiso<='".$denngay."'";
$OBJCT->setStrOderby($str_w);
$OBJCT->setStrOderby2($str_w2);

$danhsachbangcandoitk = $OBJCT->load_danhsach_bangcdtk();// lấy số đầu kỳ trong bản cdtk

$MaTK_All_Con = $OBJCT->loadMaKHALL_TraVeChuoiMaTK("111','112','113");
$str_matk_tknodk = implode(",",$MaTK_All_Con);
$dataTKDK = $OBJCT->load_danhsach_socai_dk_theotk($str_matk_tknodk,"ALL","sott");// Lấy chinh tiết sổ cái

//---------------------------------------------------------------------
    $str_w=" and ngayghiso >='".$tungay."' and ngayghiso<= '".$denngay."'";
    $str_w2=" and ngayghiso >='".$tungay."' and ngayghiso<='".$denngay."'";
    $OBJCT->setStrOderby($str_w);
    $OBJCT->setStrOderby2($str_w2);

$dataLCTT = $OBJBCT->loadDanhSachLuuChuyen_TienTe_CoMa();

foreach ($dataLCTT as $itemLCTT){
    $tongtien = "tongtien" . $itemLCTT['maso'];
    $MaTK_All_Con = $OBJCT->loadMaKHALL_TraVeChuoiMaTK(str_replace(";","','",$itemLCTT['tkno']));
    $str_matk_tkno = implode(",",$MaTK_All_Con);

    $MaTK_All_Con = $OBJCT->loadMaKHALL_TraVeChuoiMaTK(str_replace(";","','",$itemLCTT['tkco']));
    $str_matk_tkco = implode(",",$MaTK_All_Con);

    if(substr($itemLCTT['tkno'],0,3)=='111'){
        $dataTK = $OBJCT->load_danhsach_socai_theotk_no_co($str_matk_tknodk, "ALL", $str_matk_tkco);// Lấy chinh tiết sổ cái
    }else{
        $dataTK = $OBJCT->load_danhsach_socai_theotk_no_co($str_matk_tknodk, "ALL", $str_matk_tkno);// Lấy chinh tiết sổ cái
    }

    $tongno = 0;
    $tongco = 0;
    foreach ($dataTK as $itemTK){
        $tongno+=$itemTK['tienno'];
        $tongco+=$itemTK['tienco'];
    }
    $sotien = 0;
    if(substr($itemLCTT['tkno'],0,3)=='111'){
        $sotien = $tongno;
    }else{
        $sotien = -($tongco);
    }
    if($itemLCTT['maso']=='60' || $itemLCTT['maso']=='70'){
        //$sotien = $danhsachbangcandoitk['111']['nodk']+$danhsachbangcandoitk['112']['nodk']+$danhsachbangcandoitk['113']['nodk'];
        $sotien = 0;
    }
    $$tongtien=$sotien;
    $sql_update = "update luuchuyentiente set soduck = '".$sotien."' where sott='".$itemLCTT['sott']."'";
    database::re_query($sql_update);
}

$ARR_TKDK = explode(";",$dataLCTT[60]['tkno']);
$tongtien60 = 0;
foreach ($ARR_TKDK as $itemTKCK){
    $tongtien60+= $danhsachbangcandoitk[$itemTKCK]['nodk'];
}


$ARR_TKCK = explode(";",$dataLCTT[70]['tkno']);
$SOCUOIKY = 0;
foreach ($ARR_TKCK as $itemTKCK){
    $SOCUOIKY+= $danhsachbangcandoitk[$itemTKCK]['nock'];
}

$tongtien20 =  $tongtien1+$tongtien2+$tongtien3+$tongtien4+$tongtien5+$tongtien6+$tongtien7;
$tongtien30 =  $tongtien21+$tongtien22+$tongtien23+$tongtien24+$tongtien25+$tongtien26+$tongtien27;
$tongtien40 =  $tongtien31+$tongtien32+$tongtien33+$tongtien34+$tongtien35+$tongtien36;
$tongtien50 =  $tongtien20+$tongtien30+$tongtien40;
$tongtien70 =  $tongtien50+$tongtien60+$tongtien61;

$ChenhLech = $tongtien70-$SOCUOIKY;

$tongtien2 = $tongtien2-$ChenhLech;
$tongtien20 =  $tongtien1+$tongtien2+$tongtien3+$tongtien4+$tongtien5+$tongtien6+$tongtien7;
$tongtien50 =  $tongtien20+$tongtien30+$tongtien40;
$tongtien70 =  $tongtien50+$tongtien60+$tongtien61;

database::re_query(" update luuchuyentiente set soduck=" . $tongtien2 . " where maso='2'");
database::re_query(" update luuchuyentiente set soduck=" . $tongtien20 . " where maso='20'");
database::re_query(" update luuchuyentiente set soduck=" . $tongtien30 . " where maso='30'");
database::re_query(" update luuchuyentiente set soduck=" . $tongtien40 . " where maso='40'");
database::re_query(" update luuchuyentiente set soduck=" . $tongtien50 . " where maso='50'");
database::re_query(" update luuchuyentiente set soduck=" . $tongtien60 . " where maso='60'");
database::re_query(" update luuchuyentiente set soduck=" . $tongtien70 . " where maso='70'");