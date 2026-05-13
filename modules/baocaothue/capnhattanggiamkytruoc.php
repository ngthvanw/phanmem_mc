<?php
include("../../config.php");
$OBJCT = new baocaothue();
$thangtinhthue = $_GET['thangtinhthue'];
$namtinhthue = $_GET['namtinhthue'];
$machinhanh = $_GET['machinhanh'];
$loaitokhai= $_GET['loaitokhai'];
switch ($thangtinhthue) {
    case 1:
        $tungay = $namtinhthue . "-" . $thangtinhthue . "-1";
        $denngay = $namtinhthue . "-" . $thangtinhthue . "-31";
        break;
    case 2:
        $tungay = $namtinhthue . "-" . $thangtinhthue . "-1";
		if($nam%4==0){
                $denngay = $namtinhthue . "-" . $thangtinhthue . "-29";
            }else{
                $denngay = $namtinhthue . "-" . $thangtinhthue . "-28";
            }
        break;
    case 3:
        $tungay = $namtinhthue . "-" . $thangtinhthue . "-1";
        $denngay = $namtinhthue . "-" . $thangtinhthue . "-31";
        break;
    case 4:
        $tungay = $namtinhthue . "-" . $thangtinhthue . "-1";
        $denngay = $namtinhthue . "-" . $thangtinhthue . "-30";
        break;
    case 5:
        $tungay = $namtinhthue . "-" . $thangtinhthue . "-1";
        $denngay = $namtinhthue . "-" . $thangtinhthue . "-31";
        break;
    case 6:
        $tungay = $namtinhthue . "-" . $thangtinhthue . "-1";
        $denngay = $namtinhthue . "-" . $thangtinhthue . "-30";
        break;
    case 7:
        $tungay = $namtinhthue . "-" . $thangtinhthue . "-1";
        $denngay = $namtinhthue . "-" . $thangtinhthue . "-31";
        break;
    case 8:
        $tungay = $namtinhthue . "-" . $thangtinhthue . "-1";
        $denngay = $namtinhthue . "-" . $thangtinhthue . "-31";
        break;
    case 9:
        $tungay = $namtinhthue . "-" . $thangtinhthue . "-1";
        $denngay = $namtinhthue . "-" . $thangtinhthue . "-30";
        break;
    case 10:
        $tungay = $namtinhthue . "-" . $thangtinhthue . "-1";
        $denngay = $namtinhthue . "-" . $thangtinhthue . "-31";
        break;
    case 11:
        $tungay = $namtinhthue . "-" . $thangtinhthue . "-1";
        $denngay = $namtinhthue . "-" . $thangtinhthue . "-30";
        break;
    case 12:
        $tungay = $namtinhthue . "-" . $thangtinhthue . "-1";
        $denngay = $namtinhthue . "-" . $thangtinhthue . "-31";
        break;
    case "I":
        $tungay = $namtinhthue . "-1-1";
        $denngay = $namtinhthue . "-3-31";
        break;
    case "II":
        $tungay = $namtinhthue . "-4-1";
        $denngay = $namtinhthue . "-6-30";
        break;
    case "III":
        $tungay = $namtinhthue . "-7-1";
        $denngay = $namtinhthue . "-9-30";
        break;
    case "IV":
        $tungay = $namtinhthue . "-10-1";
        $denngay = $namtinhthue . "-12-31";
        break;
    case "V":
        $tungay = $namtinhthue . "-1-1";
        $denngay = $namtinhthue . "-12-31";
        break;

}
$sapxeptheohoadon = "ngayhoadon";
$tmp_thue = $ThueSuat_BangKe_MuaVao;// Danh sách thuế
$array_thue = $tmp_thue;
$array_dungchung = array(0, 1);
$str_thue = implode("','", $array_thue);
$tongtienmuavao = 0;
$tongthuemuavao = 0;
foreach ($array_dungchung as $itemDungChung) {
    $SQL_W_ChiNhanh ="";
    if($machinhanh=="" || $machinhanh=="ALL"){

    }else{
        $SQL_W_ChiNhanh =" and machinhanh='".$machinhanh."'";
    }
    if($loaitokhai==0){// Là tờ khai bổ sung	
		if($_SESSION['NienDo']<2024){
			//Cập nhật lại ngày khai bổ sung là ngày hoá đơn thành ngày khai thuế thành ngày khai bổ sung
			$OBJCT->re_query("update psvt set ngaykhaithue=ngayhoadon,congaykhaithue=1 where loaitokhai='0' and congaykhaithue=0");
			$OBJCT->re_query("update chitiet_pskt set ngaykhaithue=ngayhoadon,congaykhaithue=1 where loaitokhai='0' and congaykhaithue=0");
		}		
        $str_w = " and dungchung=" . $itemDungChung . " and thuesuat in('" . $str_thue . "') and ((ngaykhaithue >='" . $tungay . "' and ngaykhaithue<= '" . $denngay . "')) and duandautu='0' {$SQL_W_ChiNhanh} ";
        $str_w2 = " and dungchung=" . $itemDungChung . " and thuesuat1 in('" . $str_thue . "') and ((ngaykhaithue >='" . $tungay . "' and ngaykhaithue<='" . $denngay . "')) and duandautu='0' {$SQL_W_ChiNhanh} ";
    }else{// Là tờ khai chính thức
        $str_w = " and dungchung=" . $itemDungChung . " and thuesuat in('" . $str_thue . "') and (ngaykhaithue >='" . $tungay . "' and ngaykhaithue<= '" . $denngay . "') and duandautu='0' {$SQL_W_ChiNhanh} ";
        $str_w2 = " and dungchung=" . $itemDungChung . " and thuesuat1 in('" . $str_thue . "') and (ngaykhaithue >='" . $tungay . "' and ngaykhaithue<='" . $denngay . "') and duandautu='0' {$SQL_W_ChiNhanh} ";
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
$tmp_thue1 = $ThueSuat_BangKe_BanRa;// Danh sách thuế

$array_thue1 = $tmp_thue1;

foreach ($array_thue1 as $itemThue){
    $SQL_W_ChiNhanh ="";
    if($chinhanh=="" || $chinhanh=="ALL"){

    }else{
        $SQL_W_ChiNhanh =" and machinhanh='".$chinhanh."'";
    }
    if($loaitokhai==0) {// Là tờ khai bổ sung		
		//Cập nhật lại ngày khai bổ sung là ngày hoá đơn thành ngày khai thuế thành ngày khai bổ sung
        $OBJCT->re_query("update psvt set ngaykhaithue=ngayhoadon,congaykhaithue=1 where loaitokhai='0' and congaykhaithue=0");
        $OBJCT->re_query("update chitiet_pskt set ngaykhaithue=ngayhoadon,congaykhaithue=1 where loaitokhai='0' and congaykhaithue=0");
		
        $str_w = " and thuesuat='" . $itemThue . "' and ((ngaykhaithue >='" . $tungay . "' and ngaykhaithue<= '" . $denngay . "')) {$SQL_W_ChiNhanh} ";
        $str_w2 = " and thuesuat1='" . $itemThue . "' and ((ngaykhaithue >='" . $tungay . "' and ngaykhaithue<='" . $denngay . "')) {$SQL_W_ChiNhanh} ";
    }else{// Là tờ khai chính thức
        $str_w = " and thuesuat='" . $itemThue . "' and ngaykhaithue >='" . $tungay . "' and ngaykhaithue<= '" . $denngay . "' {$SQL_W_ChiNhanh} ";
        $str_w2 = " and thuesuat1='" . $itemThue . "' and ngaykhaithue >='" . $tungay . "' and ngaykhaithue<='" . $denngay . "' {$SQL_W_ChiNhanh} ";
    }
    $OBJCT->setStrOderby($str_w);
    $OBJCT->setStrOderby2($str_w2);
    $data1 = $OBJCT->load_danhsach_banra_bosung_group("","sct");// thông tin tồn đầu kỳ
    $dataCT1[$itemThue]=$data1;
}
$array_banra="";
$tongtienbanra=0;
$tongthuebanra=0;
foreach ($dataCT1 as $k=>$Itembanra) {// Lấy tổng thuế và tổng tiền mua vào
    $tongtienbanra_ct = 0;
    $tongtienthuebanra_ct = 0;
    foreach ($Itembanra as $Itembanra1) {// Lấy tổng thuế và tổng tiền mua vào
        $tongtienbanra += $Itembanra1['thanhtien'];
        $tongthuebanra += $Itembanra1['thue'];
        $tongtienbanra_ct+=$Itembanra1['thanhtien'];
        $tongtienthuebanra_ct+=$Itembanra1['thue'];
    }
    $array_banra_ct[$k]['tongtien'] = $tongtienbanra_ct;
    $array_banra_ct[$k]['tongthue'] = $tongtienthuebanra_ct;
}

    $array_banra['tongtien'] = $tongtienmuavao;
    $array_banra['tongthue'] = $tongthuemuavao;
    $array_banra['tongtienbr'] = $tongtienbanra;
    $array_banra['tongthuebr'] = $tongthuebanra;
    $array_banra['chitienbr'] = $array_banra_ct;

echo json_encode($array_banra);