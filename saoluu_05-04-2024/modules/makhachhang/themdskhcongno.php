<?php
include("../../config.php");
$OBJ = new makhachhang;
database::re_query("UPDATE pskt SET makh_nh = '' WHERE (loaiphieu!=3 and loaiphieu!=4) or tenkh_nh='';");// update khách hàng không có trong thu chi
$re_result = database::re_query("select tkno as tk from dinhkhoan_psvt where tkno in ($String_tkno_KH) 
                                UNION ALL
                                select tkco as tk from dinhkhoan_psvt where tkco in ($String_tkno_KH) 
                                UNION ALL
                                select tkco as tk from pskt where tkco in ($String_tkno_KH)
                                UNION ALL
                                select tkno1 as tk from chitiet_pskt where tkno1 in ($String_tkno_KH)
                                UNION ALL 
                                select matk as tk from sdcn where matk in ($String_tkno_KH)
                                UNION ALL
                                select tkno2 as tk from chitiet_pskt where tkno2 in ($String_tkno_KH)");
$re_data = database::re_fetch_all($re_result);

foreach ($re_data as $itemtkno){
    $arr_tkno_KH[$itemtkno['tk']] = $itemtkno['tk'];
}
database::re_query("DELETE FROM tmp_dskhcn WHERE NOT EXISTS (select makh from makh WHERE tmp_dskhcn.makh  = makh.makh )");
$string_sql="";
foreach ($arr_tkno_KH as $ItemTKNoKH) {
    $sql="INSERT INTO tmp_dskhcn (makh,matk,makhcha) SELECT makh,{$ItemTKNoKH},makhcha FROM makh where not EXISTS (select makh from tmp_dskhcn where makh.makh =tmp_dskhcn.makh and matk='".$ItemTKNoKH."'  ) ";
    database::re_query("$sql");
}

//////////////////////////////////////////////////////////////
$OBJCT = new ketoantonghop();
$tungay = $_GET['tungay'];

$denngay = $_GET['denngay'];

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;

$captaikhoan = $_GET['intheothuesuat'];
$makhachhang = $_GET['makhachhang'];

$string_makh = $OBJ->loadMaKHALL_TraVeChuoiMaKH($makhachhang);
$string_makh_da_thaythe = str_replace(",", "','", substr($string_makh, 0, -1));

$sql_mkh="";
$sql_mkh2="";
$sql_mkh1="";
if($makhachhang=="ALL"){

}else{
    $sql_mkh = " and tmp_dskhcn.makh in ('" . $string_makh_da_thaythe . "')";
    $sql_mkh1 = " and sdcn.makh in ('" . $string_makh_da_thaythe . "') ";
}

$intheochungtu= $_GET['intheochungtu'];
$sapxeptheohoadon= $_GET['sapxeptheohoadon'];
$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];


$_SESSION["THONGTINPHIEU"]['thangtk'] = "Từ  " .dd_mm_yyy($tungay) ." đến " .dd_mm_yyy($denngay);

//$OBJCT->loadListDanhSachTKChiTiet();

$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $_GET['ngayhoadon'];
$_SESSION["THONGTINPHIEU"]['incaptk'] = $captaikhoan;
///Bảng danh sách công nợ đầu kỳ từ ngày đến ngày
//// Bảng công nợ từ ngày đến ngày
$str_w=" and ngayghiso >'".$_SESSION['kyketoan_tungay']."' and ngayghiso< '".$tungay."' and chitiet_pskt.tkno1 in (".$String_tkno_KH.")";
$str_w2=" and ngayghiso >'".$_SESSION['kyketoan_tungay']."' and ngayghiso<'".$tungay."' and dinhkhoan_psvt.tkno in (".$String_tkno_KH.")";

$str_w3=" and ngayghiso >'".$_SESSION['kyketoan_tungay']."' and ngayghiso< '".$tungay."' and chitiet_pskt.tkno2 in (".$String_tkno_KH.")";
$str_w4=" and ngayghiso >'".$_SESSION['kyketoan_tungay']."' and ngayghiso<'".$tungay."' and dinhkhoan_psvt.tkco in (".$String_tkno_KH.")";

