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
$theotkdoiung = htmlentities($_GET['theotkdoiung']);
$theotkdoiung = str_replace(",","','",$theotkdoiung);
$loctheospct = $_GET['loctheospct'];

$theonoidung = $_GET['theonoidung'];
$theongay = $_GET['theongay'];
if($theongay==""){
    $theongay="ngayghiso";
}
$congdontheosocai = $_GET['congdontheosocai'];

if ($theobophan === 'ALL') {
    $sql_mabp = " and mabp!=''";
    $sql_mabp1 = " and makho!=''";
} else {
    $chuoimactsp_re = substr($OBJMACT->loadMaKHALL_TraVeChuoiMaCTSP($theobophan), 0, -1);
    $mactsp_string = str_replace(",", "','", $chuoimactsp_re);
    $sql_mabp = " and mabp in ('" . $mactsp_string . "')";
    $sql_mabp1 = " and makho in ('" . $mactsp_string . "')";
}

if ($loctheospct === 'ALL') {
    $sql_mabp .= " ";
    $sql_mabp1 .= " ";
} else {
    $sql_mabp .= " and loaisp ='{$loctheospct}'";
    $sql_mabp1 .= " and loaisp ='{$loctheospct}'";
}

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;
$intheothuesuat = $_GET['intheothuesuat'];
$intheochungtu = $_GET['intheochungtu'];
$sapxep = $_GET['sapxep'];
$tenphieu = $_GET['tenphieu'];
$ngaylap = $_GET['ngaylap'];
$matk = $_GET['mavt'];
$str_w = "";
$str_w2 = "";

$str_w = " and {$theongay} >='" . $_SESSION['kyketoan_tungay'] . "' and {$theongay}< '" . $tungay . "'  " . $sql_mabp;
$OBJCT->setStrOderby($str_w);
$str_w2 = " and {$theongay} >='" . $_SESSION['kyketoan_tungay'] . "' and {$theongay}<'" . $tungay . "'  " . $sql_mabp1;
$OBJCT->setStrOderby2($str_w2);

$dauky = $OBJCT->load_danhsach_socai_dk_theotk($matk, $theonoidung, $sapxep);

$dauky154 = $OBJCT->load_danhsach_socai_dk_chitiet_theoCT();
$dauky241 = $OBJCT->load_danhsach_socai_dk_chitiet_theoCT_241();

if ($theobophan != "ALL" && $theobophan != "0001") {
    $dauky[154] = $dauky154[$theobophan];
    $dauky[2411] = $dauky241[2411][$theobophan];
    $dauky[2412] = $dauky241[2412][$theobophan];
    $dauky[2413] = $dauky241[2413][$theobophan];
}

$str_w2 = " and {$theongay} >='" . $tungay . "' and {$theongay}<='" . $denngay . "'  " . $sql_mabp1;
$OBJCT->setStrOderby2($str_w2);
$str_w = " and {$theongay} >='" . $tungay . "' and {$theongay}<= '" . $denngay . "'  " . $sql_mabp;
$OBJCT->setStrOderby($str_w);
$OBJHTTK->set_orderby(" matk in (" . $matk . ")");
if($theotkdoiung!=""){
$str_w3 = " and tkdu in ('" . $theotkdoiung . "')" ;
$OBJCT->setStrOderby3($str_w3);
}

$danhsachtk = $OBJHTTK->loadListHTTK_W1();

//$dauky = $OBJCT->load_danhsach_socai_dauky($matk)
if ($congdontheosocai == "0") {
    $dataChi = $OBJCT->load_danhsach_socai_chi_theotk($matk, $theonoidung, $sapxep);// lấy tất cả thu chi
}else{
    if($congdontheosocai=='mabophan,manoidung'){
        $dataChi = $OBJCT->load_danhsach_socai_chi_theotk_congdon_theobp_noidung($matk, $theonoidung, $sapxep,$congdontheosocai);// lấy tất cả thu chi
    }else{
        $dataChi = $OBJCT->load_danhsach_socai_chi_theotk_congdon($matk, $theonoidung, $sapxep,$congdontheosocai);// lấy tất cả thu chi
    }
}
$grouptheo = "thang";
if ($sapxep == "noidung") {
    $grouptheo = "mand";
} else {
    $grouptheo = "thang";
}
$matk_arr = explode(",", $matk);
if ($congdontheosocai == "0") {
    foreach ($matk_arr as $item_tk) {
        $danhsach_data[$item_tk] = array();
        foreach ($dataChi[$item_tk] as $item_danhsach) {
            $tk = $item_tk;
            $thangghiso = date("m-Y",strtotime($item_danhsach[$theongay]));
            $thang = $thangghiso;
            $danhsach_data[$tk][$thang][] = $item_danhsach;
        }
		ksort($danhsach_data[$tk]);
    }
} else {
    $danhsach_data = $dataChi;
}
$_SESSION["THONGTINPHIEU"]['thangtk'] = "Từ  " . dd_mm_yyy($tungay) . " đến " . dd_mm_yyy($denngay);

$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $_GET['ngayhoadon'];
$_SESSION["LISTCTSONHATKY"] = $danhsach_data;
$_SESSION["DSHTTK"] = $danhsachtk;
$_SESSION["DSDAUKY"] = $dauky;
$_SESSION["DSMABP"] = $DATA_LISTMABP[$theobophan];
$_SESSION["LISTMABP"] = $DATA_LISTMABP;
$_SESSION["DSLOAICTSP"] = $loctheospct;
$_SESSION["DSMAND"] = $DATA_LISTMAND;