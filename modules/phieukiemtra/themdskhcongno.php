<?php
include("../../config.php");
$OBJ = new makhachhang;

$dataDSKH = $OBJ->loadListMaKH_W();
$arr_tkno_KH = explode(",",$String_tkno_KH);
$string_sql="";
foreach ($arr_tkno_KH as $ItemTKNoKH) {
    foreach ($dataDSKH as $ItemDSKH) {
        $value.= "('".$ItemDSKH['makh']."','".$ItemTKNoKH."'),";
    }
}
$OBJ->re_query("TRUNCATE tmp_dskhcn");
$sql="INSERT INTO tmp_dskhcn (makh,matk) VALUE ".substr($value, 0,-1);
$OBJ->re_query("$sql");
//////////////////////////////////////////////////////////////
$OBJCT = new ketoantonghop();
$tungay = $_GET['tungay'];

$denngay = $_GET['denngay'];

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;

$captaikhoan = $_GET['intheothuesuat'];
$makhachhang = $_GET['makhachhang'];

$sql_mkh="";
$sql_mkh2="";
if($makhachhang=="ALL"){

}else{
    $sql_mkh = " and tmp_dskhcn.makh='".$makhachhang."'";
    $sql_mkh1 = " and sdcn.makh='".$makhachhang."'";
}

$intheochungtu= $_GET['intheochungtu'];
$sapxeptheohoadon= $_GET['sapxeptheohoadon'];
$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];

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

debug($array_no);

$_SESSION["THONGTINPHIEU"]['thangtk'] = "Từ  " .dd_mm_yyy($tungay) ." đến " .dd_mm_yyy($denngay);

//$OBJCT->loadListDanhSachTKChiTiet();

$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $_GET['ngayhoadon'];
$_SESSION["THONGTINPHIEU"]['incaptk'] = $captaikhoan;

$dataNoDK = $OBJCT->load_danhsach_nokhachhang_dk(0,$sql_mkh1);

$dataBCDTK = $OBJCT->load_danhsach_nokhachhang(0,6,$array_no,$array_co,$sql_mkh);
foreach ($dataBCDTK as $itemCT){
    $ma = $itemCT['makh'].$itemCT['matk'];
        $arr_dayky = $dataNoDK[$ma];
	    if ( $arr_dayky["tongduno"] != 0) {
            $soduno= $arr_dayky["tongduno"];
        } else {
            $soduno= $arr_dayky["soduno"];
        }

		if ( $arr_dayky["tongduco"] != 0) {
            $soduco= $arr_dayky["tongduco"];
        } else {
            $soduco= $arr_dayky["soduco"];
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
		$soducktinh = ($soduno+$sodunops) - ($soduco+$soducops);
		$soducktinh_ = ($arr_dayky["soduno"]+$itemCT["sodunops"]) - ($arr_dayky["soduco"]+$itemCT["soducops"]);
		$soducock=0;
		$soducock_=0;
		$sodunock=0;
		$sodunock_=0;
		if($soducktinh>=0){
			$sodunock = ($soduno+$sodunops) - ($soduco+$soducops);
			$sodunock_ = ($arr_dayky["soduno"]+$itemCT["sodunops"]) - ($arr_dayky["soduco"]+$itemCT["soducops"]);
		}
		if($soducktinh>=0){
		}else{
			$soducock = ($soduco+$soducops) - ($soduno+$sodunops);
			$soducock_ = abs(($arr_dayky["soduno"]+$itemCT["sodunops"]) - ($arr_dayky["soduco"]+$itemCT["soducops"]));
		}
		if($soduno==0 && $soduco==0 && $sodunops==0 && $soducops==0)
		{
			
		}else{
			$value1.= "('".$itemCT['makh']."','".$itemCT['tenkh']."','".$itemCT['matk']."','".$soduno."','".$soduco."','".$sodunops."','".$soducops."','".$sodunock."','".$soducock."','".$itemCT['makhcha']."','".$sodunock_."','".$soducock_."'),";
		}
    
}
$OBJ->re_query("TRUNCATE cnkh");
$sql_ins1 = "insert into cnkh(makh,tenkh,matk,nodk,codk,nops,cops,nock,cock,makhcha,nock_,cock_) VALUE ".substr($value1, 0,-1);
$OBJ->re_query("$sql_ins1");
//debug($dataBCDTK);
?>