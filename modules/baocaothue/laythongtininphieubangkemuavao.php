<?php
include("../../config.php");
$OBJCT = new baocaothue();
$chitiet = $_GET['kieuin'];// loại bảng kê tổng hợp hoặc chi tiết
$tungay = $_GET['tungay'];

$denngay = $_GET['denngay'];

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;
$loaibangke = $_GET['loaibangke'];
$loaithue = $_GET['loaithue'];

$chinhanh = $_GET['chinhanh'];

$intheothuesuat = $_GET['intheothuesuat'];
$intheochungtu= $_GET['intheochungtu'];
$sapxeptheohoadon= $_GET['sapxeptheohoadon'];
$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];
$tmp_thue = $intheothuesuat;// Danh sách thuế

// Nếu danh mục hàng hoá cột thuế suất trống thì cập nhập về 10%
$OBJCT->re_query("UPDATE mavt SET rate = '10' WHERE rate = '';");
$OBJCT->re_query("UPDATE chitiet_psvt SET thuesuat = '10' WHERE thuesuat = '';");

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
$array_dungchung = array(1,2,3,4,5);

//debug($ListKHCHa);
$str_thue = str_replace(",","','",$tmp_thue);
foreach ($array_dungchung as $itemDungChung){
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

        $str_w = " and loaihanghoadichvu=" . $itemDungChung . " and thuesuat in('" . $str_thue . "') and ngaykhaithue >='" . $tungay . "' and ngaykhaithue<= '" . $denngay . "' and maloai='".$intheochungtu."' and duandautu='".$loaithue."' {$SQL_W_ChiNhanh} ";
        $str_w2 = " and loaihanghoadichvu=" . $itemDungChung . " and thuesuat1 in('" . $str_thue . "') and ngaykhaithue >='" . $tungay . "' and ngaykhaithue<='" . $denngay . "' and maloai='".$intheochungtu."' and duandautu='".$loaithue."' {$SQL_W_ChiNhanh} ";
    }else if($loaibangke=="0"){// Tờ khai bổ sung
		if($_SESSION['NienDo']<2024){
			//Cập nhật lại ngày khai bổ sung là ngày hoá đơn thành ngày khai thuế thành ngày khai bổ sung
			$OBJCT->re_query("update psvt set ngaykhaithue=ngayhoadon,congaykhaithue=1 where loaitokhai='0' and congaykhaithue=0");
			$OBJCT->re_query("update chitiet_pskt set ngaykhaithue=ngayhoadon,congaykhaithue=1 where loaitokhai='0' and congaykhaithue=0");
		}
		
        $str_w = " and loaihanghoadichvu=" . $itemDungChung . " and thuesuat in('" . $str_thue . "') and ngaykhaithue >='" . $tungay . "' and ngaykhaithue<= '" . $denngay . "' and maloai='".$intheochungtu."' and duandautu='".$loaithue."' {$SQL_W_ChiNhanh} ";
        $str_w2 = " and loaihanghoadichvu=" . $itemDungChung . " and thuesuat1 in('" . $str_thue . "') and ngaykhaithue >='" . $tungay . "' and ngaykhaithue<='" . $denngay . "' and maloai='".$intheochungtu."' and duandautu='".$loaithue."' {$SQL_W_ChiNhanh} ";
    }else if($loaibangke=="1"){// Tờ khai chính thức
        $str_w = " and loaihanghoadichvu=" . $itemDungChung . " and thuesuat in('" . $str_thue . "') and ngaykhaithue >='" . $tungay . "' and ngaykhaithue<= '" . $denngay . "' and maloai='".$intheochungtu."' and duandautu='".$loaithue."' {$SQL_W_ChiNhanh} ";
        $str_w2 = " and loaihanghoadichvu=" . $itemDungChung . " and thuesuat1 in('" . $str_thue . "') and ngaykhaithue >='" . $tungay . "' and ngaykhaithue<='" . $denngay . "' and maloai='".$intheochungtu."' and duandautu='".$loaithue."' {$SQL_W_ChiNhanh} ";
    }
    $OBJCT->setStrOderby($str_w);
    $OBJCT->setStrOderby2($str_w2);
	if($chitiet==1){
		$data1 = $OBJCT->load_danhsach_muavao($sapxeptheohoadon,$ListKHCHa,$loaibangke);// thông tin tồn đầu kỳ
	}else{
		$data1 = $OBJCT->load_danhsach_muavao_group($sapxeptheohoadon,$ListKHCHa,$loaibangke);
		$data2 = $OBJCT->load_danhsach_muavao2_group($sapxeptheohoadon,$ListKHCHa,$loaibangke);
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
    //$dataCT[$itemDungChung]=$data1;
}
$_SESSION["THONGTINPHIEU"]['thangtk'] = "Từ  " .dd_mm_yyy($tungay) ." đến " .dd_mm_yyy($denngay);

$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $_GET['ngayhoadon'];
$_SESSION["LISTCTMUAVAO"] = $dataCT;





