<?php
include("../../config.php");
 unset($_SESSION['BAOCAO_SUDUNGHD']);
 unset($_SESSION['TongSoDu']);
$OBJCT = new baocaothue();

$tuthang = $_GET['tungay'];

$quy = $_GET['denngay'];

$intheothuesuat = $_GET['intheothuesuat'];
$tonghopcanam = $_GET['tonghopcanam'];
$intheochungtu= $_GET['intheochungtu'];
$sapxeptheohoadon= $_GET['sapxeptheohoadon'];
$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];
$ngayhoadon= $_GET['ngayhoadon'];

if($tonghopcanam=="true"){
    $data = $OBJCT->loadDanhSachBCHoaDonTon_CaNam();
}else{
    $data = $OBJCT->loadDanhSachBCHoaDonTon($quy);
}
//debug($data);
$_SESSION["THONGTINPHIEU_BCHD"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU_BCHD"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU_BCHD"]['ngayhoadon'] = $ngayhoadon;

$_SESSION['BAOCAO_SUDUNGHD'] = $data;
$tongsodu=0;
$dem=0;
foreach ($data as $Items){
    $tong= abs($Items['tondenso']-$Items['tontuso']);
    if(($Items['tontuso']!=0 || $Items['tondenso']!=0)){
        $tong = $tong+1;
    }
    $tongsodu+=$tong;
    //echo $tong."<br/>";
}
$_SESSION['TongSoDu'] = $tongsodu+$dem;
