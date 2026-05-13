<?php
include("../../config.php");
$OBJCT = new baocaothue();
$tungay = $_GET['tungay'];
$loaitokhai = $_GET['loaitokhai'];

$denngay = $_GET['denngay'];

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;

$captaikhoan = $_GET['intheothuesuat'];
$intheochungtu= $_GET['intheochungtu'];
$sapxeptheohoadon= $_GET['sapxeptheohoadon'];
$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];

    $str_w=" loaitokhai='".$loaitokhai."'";
    $OBJCT->setStrOderby($str_w);

$danhsachthuetndn = $OBJCT->loadDanhSachToKhai_TNDN();// lấy số đầu kỳ trong bản cdtk

$_SESSION["THONGTINPHIEU"]['thangtk'] = "Từ  " .dd_mm_yyy($tungay) ." đến " .dd_mm_yyy($denngay);


$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $_GET['ngayhoadon'];
$_SESSION["THONGTINPHIEU"]['incaptk'] = $captaikhoan;

//$_SESSION["LISTCTSONHATKY"] = array_merge($array_dk,$array_ck);
//$dataBCDTK = $OBJCT->load_danhsach_bangcd_ketoan(0,6,$danhsachbangcandoitk);
//foreach ($dataBCDTK as $itemCT){
    //$value1.= "('".$itemCT['matk']."','".$itemCT['matsnv']."','".$itemCT['tentsnv']."','".$itemCT['maso']."','".$itemCT['matsnvcha']."','".$itemCT['loaitsnv']."','".$itemCT['sddk']."','".$itemCT['sdck']."','".$itemCT['CAP']."'),";
//}
//database::re_query("TRUNCATE bangcdkt");
//$sql_ins1 = "insert into bangcdkt(matk,matsnv,tentsnv,maso,matsnvcha,loaitsnv,sodudk,soduck,cap) VALUE ".substr($value1, 0,-1);
//database::re_query("$sql_ins1");


//foreach ($dataBCDTK as $itemListCD){
  //  $data_cdkt[$itemListCD['loaitsnv']][] = $itemListCD;
//}
$_SESSION["LISTTHUETNDN"]=$danhsachthuetndn;
//$_SESSION["LISTCTBCDTKNO"] = $array_no;
//$_SESSION["LISTCTBCDTKCO"] = $array_co;




