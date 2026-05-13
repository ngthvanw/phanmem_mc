<?php
include("../../config.php");
$OBJ = new psmavattu();
$OBJCT = new ps_chitiet_mavattu();
$sophieu = $_GET['sophieu'];

$postuphieu = strpos($_GET['tuphieu'],"-");
if($postuphieu==""){
    $tuso = $_GET['tuphieu'];
}else{
    $tuso = str_replace("-","",substr($_GET['tuphieu'],$postuphieu));
}
$posdenphieu = strpos($_GET['denphieu'],"-");
if($posdenphieu==""){
    $denso = $_GET['denphieu'];
}else{
    $denso = str_replace("-","",substr($_GET['denphieu'],$posdenphieu));
}

$loaiphieu = $_GET['loaiphieu'];

$tenkho = $_GET['tenkho'];
$hopdong = $_GET['hopdong'];
$hinhthucvanchuyen = $_GET['hinhthucvanchuyen'];
$tennguoilap = $_GET['tennguoilap'];
$ketoantruong = $_GET['ketoantruong'];
$giamdoc = $_GET['giamdoc'];

$OBJ->set_orderby("  CAST(SUBSTRING_INDEX(mapskt, '-', -1) as UNSIGNED)>='".$tuso."' and CAST(SUBSTRING_INDEX(mapskt, '-', -1)as UNSIGNED)<='".$denso."' and loaiphieu='" . $loaiphieu . "' ");

$data = $OBJ->loadListPSVT_IN();// Danh sách tieu đề
foreach ($data as $itemTieude) {
    $data_sophieu[] = $itemTieude['sophieu'];
}
$string_sophieu = implode(",", $data_sophieu);
$OBJ->setSoPhieu($string_sophieu);
$data_dk = $OBJ->LayThongTinTableDinhKhoan_IN();// Lấy thông tin định khoản

//$OBJCT->set_orderby(" sophieu = " . $_GET['sophieu']);
$OBJCT->setSoPhieu($string_sophieu);

$dataCT = $OBJCT->loadListMaVT_IN();// lấy danh sách vật tư trong phiếu

$_SESSION['THONGTINPHIEUCD']['tenphieu'] = $_GET['tenphieu'];
$_SESSION['THONGTINPHIEUCD']['ngayhd'] = dd_mm_yyy($_GET['ngayhd']);
$_SESSION['THONGTINPHIEUCD']['ngaylap'] = dd_mm_yyy($_GET['ngaylap']);

$_SESSION['THONGTINPHIEUCD']['tenkho'] = $tenkho;
$_SESSION['THONGTINPHIEUCD']['hopdong'] = $hopdong;
$_SESSION['THONGTINPHIEUCD']['hinhthucvanchuyen'] = $hinhthucvanchuyen;
$_SESSION['THONGTINPHIEUCD']['tennguoilap'] = $tennguoilap;
$_SESSION['THONGTINPHIEUCD']['ketoantruong'] = $ketoantruong;
$_SESSION['THONGTINPHIEUCD']['giamdoc'] = $giamdoc;

$_SESSION['THONGTINPHIEUCD']['soluongct'] = $dem;
$_SESSION['THONGTINPHIEUCD']['chuthich'] = $data_chitiet[0]['chuthich'];

$_SESSION['PhieuNhapXuat'] = $data;
$_SESSION['PhieuNhapXuatCT'] = $dataCT;

$arr_tkno = array();
$arr_tkco = array();
foreach ($data_dk as $k=>$itemDKTK) {
    foreach ($itemDKTK as $item) {
        if (array_key_exists($item['tkno'], $arr_tkno[$k])) {
            $tongtien_tkno = $arr_tkno[$k][$item['tkno']] + $item['sotien'];
            $arr_tkno[$k][$item['tkno']] = $tongtien_tkno;
        } else {
            $arr_tkno[$k][$item['tkno']] = $item['sotien'];
        }
        if (array_key_exists($item['tkco'], $arr_tkco[$k])) {
            $tongtien_tkco = $arr_tkco[$k][$item['tkco']] + $item['sotien'];
            $arr_tkco[$k][$item['tkco']] = $tongtien_tkco;
        } else {
            $arr_tkco[$k][$item['tkco']] = $item['sotien'];
        }
    }
}


foreach ($arr_tkco as $kco=>$itemCO) {
    $strtkco = "";// có 4 ký tự
    foreach ($itemCO as $k => $item_co) {
        $tongkytkco = 0;
        $tongkytkco += (strlen($k) + strlen(number_format($item_co, 0, ',', '.')));
            $daucach = "*";
        $strtkco[]= "Có TK " . $k . $daucach . number_format($item_co, 0, ',', '.') . " ";
    }
    $ARR_CO[$kco]=$strtkco;
}


foreach ($arr_tkno as $KNO=>$itemNO) {
    $strtkno = "";// có 4 ký tự
    foreach ($itemNO as $kno => $item_no) {
        $tongkytkno = 0;
        $tongkytkno += (strlen($kno) + strlen(number_format($item_no, 0, ',', '.')));
        $daucach = "*";
        $strtkno[]= "Nợ TK " . $kno . $daucach . number_format($item_no, 0, ',', '.') . " ";
    }
    $ARR_NO[$KNO]=$strtkno;
}

//debug($_SESSION['PhieuNhapXuatCT']);
$_SESSION['DinhKhoanNo'] = $ARR_NO;
$_SESSION['DinhKhoanCo'] = $ARR_CO;
//debug($data);
$_SESSION['ChiTietPhieuThuChi'] = $array_tkno;
$mang = array();
$mangchia = "";