$str_w5=" and ngayghiso >'".$_SESSION['kyketoan_tungay']."' and ngayghiso< '".$tungay."' and pskt.tkco in (".$String_tkno_KH.")";
$str_w6=" and ngayghiso >'".$_SESSION['kyketoan_tungay']."' and ngayghiso< '".$tungay."' and pskt.tkco in (".$String_tkno_KH.")";

$OBJCT->setStrOderby($str_w);
$OBJCT->setStrOderby2($str_w2);
$OBJCT->setStrOderby3($str_w3);
$OBJCT->setStrOderby4($str_w4);
$OBJCT->setStrOderby5($str_w5);

$dataNo_dk = $OBJCT->load_danhsach_sonhatky_ghino();
$dataCo_dk = $OBJCT->load_danhsach_sonhatky_ghico();
//----------------------------------------------

$dataNoDK = $OBJCT->load_danhsach_nokhachhang_dk(0,"");
//debug($dataNoDK);

//// Bảng công nợ từ ngày đến ngày
$str_w=" and ngayghiso >='".$tungay."' and ngayghiso<= '".$denngay."' and chitiet_pskt.tkno1 in (".$String_tkno_KH.")";
$str_w2=" and ngayghiso >='".$tungay."' and ngayghiso<='".$denngay."' and dinhkhoan_psvt.tkno in (".$String_tkno_KH.")";

$str_w3=" and ngayghiso >='".$tungay."' and ngayghiso<= '".$denngay."' and chitiet_pskt.tkno2 in (".$String_tkno_KH.")";
$str_w4=" and ngayghiso >='".$tungay."' and ngayghiso<='".$denngay."' and dinhkhoan_psvt.tkco in (".$String_tkno_KH.")";

$str_w5=" and ngayghiso >='".$tungay."' and ngayghiso<= '".$denngay."' and pskt.tkco in (".$String_tkno_KH.")";
$str_w6=" and ngayghiso >='".$tungay."' and ngayghiso<= '".$denngay."' and pskt.tkco in (".$String_tkno_KH.")";

$OBJCT->setStrOderby($str_w);
$OBJCT->setStrOderby2($str_w2);
$OBJCT->setStrOderby3($str_w3);
$OBJCT->setStrOderby4($str_w4);
$OBJCT->setStrOderby5($str_w5);

$dataThu = $OBJCT->load_danhsach_sonhatky_ghino();
$dataChi = $OBJCT->load_danhsach_sonhatky_ghico();

$array_no=$dataThu;
$array_co=$dataChi;

//debug($array_no);
//echo "-------------------";
//debug($array_co);
///---------------------------------------------------------------------------------------------------------

$dataBCDTK = $OBJCT->load_danhsach_nokhachhang($makhachhang,6,$array_no,$array_co,$sql_mkh,$dataNoDK,$dataNo_dk,$dataCo_dk);

