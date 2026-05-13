<?php
include("../../config.php");
unset($_SESSION["THONGTINPHIEU"]);
unset($_SESSION["LISTCTSONHATKY"]);
unset($_SESSION["DSHTTK"]);
unset($_SESSION["DSDAUKY"]);
$OBJCT = new ketoantonghop();
$OBJHTTK = new hethongtaikhoan();
$OBJMACT = new dmsanpham();
$OBJMANOIDUNG = new manoidung();
$DATA_LISTMABP = $OBJMACT->loadListMaCT_CoKeyLaMa();
$DATA_LISTMAND = $OBJMANOIDUNG->loadListMaNoiDung_CoKeyLaMa();

$tungay = $_GET['tungay'];

$denngay = $_GET['denngay'];
$theobophan = $_GET['theobophan'];

$theonoidung = $_GET['theonoidung'];
$congdontheosocai = $_GET['congdontheosocai'];
if($theobophan==='0001'){
	$sql_mabp = " and mabp!=''";
    $sql_mabp1 = " and makho!=''";
}else{
    $chuoimactsp_re = substr($OBJMACT->loadMaKHALL_TraVeChuoiMaCTSP($theobophan),0,-1);
    $mactsp_string = str_replace(",","','",$chuoimactsp_re);
	$sql_mabp = " and mabp in ('".$mactsp_string."')";
	$sql_mabp1 = " and makho in ('".$mactsp_string."')";
}

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;
$intheothuesuat = $_GET['intheothuesuat'];
$intheochungtu= $_GET['intheochungtu'];
$sapxep= $_GET['sapxep'];
$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];
echo $matk =  $_GET['mavt'];
$str_w="";
$str_w2="";

    $str_w=" and ngayghiso >='".$_SESSION['NienDo']."-01-01' and ngayghiso< '".$tungay."'  ".$sql_mabp;
    $OBJCT->setStrOderby($str_w);
	$str_w2=" and ngayghiso >='".$_SESSION['NienDo']."-01-01' and ngayghiso<'".$tungay."'  ".$sql_mabp1;
	$OBJCT->setStrOderby2($str_w2);
	$dauky = $OBJCT->load_danhsach_socai_dk_theotk($matk,$theonoidung,$sapxep);
	//debug($dauky);
	$str_w2=" and ngayghiso >='".$tungay."' and ngayghiso<='".$denngay."'  ".$sql_mabp1;
    $OBJCT->setStrOderby2($str_w2);
	$str_w=" and ngayghiso >='".$tungay."' and ngayghiso<= '".$denngay."'  ".$sql_mabp;
	$OBJCT->setStrOderby($str_w);
    $OBJHTTK->set_orderby(" matk in (".$matk.")");
    $danhsachtk = $OBJHTTK->loadListHTTK_W1();
	
//$dauky = $OBJCT->load_danhsach_socai_dauky($matk)

$dataChi = $OBJCT->load_danhsach_socai_chi_theotk($matk,$theonoidung,$sapxep);// lấy tất cả thu chi

$grouptheo ="thang";
if($sapxep=="noidung"){
    $grouptheo ="mand";
}else{
    $grouptheo ="thang";
}
$matk_arr = explode(",",$matk);

if($congdontheosocai=="0"){
    foreach ($matk_arr as $item_tk){
        foreach ($dataChi[$item_tk] as $item_danhsach){
            $tk = $item_danhsach['tk'];
            $thang = $item_danhsach[$grouptheo];
            $danhsach_data[$tk][$thang][]=$item_danhsach;
        }
    }
}else{
    foreach ($matk_arr as $item_tk){
        foreach ($dataChi[$item_tk] as $item_danhsach){
            $tk = $item_danhsach['tk'];
            $thang = $item_danhsach[$grouptheo];
            $item_danhsach['tienco'] = $danhsach_data[$tk][$thang]['tienco']+$item_danhsach['tienco'];
            $item_danhsach['tienno'] = $danhsach_data[$tk][$thang]['tienno']+$item_danhsach['tienno'];
            $danhsach_data[$tk][$thang]=$item_danhsach;
        }
    }
}
$ngayhoadon = "Từ  " .dd_mm_yyy($tungay) ." đến " .dd_mm_yyy($denngay);

//$OBJCT->loadListDanhSachTKChiTiet();

$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = date("d-m-Y");
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $ngayhoadon;
$_SESSION["LISTCTSONHATKY"] = $danhsach_data;
$_SESSION["DSHTTK"] = $danhsachtk;
$_SESSION["DSDAUKY"] = $dauky;
$_SESSION["DSMABP"] = $DATA_LISTMABP[$theobophan];
$_SESSION["DSMAND"] = $DATA_LISTMAND;
debug($danhsach_data);



