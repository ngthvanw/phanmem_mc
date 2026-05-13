<?php
include("../../config.php");
$OBJCT = new baocaothue();
$tungay = $_GET['tungay'];
$denngay = $_GET['denngay'];
$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;
$chinhanh = $_GET['chinhanh'];
$loaibangke = "ALL";
$SQL_W_ChiNhanh ="";
if($chinhanh=="" || $chinhanh=="ALL"){
}else{
    $SQL_W_ChiNhanh =" and machinhanh='".$chinhanh."'";
}
if($loaibangke=='ALL'){// Tất cả tờ khai
    if($_SESSION['NienDo']<2024){
        //Cập nhật lại ngày khai bổ sung là ngày hoá đơn thành ngày khai thuế thành ngày khai bổ sung
        $OBJCT->re_query("update psvt set ngaykhaithue=ngayhoadon,congaykhaithue=1 where loaitokhai='0' and congaykhaithue=0");
        $OBJCT->re_query("update chitiet_pskt set ngaykhaithue=ngayhoadon,congaykhaithue=1 where loaitokhai='0' and congaykhaithue=0");
    }
    $str_w = " and thuesuat='8' and ngaykhaithue >='" . $tungay . "' and ngaykhaithue<= '" . $denngay . "' and maloai='1' {$SQL_W_ChiNhanh}";
    $str_w2 = " and thuesuat1='8' and ngaykhaithue >='" . $tungay . "' and ngaykhaithue<='" . $denngay . "' and maloai='1' {$SQL_W_ChiNhanh}";
}
$OBJCT->setStrOderby($str_w);
$OBJCT->setStrOderby2($str_w2);
$data_BanRa = $OBJCT->load_danhsach_banra_PLGiamThue();
$data_MuaVao = $OBJCT->load_danhsach_muavao_PLGiamThue();
$_SESSION['PLGiamThueGTGTMuaVao'] = $data_MuaVao ;
$_SESSION['PLGiamThueGTGTBanRa'] = $data_BanRa ;
header('Content-Type: application/json');
$data = array('status' => 'success', 'data1' => 'value1', 'data2' => 'value2');
echo json_encode($data);