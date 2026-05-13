<?php
include("../../config.php");
$OBJCT = new ketoantonghop();
$tungay = $_GET['tungay'];

$denngay = $_GET['denngay'];
$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;
$intheothuesuat = $_GET['intheothuesuat'];
$intheochungtu= $_GET['intheochungtu'];
$sapxeptheohoadon= $_GET['sapxeptheohoadon'];
$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];

$sql= "select matk from matk";
$query = $OBJCT->re_query($sql);
$matk_str = "";
while ($result = $OBJCT->re_fetch($query)){
    $matk_str.=$result['matk'].",";
}
$matk = substr($matk_str,0,-1);
$str_w=" and ngayghiso >='".$tungay."' and ngayghiso<= '".$denngay."'";
$str_w2=" and ngayghiso >='".$tungay."' and ngayghiso<='".$denngay."'";
$OBJCT->setStrOderby($str_w);
$OBJCT->setStrOderby2($str_w2);

$dataChi = $OBJCT->load_danhsach_socai_chi_theotk($matk, "ALL","ngayghiso");// lấy tất cả thu chi
foreach ($dataChi as $itemTH){
    $STT = 0;
    foreach ($itemTH as $itemCT) {
        $dataSoNhatKy[$itemCT['maphieu']][] = $itemCT;
    }
}

$_SESSION["THONGTINPHIEU"]['thangtk'] = "Từ  " .dd_mm_yyy($tungay) ." đến " .dd_mm_yyy($denngay);
$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $_GET['ngayhoadon'];
$_SESSION["LISTCTSONHATKY"] = $dataSoNhatKy;


