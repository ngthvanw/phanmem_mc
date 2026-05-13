<?php
include("../../config.php");
$OBJCT = new baocaothue();
$thangtinhthue = $_GET['thangtinhthue'];

$loaitokhai= $_GET['loaitokhai'];
switch ($thangtinhthue) {
    case 1:
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-31";
        break;
    case 2:
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
		if($nam%4==0){
                $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-29";
            }else{
                $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-28";
            }
        break;
    case 3:
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-31";
        break;
    case 4:
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-30";
        break;
    case 5:
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-31";
        break;
    case 6:
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-30";
        break;
    case 7:
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-31";
        break;
    case 8:
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-31";
        break;
    case 9:
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-30";
        break;
    case 10:
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-31";
        break;
    case 11:
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-30";
        break;
    case 12:
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-31";
        break;
    case "I":
        $tungay = $_SESSION['NienDo'] . "-1-1";
        $denngay = $_SESSION['NienDo'] . "-3-31";
        break;
    case "II":
        $tungay = $_SESSION['NienDo'] . "-4-1";
        $denngay = $_SESSION['NienDo'] . "-6-30";
        break;
    case "III":
        $tungay = $_SESSION['NienDo'] . "-7-1";
        $denngay = $_SESSION['NienDo'] . "-9-30";
        break;
    case "IV":
        $tungay = $_SESSION['NienDo'] . "-10-1";
        $denngay = $_SESSION['NienDo'] . "-12-31";
        break;
    case "V":
        $tungay = $_SESSION['NienDo'] . "-1-1";
        $denngay = $_SESSION['NienDo'] . "-12-31";
        break;

}
$sapxeptheohoadon = "ngayhoadon";
$tmp_thue = array(2 => 0, 3 => 5, 4 => 10, 5 => 20,6=>"-0",7=>"k");// Danh sách thuế
$array_thue = $tmp_thue;
$array_dungchung = array(0, 1);
$str_thue = implode("','", $array_thue);
$tongtienmuavao = 0;
$tongthuemuavao = 0;
foreach ($array_dungchung as $itemDungChung) {
    if($loaitokhai==0){
        $str_w = " and dungchung=" . $itemDungChung . " and thuesuat in('" . $str_thue . "') and ((ngayhoadon >='" . $tungay . "' and ngayhoadon<= '" . $denngay . "') or (ngayghiso >='" . $tungay . "' and ngayghiso<= '" . $denngay . "'))";
        $str_w2 = " and dungchung=" . $itemDungChung . " and thuesuat1 in('" . $str_thue . "') and ((ngayhoadon >='" . $tungay . "' and ngayhoadon<='" . $denngay . "') or (ngayghiso >='" . $tungay . "' and ngayghiso<= '" . $denngay . "'))";
    }else{
        $str_w = " and dungchung=" . $itemDungChung . " and thuesuat in('" . $str_thue . "') and (ngayghiso >='" . $tungay . "' and ngayghiso<= '" . $denngay . "')";
        $str_w2 = " and dungchung=" . $itemDungChung . " and thuesuat1 in('" . $str_thue . "') and (ngayghiso >='" . $tungay . "' and ngayghiso<='" . $denngay . "')";
    }
    $OBJCT->setStrOderby($str_w);
    $OBJCT->setStrOderby2($str_w2);
    $data1 = $OBJCT->load_danhsach_muavao_group_bosung($sapxeptheohoadon);
    $data2 = $OBJCT->load_danhsach_muavao2_group_bosung($sapxeptheohoadon);
    if($data1[0]!="" && $data2[0]!=""){
        $dataCT[$itemDungChung]=array_merge($data1,$data2);
    }
    if($data1[0]!="" && $data2[0]==""){
        $dataCT[$itemDungChung]=$data1;
    }
    if($data1[0]=="" && $data2[0]!=""){
        $dataCT[$itemDungChung]=$data2;
    }
    //$dataCT[$itemDungChung]=$data1;

}

foreach ($dataCT as $Itemmuavao) {// Lấy tổng thuế và tổng tiền mua vào
    foreach ($Itemmuavao as $Itemmuavao1) {// Lấy tổng thuế và tổng tiền mua vào
        $tongtienmuavao += $Itemmuavao1['thanhtien'];
        $tongthuemuavao += $Itemmuavao1['thue'];
    }
}
/////////////////Bán Ra//////////////////////////////////
$tmp_thue1 = array(2=>0,3=>5, 4=>10, 5=>20,6=>"k");// Danh sách thuế

$array_thue1 = $tmp_thue1;

foreach ($array_thue1 as $itemThue){
    if($loaitokhai==0) {
        $str_w = " and thuesuat='" . $itemThue . "' and ((ngayhoadon >='" . $tungay . "' and ngayhoadon<= '" . $denngay . "') or (ngayghiso >='" . $tungay . "' and ngayghiso<= '" . $denngay . "'))";
        $str_w2 = " and thuesuat1='" . $itemThue . "' and ((ngayhoadon >='" . $tungay . "' and ngayhoadon<='" . $denngay . "') or (ngayghiso >='" . $tungay . "' and ngayghiso<= '" . $denngay . "'))";
    }else{
        $str_w = " and thuesuat='" . $itemThue . "' and ngayghiso >='" . $tungay . "' and ngayghiso<= '" . $denngay . "'";
        $str_w2 = " and thuesuat1='" . $itemThue . "' and ngayghiso >='" . $tungay . "' and ngayghiso<='" . $denngay . "'";
    }
    $OBJCT->setStrOderby($str_w);
    $OBJCT->setStrOderby2($str_w2);
    $data1 = $OBJCT->load_danhsach_banra_bosung_group("","sct");// thông tin tồn đầu kỳ
    $dataCT1[$itemThue]=$data1;
}
$array_banra="";
$tongthuebanra=0;
$tongthuebanra=0;
foreach ($dataCT1 as $k=>$Itembanra) {// Lấy tổng thuế và tổng tiền mua vào
    $tongtienbanra_ct = 0;
    foreach ($Itembanra as $Itembanra1) {// Lấy tổng thuế và tổng tiền mua vào
        $tongtienbanra += $Itembanra1['thanhtien'];
        $tongthuebanra += $Itembanra1['thue'];

        $tongtienbanra_ct+=$Itembanra1['thanhtien'];
    }
    $array_banra_ct[$k]['tongtien'] = $tongtienbanra_ct;
}

    $array_banra['tongtien'] = $tongtienmuavao;
    $array_banra['tongthue'] = $tongthuemuavao;
    $array_banra['tongtienbr'] = $tongtienbanra;
    $array_banra['tongthuebr'] = $tongthuebanra;
    $array_banra['chitienbr'] = $array_banra_ct;


//debug($dataCT1);
echo json_encode($array_banra);




