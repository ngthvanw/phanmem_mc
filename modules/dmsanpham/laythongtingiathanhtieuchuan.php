<?php
include("../../config.php");
unset($_SESSION["LISTDSSPTINHGIATHANH"]);
unset($_SESSION["THONGTINPHIEUDSSPTINHGIATHANH"]);
unset($_SESSION["THONGTINPHIEUDSSPTINHGIATHANHCT"]);
$OBJCT = new dmsanpham();

$thang = $_GET['tungay'];

$xemtonghopmasp = $_GET['xemtonghopmasp'];

$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];
$matk =  str_replace(",","','",$_GET['mavt']);
if($xemtonghopmasp=="true"){
    $danhsach_masp = $OBJCT->loadListMaSP_TuBangGiaThanh_Co_Key_La_Ma($thang);
}else{
    $OBJCT->set_orderby("masp in ('".$matk."') ");
    $danhsach_masp = $OBJCT->loadListMaSP_TuBangGiaThanh_Co_Key_La_Ma($thang);
}

foreach ($danhsach_masp as $ItemMaSP){
    $datactt[$ItemMaSP['masp']] = $OBJCT->loadList_TuBang_NVL_NC_CPC($ItemMaSP['masp'],$thang);
}

foreach ($datactt as $kmasp=>$ItemNVL){
    $tongmasp = 0;
    $tongnvl = 0;
    $tongnc=0;
    $tongsxc = 0;
    $tongcm = 0;
    foreach ($ItemNVL as $itemnvl){
        $tongmasp+=$itemnvl['thanhtien'];
        if($itemnvl['loaivl']==""){
            $tongnvl+=$itemnvl['thanhtien'];
        }else if($itemnvl['loaivl']=="NC"){
            $tongnc+=$itemnvl['thanhtien'];
        }else if($itemnvl['loaivl']=="SXC"){
            $tongsxc+=$itemnvl['thanhtien'];
        }else if($itemnvl['loaivl']=="CM"){
            $tongcm+=$itemnvl['thanhtien'];
    }
    }

    $danhsach_masp[$kmasp]['tongmasp'] = $tongmasp;
    $danhsach_masp[$kmasp]['tongnvl'] = $tongnvl;
    $danhsach_masp[$kmasp]['tongnc'] = $tongnc;
    $danhsach_masp[$kmasp]['tongsxc'] = $tongsxc;
    $danhsach_masp[$kmasp]['tongcm'] = $tongcm;
}

//debug($danhsach_masp);

$_SESSION["THONGTINPHIEUDSSPTINHGIATHANHCT"] = $datactt;
$_SESSION["THONGTINPHIEUDSSPTINHGIATHANH"]['thangtk'] = "Từ  " .dd_mm_yyy($tungay) ." đến " .dd_mm_yyy($denngay);

//$OBJCT->loadListDanhSachTKChiTiet();

$_SESSION["THONGTINPHIEUDSSPTINHGIATHANH"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEUDSSPTINHGIATHANH"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEUDSSPTINHGIATHANH"]['ngayhoadon'] = $_GET['ngayhoadon'];

$_SESSION["LISTDSSPTINHGIATHANH"] = $danhsach_masp;

debug($datactt);




