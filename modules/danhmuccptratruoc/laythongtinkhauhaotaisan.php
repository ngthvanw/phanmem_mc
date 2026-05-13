<?php
include("../../config.php");
unset($_SESSION['DSKHAUHAOTAISAN']);
unset($_SESSION['DSKHAUHAOTAISANTHANG']);
$OBJ = new danhmuccptratruoc();
$tuthang = $_GET['tuthang'];
$denthang = $_GET['denthang'];
$tenphieu = $_GET['tenphieu'];
$ngaylap = $_GET['ngaylap'];
$ngayhoadon = $_GET['ngayhd'];
$loai = $_GET['loai'];
$tonghopcanam = $_GET['tonghopcanam'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $ngaylap;
$_SESSION["THONGTINPHIEU"]['tenphieu'] = $tenphieu;
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $ngayhoadon;
if($tonghopcanam=="true"){
    if($loai=='xdcb'){
        $OBJ->set_orderby(" manhomts in (1536)");
    }else{
        $OBJ->set_orderby(" manhomts not in (1536)");
    }
    $data = $OBJ->loadListKhauHaoTaiSan(12);
    if($loai=='xdcb'){
        $OBJ->set_orderby(" SUBSTRING(matk,1,3)=241");
    }else{
        $OBJ->set_orderby(" SUBSTRING(matk,1,3)!=241");
    }
    $data_tu_den = $OBJ->loadBangKHTaiSan_Tu_Den(1,12);
}else{
    if($loai=='xdcb'){
        $OBJ->set_orderby(" manhomts in (1536)");
    }else{
        $OBJ->set_orderby(" manhomts not in (1536)");
    }
    $data = $OBJ->loadListKhauHaoTaiSan($denthang);
    if($loai=='xdcb'){
        $OBJ->set_orderby(" SUBSTRING(matk,1,3)=241");
    }else{
        $OBJ->set_orderby(" SUBSTRING(matk,1,3)!=241");
    }
    $data_tu_den = $OBJ->loadBangKHTaiSan_Tu_Den($tuthang,$denthang);
}

$_SESSION['DSKHAUHAOTAISAN'] = $data;
$dataTS=0;
$i=0;
foreach ($data as $itemTS){
$dataTK[$itemTS['tkno']][$itemTS['mats']]= $itemTS['tienno'];
    $i++;
}
foreach ($dataTK as $k=>$itemTKTS){
    $dataTKTS[][$k] = $itemTKTS;
}
$_SESSION['DSKHAUHAOTAISANTHANG'] = $data_tu_den;

foreach($data_tu_den as $MaCCDC=>$Item_DSPB_DenThang){
	$Gia_Tri_Cuoi_DS = end($Item_DSPB_DenThang);
	$DSCCDC_PB_Thang_Cuoi[$MaCCDC]= $Gia_Tri_Cuoi_DS;
}
$_SESSION['DSKHAUHAOTAISAN_CUOITHANG'] = $DSCCDC_PB_Thang_Cuoi;
