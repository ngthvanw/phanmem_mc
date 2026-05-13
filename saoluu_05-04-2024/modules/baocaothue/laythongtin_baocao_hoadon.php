<?php
include("../../config.php");
$OBJCT = new baocaothue();
$chitiet = 2;
$tungay = $_GET['tungay'];

$denngay = $_GET['denngay'];

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;

$intheothuesuat = $_GET['intheothuesuat'];
$intheochungtu= $_GET['intheochungtu'];
$sapxeptheohoadon= $_GET['sapxeptheohoadon'];
$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];
$tmp_thue = array(2=>0,3=>5, 4=>10, 5=>20);// Danh sách thuế
if($intheothuesuat==1){
    $array_thue = $tmp_thue;
}else{
    $array_thue=array($tmp_thue[$intheothuesuat]);
}
$array_dungchung = array(0,1);
$str_thue = implode(",",$array_thue);
foreach ($array_dungchung as $itemDungChung){
    $str_w=" and dungchung=".$itemDungChung." and thuesuat in(".$str_thue.") and ngayghiso >='".$tungay."' and ngayghiso<= '".$denngay."'";
    $str_w2=" and dungchung=".$itemDungChung." and thuesuat1 in(".$str_thue.") and ngayghiso >='".$tungay."' and ngayghiso<='".$denngay."'";
    $OBJCT->setStrOderby($str_w);
    $OBJCT->setStrOderby2($str_w2);
	if($chitiet==1){
		$data1 = $OBJCT->load_danhsach_muavao();// thông tin tồn đầu kỳ
	}else{
		$data1 = $OBJCT->load_danhsach_muavao_group($sapxeptheohoadon);
		$data2 = $OBJCT->load_danhsach_muavao2_group($sapxeptheohoadon);
	}
    if($data1[0]!="" && $data2[0]!=""){
		$dataCT[$itemDungChung]=array_merge($data1,$data2);
	}
	if($data1[0]!="" && $data2[0]==""){
		$dataCT[$itemDungChung]=$data1;
	}
	if($data1[0]=="" && $data2[0]!=""){
		$dataCT[$itemDungChung]=$data2;
	}
}

$_SESSION["THONGTINPHIEU"]['thangtk'] = "Từ  " .dd_mm_yyy($tungay) ." đến " .dd_mm_yyy($denngay);

$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $_GET['ngayhoadon'];
$_SESSION["LISTCTMUAVAO"] = $dataCT;