foreach ($dataBCDTK as $itemCT){
        $ma = $itemCT['makh'].$itemCT['matk'];
        $arr_dayky = $dataNoDK[$ma];
	    if ( $itemCT["tongduno"] != 0 || $itemCT["tongduno"] != 0) {
            $soduno= $itemCT["tongduno"];
        } else {
            $soduno= $itemCT["soduno"];
        }

		if ( $itemCT["tongduco"] != 0 || $itemCT["tongduco"] != "") {
            $soduco= $itemCT["tongduco"];
        } else {
            $soduco= $itemCT["soduco"];
        }

		if ($itemCT["tongdunops"] != "" || $itemCT["tongdunops"] != 0) {
            $sodunops = $itemCT["tongdunops"];
        } else {
            $sodunops=$itemCT["sodunops"];
        }
		
		if ($itemCT["tongducops"] != "" || $itemCT["tongducops"] != 0) {
            $soducops=$itemCT["tongducops"];
        } else {
            $soducops=$itemCT["soducops"];
        }

    if ( $itemCT["tongdunont"] != 0 || $itemCT["tongdunont"] != 0) {
        $sodunont= $itemCT["tongdunont"];
    } else {
        $sodunont= $itemCT["sodunont"];
    }

    if ( $itemCT["tongducont"] != 0 || $itemCT["tongducont"] != "") {
        $soducont= $itemCT["tongducont"];
    } else {
        $soducont= $itemCT["soducont"];
    }

    if ($itemCT["tongdunontps"] != "" || $itemCT["tongdunontps"] != 0) {
        $sodunontps = $itemCT["tongdunontps"];
    } else {
        $sodunontps=$itemCT["sodunontps"];
    }

    if ($itemCT["tongducontps"] != "" || $itemCT["tongducontps"] != 0) {
        $soducontps=$itemCT["tongducontps"];
    } else {
        $soducontps=$itemCT["soducontps"];
    }

		$soducktinh = ($soduno+$sodunops) - ($soduco+$soducops);
		$soducktinh_ = ($arr_dayky["soduno"]+$itemCT["sodunops"]) - ($arr_dayky["soduco"]+$itemCT["soducops"]);
		$soducock=0;
		$soducock_=0;
		$sodunock=0;
		$sodunock_=0;
		if($itemCT["tongdunock"]==0 && $itemCT["tongducock"]==0){
            if($soducktinh>=0){
               $sodunock = ($soduno+$sodunops) - ($soduco+$soducops);
            }else{
                $soducock = ($soduco+$soducops) - ($soduno+$sodunops);
            }
        }else{

            $sodunock = $itemCT["tongdunock"];
            $soducock = $itemCT["tongducock"];
        }

		if($soducktinh_>=0){
            $sodunock_ = ($arr_dayky["soduno"]+$itemCT["sodunops"]) - ($arr_dayky["soduco"]+$itemCT["soducops"]);
		}else{
			$soducock_ = abs(($arr_dayky["soduno"]+$itemCT["sodunops"]) - ($arr_dayky["soduco"]+$itemCT["soducops"]));
		}

    $soduntcktinh = ($sodunont+$sodunontps) - ($soducont+$soducontps);
    $soduntcktinh_ = ($arr_dayky["sodunont"]+$itemCT["sodunontps"]) - ($arr_dayky["soducont"]+$itemCT["soducontps"]);
    $soducontck=0;
    $soducontck_=0;
    $sodunontck=0;
    $sodunontck_=0;
    if($soduntcktinh>=0){
        $sodunontck = ($sodunont+$sodunontps) - ($soducont+$soducontps);
    }else{
        $soducontck = ($soducont+$soducontps) - ($sodunont+$sodunontps);
    }
    if($soduntcktinh>=0){
        $sodunontck_ = ($arr_dayky["sodunont"]+$itemCT["sodunontps"]) - ($arr_dayky["soducont"]+$itemCT["soducontps"]);
    }else{
        $soducontck_ = abs(($arr_dayky["sodunont"]+$itemCT["sodunontps"]) - ($arr_dayky["soducont"]+$itemCT["soducontps"]));
    }

		if($soduno==0 && $soduco==0 && $sodunops==0 && $soducops==0)
		{
			
		}else{
			$value1.= "('".$itemCT['makh']."','".addslashes($itemCT['tenkh'])."','".$itemCT['matk']."','".$soduno."','".$soduco."','".$sodunops."','".$soducops."','".$sodunock."','".$soducock."','".$itemCT['makhcha']."','".$sodunock_."','".$soducock_."','".$sodunont."','".$soducont."','".$sodunontps."','".$soducontps."','".$sodunontck."','".$soducontck."','".$sodunontck_."','".$soducontck_."','".$itemCT['loaitien']."','".$itemCT['manhom']."','{$itemCT['makh']}_{$itemCT['matk']}'),";
		}
    }
database::re_query("delete from cnkh");
database::re_query("ALTER TABLE cnkh AUTO_INCREMENT=1;");
$sql_ins1 = "insert into cnkh(makh,tenkh,matk,nodk,codk,nops,cops,nock,cock,makhcha,nock_,cock_,nontdk,contdk,nontps,contps,nontck,contck,nontck_,contck_,loaitien,manhom,makh_matk) VALUE ".substr($value1, 0,-1);
database::re_query("$sql_ins1");
?>