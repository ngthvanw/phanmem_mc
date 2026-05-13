<?php
include("../../config.php");
 //error_reporting(E_ALL);
$OBJCT = new baocaothue();
$chitiet =$_GET['kieuin']; // loaiban kê tổng hợp hoặc chi tiết
$tungay = $_GET['tungay'];

$denngay = $_GET['denngay'];

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;

$loaibangke = $_GET['loaibangke'];

$chinhanh = $_GET['chinhanh'];

$intheothuesuat = $_GET['intheothuesuat'];
$intheochungtu= $_GET['intheochungtu'];
$sapxeptheohoadon= $_GET['sapxeptheohoadon'];
$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];
$tmp_thue = $intheothuesuat;// Danh sách thuế
$array_thue= explode(",",$tmp_thue);
function load_doanhngiep($dir){
    $fp1 = @fopen($dir."/".'info.db', "r"); // đọc thông tin chung
    $string_info = explode(":",giaima2chieu(fgets($fp1)));
    fclose($fp1);
    return ($string_info);
}
$arr_doanhnghiep = load_doanhngiep($driver."/datafile/".$_SESSION['MST']);
$ListKHCHa="";
if($arr_doanhnghiep[7]==2){
    $ListKHCHa = $OBJCT->loadListMaKH_CHA();
}
foreach ($array_thue as $itemThue){
    $SQL_W_ChiNhanh ="";
    if($chinhanh=="" || $chinhanh=="ALL"){

    }else{
        $SQL_W_ChiNhanh =" and machinhanh='".$chinhanh."'";
    }
    if($loaibangke=='ALL'){// Tất cả tờ khai
        $OBJCT->re_query("update psvt set ngaykhaithue=ngayhoadon,congaykhaithue=1 where loaitokhai='0'");
        $OBJCT->re_query("update chitiet_pskt set ngaykhaithue=ngayhoadon,congaykhaithue=1 where loaitokhai='0'");

        $str_w = " and thuesuat='" . $itemThue . "' and ngaykhaithue >='" . $tungay . "' and ngaykhaithue<= '" . $denngay . "' and maloai='".$intheochungtu."' {$SQL_W_ChiNhanh}";
        $str_w2 = " and thuesuat1='" . $itemThue . "' and ngaykhaithue >='" . $tungay . "' and ngaykhaithue<='" . $denngay . "' and maloai='".$intheochungtu."' {$SQL_W_ChiNhanh}";
    }else  if($loaibangke=="0"){// Tờ khai bổ sung
        $str_w = " and thuesuat='" . $itemThue . "' and ngayhoadon >='" . $tungay . "' and ngayhoadon<= '" . $denngay . "' and maloai='".$intheochungtu."' {$SQL_W_ChiNhanh}";
        $str_w2 = " and thuesuat1='" . $itemThue . "' and ngayhoadon >='" . $tungay . "' and ngayhoadon<='" . $denngay . "' and maloai='".$intheochungtu."' {$SQL_W_ChiNhanh}";
    }else if($loaibangke=="1") {// Tờ khai chính thức
        $str_w = " and thuesuat='" . $itemThue . "' and ngaykhaithue >='" . $tungay . "' and ngaykhaithue<= '" . $denngay . "' and maloai='".$intheochungtu."' {$SQL_W_ChiNhanh}";
        $str_w2 = " and thuesuat1='" . $itemThue . "' and ngaykhaithue >='" . $tungay . "' and ngaykhaithue<='" . $denngay . "' and maloai='".$intheochungtu."' {$SQL_W_ChiNhanh}";
    }
    $OBJCT->setStrOderby($str_w);
    $OBJCT->setStrOderby2($str_w2);

	if($chitiet==1){
		$data1 = $OBJCT->load_danhsach_banra($ListKHCHa,$sapxeptheohoadon,$loaibangke);//  Lấy thông tin hàng hóa bán ra chính thức chi tiết
	}else{
		$data1 = $OBJCT->load_danhsach_banra_group($ListKHCHa,$sapxeptheohoadon,$loaibangke);// Lấy thông tin hàng hóa bán ra chính thức tổng hợp
		//$data2 = $OBJCT->load_danhsach_banra2_group($ListKHCHa);// thông tin tồn đầu kỳ
	}
   /*if($data1[0]!="" && $data2[0]!=""){
		$dataCT[$itemThue]=array_merge($data1,$data2);
	}
	if($data1[0]!="" && $data2[0]==""){
		$dataCT[$itemThue]=$data1;
	}
	if($data1[0]=="" && $data2[0]!=""){
		$dataCT[$itemThue]=$data2;
	}*/
    $dataCT[$itemThue]=$data1;
}
$newarray = array();
foreach($dataCT as $k=>$v) if($v) $newarray[$k] = $v;
//debug($dataCT);
$_SESSION["THONGTINPHIEU"]['thangtk'] = "Từ  " .dd_mm_yyy($tungay) ." đến " .dd_mm_yyy($denngay);

$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $_GET['ngayhoadon'];
$_SESSION["LISTCTBANRA"] = $newarray;


