<?php
include("../../config.php");

$OBJCT = new dmsanpham();

$thang = $_GET['tungay'];


$xemtonghopmasp = $_GET['xemtonghopmasp'];


$matk =  str_replace(",","','",$_GET['mavt']);
if($xemtonghopmasp=="true"){
    $danhsach_masp = $OBJCT->loadListMaSP_Co_Key_La_Ma();
}else{
    $OBJCT->set_orderby("masp in ('".$matk."') ");
    $danhsach_masp = $OBJCT->loadListMaSP_Co_Key_La_Ma();
}

foreach ($danhsach_masp as $ItemMaSP){
    $datactt[$ItemMaSP['masp']] = $OBJCT->loadListNVL_NC_CPC($ItemMaSP['masp'],$thang);
}
$val = "";
foreach ($datactt as $kmasp=>$ItemNVL){
    foreach ($ItemNVL as $itemnvl){
        $val.="('".$kmasp."','".$itemnvl['mavt']."','".$itemnvl['tenvt']."','".$itemnvl['dvt']."','".$itemnvl['dinhmuc']."','".$itemnvl['dongia']."','".$itemnvl['thanhtien']."','".$itemnvl['loaivl']."','".$thang."'),";
    }
}
$OBJCT->re_query(" delete from banggiathanhtieuchuan");
$OBJCT->re_query("insert into banggiathanhtieuchuan(masp,mavt,tenvt,dvt,dinhmuc,dongia,thanhtien,loaivl,thang) VALUES ".substr($val,0,-1));




