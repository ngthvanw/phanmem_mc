<?php
include("../../config.php");
$OBJCT = new ketoantonghop();
$OBJMaKH = new makhachhang();

unset($_SESSION["GETNODK"]);

$tungay = $_GET['tungay'];

$denngay = $_GET['denngay'];

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;

$captaikhoan = $_GET['intheothuesuat'];

$makhachhang = $_GET['makhachhang'];
$string_makh = $OBJMaKH->loadMaKHALL_TraVeChuoiMaKH($makhachhang);
$string_makh_da_thaythe = str_replace(",", "','", substr($string_makh, 0, -1));

$matk = $_GET['matk'];

$sql_makh = "select * from makh WHERE makh='" . $makhachhang . "'";
$query_makh = $OBJCT->re_query($sql_makh);
$data_kh = $OBJCT->re_fetch($query_makh);
$OBJCT->re_query("UPDATE pskt SET makh_nh = '' WHERE (loaiphieu!=3 and loaiphieu!=4) or tenkh_nh='';");

$sql_matk = "select * from matk WHERE matk='" . $matk . "'";
$query_matk = $OBJCT->re_query($sql_matk);
$data_tk = $OBJCT->re_fetch($query_matk);

$sql_nodk = "select * from sdcn WHERE makh in ('" . $string_makh_da_thaythe . "') and matk='" . $matk . "'";

$query_nodk = $OBJCT->re_query($sql_nodk);
$data_nodk = $OBJCT->re_fetch_all($query_nodk);
$str_w = "";
$str_w2 = "";
$str_w3 = ""; // dành cho thấu chi
$str_w4 = ""; // dành cho thấu chi

$str_w = " and ngayghiso >='" .$_SESSION['NienDo']. "-01-01' and ngayghiso< '" . $tungay . "' and pskt.makh in ('" . $string_makh_da_thaythe . "')";
$str_w2 = " and ngayghiso >='" .$_SESSION['NienDo']. "-01-01' and ngayghiso<'" . $tungay . "' and makh in ('" . $string_makh_da_thaythe . "')";
$str_w3 = " and ngayghiso >='" .$_SESSION['NienDo']. "-01-01' and ngayghiso< '" . $tungay . "' and pskt.makh_nh in ('" . $string_makh_da_thaythe . "')"; // dành cho thấu chi
$str_w4 = " and ngayghiso >='" .$_SESSION['NienDo']. "-01-01' and ngayghiso< '" . $tungay . "' and pskt.makh in ('" . $string_makh_da_thaythe . "')"; // dành cho thấu chi

$OBJCT->setStrOderby($str_w);
$OBJCT->setStrOderby2($str_w2);
$OBJCT->setStrOderby3($str_w3);
$OBJCT->setStrOderby4($str_w4);

$dataDanhsachTK_No_Co_ps = $OBJCT->load_danhsach_taikhoannoco_chitietnokh($matk, "ALL", "ngayghiso");

$tongnodk = 0;
$tongcodk = 0;

$tongnontdk = 0;
$tongcontdk = 0;
//debug($dataDanhsachTK_No_Co_ps);
foreach ($data_nodk as $itemdk){
    $tongnodk+=$itemdk['sdkno'];
    $tongcodk+=$itemdk['sdkco'];

    $tongnontdk+=$itemdk['thanhtienntpt'];
    $tongcontdk+=$itemdk['thanhtienntptr'];
}

foreach ($dataDanhsachTK_No_Co_ps as $itemdkpsthanh){
    foreach ($itemdkpsthanh as $itemdkps) {
        $tongnodk += $itemdkps['tienno'];
        $tongcodk += $itemdkps['tienco'];
    }
}

$data_nodk_full = array("sdkno"=>$tongnodk,"sdkco"=>$tongcodk,"sdknont"=>$tongnontdk,"sdkcont"=>$tongcontdk);
//debug($data_nodk_full);
$_SESSION["GETMATK"] = $data_tk;
$_SESSION["GETMAKH"] = $data_kh;
$_SESSION["GETNODK"] = $data_nodk_full;

$intheochungtu = $_GET['intheochungtu'];
$sapxeptheohoadon = $_GET['sapxeptheohoadon'];
$tenphieu = $_GET['tenphieu'];
$ngaylap = $_GET['ngaylap'];

$str_w = "";
$str_w2 = "";
$str_w3 = ""; // dành cho thấu chi
$str_w4 = ""; // dành cho thấu chi

$str_w = " and ngayghiso >='" . $tungay . "' and ngayghiso<= '" . $denngay . "' and pskt.makh in ('" . $string_makh_da_thaythe . "')";
$str_w2 = " and ngayghiso >='" . $tungay . "' and ngayghiso<='" . $denngay . "' and makh in ('" . $string_makh_da_thaythe . "')";
$str_w3 = " and ngayghiso >='" . $tungay . "' and ngayghiso<= '" . $denngay . "' and pskt.makh_nh in ('" . $string_makh_da_thaythe . "')"; // dành cho thấu chi
$str_w4 = " and ngayghiso >='" . $tungay . "' and ngayghiso<= '" . $denngay . "' and pskt.makh in ('" . $string_makh_da_thaythe . "')"; // dành cho thấu chi

$OBJCT->setStrOderby($str_w);
$OBJCT->setStrOderby2($str_w2);
$OBJCT->setStrOderby3($str_w3);
$OBJCT->setStrOderby4($str_w4);

$dataDanhsachTK_No_Co = $OBJCT->load_danhsach_taikhoannoco_chitietnokh($matk, "ALL", "ngayghiso");
debug($dataDanhsachTK_No_Co);
$array_no = array();
$array_co = array();
$array_no = $dataThu;
$array_co = $dataChi;

$_SESSION["THONGTINPHIEU"]['thangtk'] = "Từ  " . dd_mm_yyy($tungay) . " đến " . dd_mm_yyy($denngay);

$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $_GET['ngayhoadon'];
$_SESSION["THONGTINPHIEU"]['incaptk'] = $captaikhoan;


//$_SESSION["LISTTONGHOPNO"] = $dataNoTongHop;
if (is_array($array_no) == true && is_array($array_co) == false) {
    $chitiet_arr = ($array_no);
}
if (is_array($array_no) == false && is_array($array_co) == true) {
    $chitiet_arr = ($array_co);
}
if (is_array($array_no) == true && is_array($array_co) == true) {
    $chitiet_arr = ($array_no + $array_co);
}
//$chitiet_arr = ($array_no+$array_co);
//ksort($chitiet_arr);
foreach ($chitiet_arr as $itemct) {
    $thangghiso = explode("-", $itemct['ngayghiso']);
    $data_ct[$thangghiso[1]][] = $itemct;
}
//ksort($data_ct);
$_SESSION["DSNOKHCHITIET"] = $dataDanhsachTK_No_Co;


