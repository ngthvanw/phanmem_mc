<?php
include("../../config.php");
$OBJCT = new baocaothue();
$OBJKTTH = new ketoantonghop();
$thangtinhthue = $_GET['thangtinhthue'];
$thuegtgtkytruoc = str_replace(",", "", $_GET['thuegtgtkytruoc']);
$thuedenghihoan = str_replace(",", "", $_GET['thuedenghihoan']);
$thuegtgtduockhautrukynay = str_replace(",", "", $_GET['thuegtgtduockhautrukynay']);
$doanhsogtgtkhautru = str_replace(",", "", $_GET['doanhsogtgtkhautru']);
$thuegtgtkhautru = str_replace(",", "", $_GET['thuegtgtkhautru']);
$doanhsogtgtdaura = str_replace(",", "", $_GET['doanhsogtgtdaura']);
$thuegtgtdaura = str_replace(",", "", $_GET['thuegtgtdaura']);
$thuegtgtngoaitinh = str_replace(",", "", $_GET['thuegtgtngoaitinh']);
$thuegtgtmuavaoduandautu = str_replace(",", "", $_GET['thuegtgtmuavaoduandautu']);
$loaitokhai = str_replace(",", "", $_GET['loaitokhai']);
$khautruhangthang = ($_GET['khautruhangthang']);
$OBJCT->setThangQuy($thangtinhthue);
$OBJPSKT = new pskt();
$tenthang = " tháng ";
switch ($thangtinhthue) {
    case 1:
        $tenthang = " Tháng 1 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-31";

        $tungaytruoc = "0000-00-00";
        $denngaytruoc = "0000-00-00";

        break;
    case 2:
        $tenthang = " Tháng 2 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        if($_SESSION['NienDo']%4==0){
            $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-29";
        }else{
            $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-28";
        }

        $tungaytruoc = $_SESSION['NienDo'] . "-1-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-1-31";
        break;
    case 3:
        $tenthang = " Tháng 3 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-31";

        $tungaytruoc = $_SESSION['NienDo'] . "-2-1";
        if($_SESSION['NienDo']%4==0){
            $denngaytruoc = $_SESSION['NienDo'] . "-2-29";
        }else{
            $denngaytruoc = $_SESSION['NienDo'] . "-2-28";
        }
        break;
    case 4:
        $tenthang = " Tháng 4 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-30";

        $tungaytruoc = $_SESSION['NienDo'] . "-3-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-3-31";
        break;
    case 5:
        $tenthang = " Tháng 5 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-31";

        $tungaytruoc = $_SESSION['NienDo'] . "-4-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-4-30";
        break;
    case 6:
        $tenthang = " Tháng 6 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-30";

        $tungaytruoc = $_SESSION['NienDo'] . "-5-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-5-31";
        break;
    case 7:
        $tenthang = " Tháng 7 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-31";

        $tungaytruoc = $_SESSION['NienDo'] . "-6-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-6-30";
        break;
    case 8:
        $tenthang = " Tháng 8 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-31";

        $tungaytruoc = $_SESSION['NienDo'] . "-7-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-7-31";

        break;
    case 9:
        $tenthang = " Tháng 9 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-30";

        $tungaytruoc = $_SESSION['NienDo'] . "-8-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-8-31";
        break;
    case 10:
        $tenthang = " Tháng 10 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-31";

        $tungaytruoc = $_SESSION['NienDo'] . "-9-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-9-31";
        break;
    case 11:
        $tenthang = " Tháng 11 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-30";


        $tungaytruoc = $_SESSION['NienDo'] . "-10-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-10-31";
        break;
    case 12:
        $tenthang = " Tháng 12 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $thangtinhthue . "-31";

        $tungaytruoc = $_SESSION['NienDo'] . "-11-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-11-30";
        break;

    case "I":
        $tenthang = " Quý I - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-1-1";
        $denngay = $_SESSION['NienDo'] . "-3-31";

        $tungaytruoc = "0000-00-00";
        $denngaytruoc = "0000-00-00";
        break;
    case "II":
        $tenthang = " Quý II - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-4-1";
        $denngay = $_SESSION['NienDo'] . "-6-30";

        $tungaytruoc = $_SESSION['NienDo'] . "-1-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-3-31";
        break;
    case "III":
        $tenthang = " Quý III - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-7-1";
        $denngay = $_SESSION['NienDo'] . "-9-30";

        $tungaytruoc = $_SESSION['NienDo'] . "-4-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-6-30";
        break;
    case "IV":
        $tenthang = " Quý IV - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-10-1";
        $denngay = $_SESSION['NienDo'] . "-12-31";

        $tungaytruoc = $_SESSION['NienDo'] . "-7-1";
        $denngaytruoc = $_SESSION['NienDo'] . "-9-30";

        break;
    case "V":
        $tungay = $_SESSION['NienDo'] . "-1-1";
        $denngay = $_SESSION['NienDo'] . "-12-31";
        break;

}

$sapxeptheohoadon = "ngayhoadon";
$tmp_thue = array(2 => 0, 3 => 5, 4 => 10, 5 => 20, 6 => "-0", 7 => "k");// Danh sách thuế
$array_thue = $tmp_thue;
$array_dungchung = array(0, 1);
$str_thue = implode("','", $array_thue);
$tongtienmuavao = 0;
$tongthuemuavao = 0;
foreach ($array_dungchung as $itemDungChung) {
    $str_w = " and dungchung=" . $itemDungChung . " and thuesuat in('" . $str_thue . "') and ngayghiso >='" . $tungay . "' and ngayghiso<= '" . $denngay . "'";
    $str_w2 = " and dungchung=" . $itemDungChung . " and thuesuat1 in('" . $str_thue . "') and ngayghiso >='" . $tungay . "' and ngayghiso<='" . $denngay . "'";
    $OBJCT->setStrOderby($str_w);
    $OBJCT->setStrOderby2($str_w2);
    $data1 = $OBJCT->load_danhsach_muavao_group($sapxeptheohoadon);
    $data2 = $OBJCT->load_danhsach_muavao2_group($sapxeptheohoadon);
    if ($data1[0] != "" && $data2[0] != "") {
        $dataCT[$itemDungChung] = array_merge($data1, $data2);
    }
    if ($data1[0] != "" && $data2[0] == "") {
        $dataCT[$itemDungChung] = $data1;
    }
    if ($data1[0] == "" && $data2[0] != "") {
        $dataCT[$itemDungChung] = $data2;
    }
    //$dataCT[$itemDungChung]=$data1;

}
$tong1331 = 0;
$tong1332 = 0;
foreach ($dataCT as $Itemmuavao) {// Lấy tổng thuế và tổng tiền mua vào
    foreach ($Itemmuavao as $Itemmuavao1) {// Lấy tổng thuế và tổng tiền mua vào
        $tongtienmuavao += $Itemmuavao1['thanhtien'];
        $tongthuemuavao += $Itemmuavao1['thue'];
        if ($Itemmuavao1['matkthue'] == '1331') {
            $tong1331 += $Itemmuavao1['thue'];
        } else {
            $tong1332 += $Itemmuavao1['thue'];
        }
    }
}
/////////////////Bán Ra//////////////////////////////////
$tmp_thue1 = array(2 => 0, 3 => 5, 4 => 10, 5 => 20, 6 => "k");// Danh sách thuế

$array_thue1 = $tmp_thue1;

foreach ($array_thue1 as $itemThue) {
    $str_w = " and thuesuat='" . $itemThue . "' and ngayghiso >='" . $tungay . "' and ngayghiso<= '" . $denngay . "'";
    $str_w2 = " and rate_tax='" . $itemThue . "' and ngayghiso >='" . $tungay . "' and ngayghiso<='" . $denngay . "'";
    $OBJCT->setStrOderby($str_w);
    $OBJCT->setStrOderby2($str_w2);
    $data1 = $OBJCT->load_danhsach_banra_group("", "sct");// thông tin tồn đầu kỳ
    $dataCT1[$itemThue] = $data1;
}
$array_banra = "";
foreach ($dataCT1 as $k => $Itembanra) {// Lấy tổng thuế và tổng tiền mua vào
    $tongtienbanra = 0;
    $tongthuebanra = 0;
    foreach ($Itembanra as $Itembanra1) {// Lấy tổng thuế và tổng tiền mua vào
        $tongtienbanra += $Itembanra1['thanhtien'];
        $tongthuebanra += $Itembanra1['thue'];
    }
    $array_banra[$k]['tongtien'] = $tongtienbanra;
    $array_banra[$k]['tongthue'] = $tongthuebanra;
}
$danhsogtgtgiam = 0;
$danhsogtgttang = 0;
$gtgttang = 0;
$gtgtgiam = 0;
if($thuegtgtkhautru<0){// Nếu thuế gtgt đầu vào (-) thì giảm
    $danhsogtgtgiam +=abs($doanhsogtgtkhautru);
    $gtgtgiam+=abs($thuegtgtkhautru);
}else{
    $danhsogtgttang +=abs($doanhsogtgtkhautru);
    $gtgttang+=abs($thuegtgtkhautru);
}
if($thuegtgtdaura>0){// Nếu thuế gtgt đầu vào (-) thì giảm
    $danhsogtgtgiam +=abs($doanhsogtgtdaura);
    $gtgtgiam+=abs($thuegtgtdaura);
}else{
    $danhsogtgttang +=abs($doanhsogtgtdaura);
    $gtgttang+=abs($thuegtgtdaura);
}

////////////////End bán ra/////////////////////////////
$T22 = $thuegtgtkytruoc;

if ($thuegtgtduockhautrukynay == "") {
    $T25 = $tongthuemuavao;
} else {
    $T25 = $thuegtgtduockhautrukynay;
}
$T26 = $array_banra['k']['tongtien'];// 0% là không chiệu thuế
$T27 = $array_banra[0]['tongtien'] + $array_banra[5]['tongtien'] + $array_banra[10]['tongtien'];
$T28 = $array_banra[5]['tongthue'] + $array_banra[10]['tongthue'];
$T29 = $array_banra[0]['tongtien'];
$T34 = $T27 + $T26;
$T35 = $T28;
$T36 = $T35 - $T25;
$tmp40 = $T36 - $T22 + $gtgtgiam - $gtgttang - $thuegtgtngoaitinh;
$T40 = $T40a - $thuegtgtmuavaoduandautu;
if ($tmp40 >= 0) {
    $T40a = $tmp40;
    $T41 = 0;
} else {
    $T41 = $tmp40;
    $T40a = 0;
}
$T43 = round(abs($T41 - $thuedenghihoan));
$OBJCT->ThemToKhaiThue($T21, $T22, $tongtienmuavao, $tongthuemuavao, $T25, $T26, $T27, $T28, $T29, $array_banra[5]['tongtien'], $array_banra[5]['tongthue'], $array_banra[10]['tongtien'], $array_banra[10]['tongthue'], $T34, $T35, $T36, $danhsogtgtgiam, $gtgtgiam, $danhsogtgttang, $gtgttang, $thuegtgtngoaitinh, $T40, $T40a, $thuegtgtmuavaoduandautu, $T41, $thuedenghihoan, $T43, $thangtinhthue, $loaitokhai,$doanhsogtgtkhautru,$thuegtgtkhautru,$doanhsogtgtdaura,$thuegtgtdaura);
// Tạo bút toán phát sinh

$tongthuegtgtdaura=0;
$tongthuekhkytruoc=0;
$tongthugtgtdauvao=0;
$tongbutton=0;
//if ($loaitokhai == 1) {
    if($T25==$tongthuemuavao) {
        $thangxoathue = date("n", strtotime($denngay));
         $tongthuekhkytruoc = $thuegtgtkytruoc;
         $tongthugtgtdauvao = $tongthuemuavao;
         $tongthuegtgtdaura = $T28;
        $tmptinh = $tongthuegtgtdaura - ($tongthuekhkytruoc + $tongthugtgtdauvao+$gtgttang-$gtgtgiam);
        $sophieu = $OBJPSKT->createSoPhieu();

        if ($tmptinh >= 0) {
            $tongbutton = ($tongthugtgtdauvao+$tongthuekhkytruoc+$gtgttang-$gtgtgiam);
            $value_pskt .= "('" . $sophieu . "'," . $thangxoathue . ",'" . $denngay . "','33311','73','" . abs($tongbutton) . "','73'),";
            $value_chitiet_pskt .= "(" . $thangxoathue . ",'" . $denngay . "','" . abs($tong1331+$tongthuekhkytruoc+$gtgttang-$gtgtgiam) . "','" . abs($tong1332) . "','0001','Toàn bộ','100092','Khấu trừ thuế GTGT của hàng hóa, dịch vụ " . $tenthang . "','100093','Khấu trừ thuế GTGT của TSCĐ " . $tenthang . "','1331','1332','" . abs($tongbutton) . "','4','73','" . $sophieu . "','73'),";
            $sql_pskt = "insert into pskt(sophieu,mapskt,ngayghiso,tkco,loaiphieu,tongcong,btps) VALUE " . substr($value_pskt, 0, -1);
            $sql_chitiet_pskt = "insert into chitiet_pskt(mapskt,ngayhoadon,gtvnd1,gtvnd2,mabp,bophan,mand1,noidung1,mand2,noidung2,tkno1,tkno2,tongtien,maloai,loaiphieu,sophieu,btps) VALUE " . substr($value_chitiet_pskt, 0, -1);

        } else {
            $tongbutton = $tongthuegtgtdaura;
            $value_pskt .= "('" . $sophieu . "'," . $thangxoathue . ",'" . $denngay . "','33311','73','" . abs($tongbutton) . "','73'),";
            $value_chitiet_pskt .= "(" . $thangxoathue . ",'" . $denngay . "','" . abs($tongbutton) . "','" . abs(0) . "','0001','Toàn bộ','100092','Khấu trừ thuế GTGT của hàng hóa, dịch vụ " . $tenthang . "','100093','Khấu trừ thuế GTGT của TSCĐ " . $tenthang . "','1331','1332','" . abs($tongbutton) . "','4','73','" . $sophieu . "','73'),";
            $sql_pskt = "insert into pskt(sophieu,mapskt,ngayghiso,tkco,loaiphieu,tongcong,btps) VALUE " . substr($value_pskt, 0, -1);
            $sql_chitiet_pskt = "insert into chitiet_pskt(mapskt,ngayhoadon,gtvnd1,gtvnd2,mabp,bophan,mand1,noidung1,mand2,noidung2,tkno1,tkno2,tongtien,maloai,loaiphieu,sophieu,btps) VALUE " . substr($value_chitiet_pskt, 0, -1);

        }

    }else{
        $thangxoathue = date("n", strtotime($denngay));

        $T24 = $tongthuemuavao;

        $Thuemuavaosaukhautru = $T24 - $T25;

        if($T25<=$tong1331 && $T25>=$tong1332){// NẾU TIỀN KHẤU TRỪ NHỎ HƠN TỔNG TÀI KHOẢN 1331 VÀ TIỀN KHẤU TRƯ NHỎ HƠN TỔNG 1332
            $tongkh33311_1331 = $T25;
            $tongkh33311_1332 = 0;

            $tongkh632_1331 = $tong1331-$T25;
            $tong632_1332 = $tong1332;

        }else if($T25>=$tong1331 && $T25<=$tong1332){// NẾU TIỀN KHẤU TRỪ LỚN HƠN TỔNG TÀI KHOẢN 1331 VÀ TIỀN KHẤU TRỪ NHỎ HƠN TỔNG 1332
            $tongkh33311_1331 = 0;
            $tongkh33311_1332 = $T25;

            $tongkh632_1331 = $tong1331;
            $tong632_1332 = $tong1332-$T25;

        }else if($T25<=$tong1331 && $T25<=$tong1332) {// NẾU TIỀN KHẤU TRỪ LỚN HƠN TỔNG TÀI KHOẢN 1331 VÀ TIỀN KHẤU TRỪ LỚN HƠN TỔNG 1332

            $tongkh33311_1331 = $T25;
            $tongkh33311_1332 = 0;

            $tongkh632_1331 = $tong1331-$T25;
            $tong632_1332 = $tong1332;
        }else if($T25>=$tong1331 && $T25>=$tong1332) {// NẾU TIỀN KHẤU TRỪ LỚN HƠN TỔNG TÀI KHOẢN 1331 VÀ TIỀN KHẤU TRỪ LỚN HƠN TỔNG 1332

            $hieuso_t25_1331 = $T25-$tong1331;
            $tongkh33311_1331 = $tong1331;
            $tongkh33311_1332 = $hieuso_t25_1331;

            $tongkh632_1331 = 0;
            $tong632_1332 = $tong1332-$hieuso_t25_1331;
        }

        $sophieu = $OBJPSKT->createSoPhieu();
        $value_pskt .=      "('" . $sophieu . "'," . $sophieu . ",'" . $denngay . "','33311','73','" . abs($T25) . "','73'),";
        $value_pskt .= "('" . ($sophieu+1) . "'," . ($sophieu+1) . ",'" . $denngay . "','632','73','" . abs($Thuemuavaosaukhautru) . "','73'),";

        $value_chitiet_pskt .= "(" . $sophieu . ",'" . $denngay . "','" . abs($tongkh33311_1331) . "','" . abs($tongkh33311_1332) . "','0001','Toàn bộ','100092','Khấu trừ thuế GTGT của hàng hóa, dịch vụ " . $tenthang . "','100093','Khấu trừ thuế GTGT của TSCĐ " . $tenthang . "','1331','1332','" . abs($T25) . "','4','73','" . $sophieu . "','73'),";
        $value_chitiet_pskt .= "(" . ($sophieu+1) . ",'" . $denngay . "','" . abs($tongkh632_1331) . "','" . abs($tong632_1332) . "','0001','Toàn bộ','100092','Thuế GTGT không đủ ĐK khấu trừ " . $tenthang . "','100093','Thuế GTGT không đủ ĐK khấu trừ" . $tenthang . "','1331','1332','" . abs($Thuemuavaosaukhautru) . "','4','73','" . ($sophieu+1) . "','73'),";

        $sql_pskt = "insert into pskt(sophieu,mapskt,ngayghiso,tkco,loaiphieu,tongcong,btps) VALUE " . substr($value_pskt, 0, -1);
        $sql_chitiet_pskt = "insert into chitiet_pskt(mapskt,ngayhoadon,gtvnd1,gtvnd2,mabp,bophan,mand1,noidung1,mand2,noidung2,tkno1,tkno2,tongtien,maloai,loaiphieu,sophieu,btps) VALUE " . substr($value_chitiet_pskt, 0, -1);

    }

    $sql_emp_pskt = "delete from pskt where loaiphieu='73' and ((ngayghiso>='" . $tungay . "' and ngayghiso<='" . $denngay. "') or ngayghiso='0000-00-00')";
    $sql_emp_chitiet_pskt = "delete from chitiet_pskt where loaiphieu='73' and ((ngayhoadon >='" . $tungay . "' and ngayhoadon<='" . $denngay . "') or ngayhoadon='0000-00-00') ";

    $sql_emp_pskt_81 = "delete from pskt where loaiphieu='81' and ((ngayghiso>='" . $tungay . "' and ngayghiso<='" . $denngay. "') or ngayghiso='0000-00-00')";
    $sql_emp_chitiet_pskt_81 = "delete from chitiet_pskt where loaiphieu='81' and ((ngayhoadon >='" . $tungay . "' and ngayhoadon<='" . $denngay . "') or ngayhoadon='0000-00-00') ";

    database::re_query($sql_emp_pskt);
    database::re_query($sql_emp_pskt_81);
    database::re_query($sql_emp_chitiet_pskt);
    database::re_query($sql_emp_chitiet_pskt_81);

    if ($khautruhangthang == "true") {
        database::re_query($sql_pskt);
        //database::re_query($sql_pskt_81);
        database::re_query($sql_chitiet_pskt);
        //database::re_query($sql_chitiet_pskt_81);
    }

//debug($dauky);


$sophieu = $OBJPSKT->createSoPhieu();
$dem=0;
$ChenhLechToKhai=0;
$value_pskt_81="";
$value_chitiet_pskt_81="";

$matk = "1331,1332,33311";
if($loaitokhai=="1"){
    $str_w2=" and ngayghiso >='".$tungay."' and ngayghiso<='".$denngay."'  ".$sql_mabp1;
    $OBJKTTH->setStrOderby2($str_w2);
    $str_w=" and ngayghiso >='".$tungay."' and ngayghiso<= '".$denngay."'  ".$sql_mabp;
    $OBJKTTH->setStrOderby($str_w);
    $dataSoCaiCT = $OBJKTTH->load_danhsach_socai_theotk_chinhthuc($matk,"ALL","loaiphieu");// lấy tất cả thu chi//

    foreach ($dataSoCaiCT as $itemSoCaiCT) {
        $dem++;
        if ($itemSoCaiCT['tienno'] != "0") {
            $sophieu++;
            $value_pskt_81 .= "('" . $sophieu . "'," . $dem . ",'" . $denngay . "','{$itemSoCaiCT['tk']}','81','" . -($itemSoCaiCT['tienno']) . "','81'),";
            $value_chitiet_pskt_81 .= "(" . $dem . ",'" . $denngay . "','" . -($itemSoCaiCT['tienno']) . "','0','0001','Toàn bộ','100092','Điều chỉnh giảm tờ khai {$tenthang} ','',' ','{$itemSoCaiCT['tkdu']}','','" . -($itemSoCaiCT['tienno']) . "','4','81','" . $sophieu . "','81'),";
        }
        if ($itemSoCaiCT['tienco'] != "0") {
            $sophieu++;
            $value_pskt_81 .= "('" . $sophieu . "'," . $dem . ",'" . $denngay . "','{$itemSoCaiCT['tkdu']}','81','" . -($itemSoCaiCT['tienco']) . "','81'),";
            $value_chitiet_pskt_81 .= "(" . $dem . ",'" . $denngay . "','" . -($itemSoCaiCT['tienco']) . "','0','0001','Toàn bộ','100092','Điều chỉnh tăng tờ khai {$tenthang} ','',' ','{$itemSoCaiCT['tk']}','','" . -($itemSoCaiCT['tienco']) . "','4','81','" . $sophieu . "','81'),";
        }
        $sophieu++;
    }
}else{
    $str_w2=" and ngayhoadon >='".$tungay."' and ngayhoadon<='".$denngay."'  ".$sql_mabp1;
    $OBJKTTH->setStrOderby2($str_w2);
    $str_w=" and ngayhoadon >='".$tungay."' and ngayhoadon<= '".$denngay."'  ".$sql_mabp;
    $OBJKTTH->setStrOderby($str_w);
    $dataSoCaiBoSung = $OBJKTTH->load_danhsach_socai_theotk_bosung($matk,"ALL","loaiphieu");// lấy tất cả thu chi//

    foreach ($dataSoCaiBoSung as $itemSoCaiBoSung) {
        $dem++;
        if ($itemSoCaiBoSung['tienno'] != "0") {
            $sophieu++;
            $value_pskt_81 .= "('" . $sophieu . "'," . $dem . ",'" . $denngay . "','{$itemSoCaiBoSung['tk']}','81','" . ($itemSoCaiBoSung['tienno']) . "','81'),";
            $value_chitiet_pskt_81 .= "(" . $dem . ",'" . $denngay . "','" . ($itemSoCaiBoSung['tienno']) . "','0','0001','Toàn bộ','100092','Điều chỉnh giảm tờ khai {$tenthang} ','',' ','{$itemSoCaiBoSung['tkdu']}','','" . ($itemSoCaiBoSung['tienno']) . "','4','81','" . $sophieu . "','81'),";
        }
        if ($itemSoCaiBoSung['tienco'] != "0") {
            $sophieu++;
            $value_pskt_81 .= "('" . $sophieu . "'," . $dem . ",'" . $denngay . "','1331','81','" . -($itemSoCaiBoSung['tienco']) . "','81'),";
            $value_chitiet_pskt_81 .= "(" . $dem . ",'" . $denngay . "','" . -($itemSoCaiBoSung['tienco']) . "','0','0001','Toàn bộ','100092','Điều chỉnh tăng tờ khai {$tenthang} ','',' ','{$itemSoCaiBoSung['tkdu']}','','" . -($itemSoCaiBoSung['tienco']) . "','4','81','" . $sophieu . "','81'),";
        }
        $sophieu++;
    }

    $str_w2=" and ngayghiso >='".$tungay."' and ngayghiso<='".$denngay."'  ".$sql_mabp1;
    $OBJKTTH->setStrOderby2($str_w2);
    $str_w=" and ngayghiso >='".$tungay."' and ngayghiso<= '".$denngay."'  ".$sql_mabp;
    $OBJKTTH->setStrOderby($str_w);
    $dataSoCaiCT = $OBJKTTH->load_danhsach_socai_theotk_chinhthuc($matk,"ALL","loaiphieu");// lấy tất cả thu chi//

    foreach ($dataSoCaiCT as $itemSoCaiCT) {
        $dem++;
        if ($itemSoCaiCT['tienco'] != "0") {
            $sophieu++;
            $value_pskt_81 .= "('" . $sophieu . "'," . $dem . ",'" . $denngay . "','{$itemSoCaiCT['tkdu']}','81','" . -($itemSoCaiCT['tienco']) . "','81'),";
            $value_chitiet_pskt_81 .= "(" . $dem . ",'" . $denngay . "','" . -($itemSoCaiCT['tienco']) . "','0','0001','Toàn bộ','100092','Điều chỉnh tăng tờ khai {$tenthang} ','',' ','{$itemSoCaiCT['tk']}','','" . -($itemSoCaiCT['tienco']) . "','4','81','" . $sophieu . "','81'),";
        }
        $sophieu++;
    }

    $str_w2=" and ngayhoadon >='".$tungaytruoc."' and ngayhoadon<='".$denngaytruoc."'  ".$sql_mabp1;
    $OBJKTTH->setStrOderby2($str_w2);
    $str_w=" and ngayhoadon >='".$tungaytruoc."' and ngayhoadon<= '".$denngaytruoc."'  ".$sql_mabp;
    $OBJKTTH->setStrOderby($str_w);
    $dataSoCaiBoSungThangTruoc = $OBJKTTH->load_danhsach_socai_theotk_bosung($matk,"ALL","loaiphieu");// lấy tất cả thu chi//

    /*foreach ($dataSoCaiBoSung as $itemSoCaiBoSung) {
        $dem++;
        if ($itemSoCaiBoSung['tienno'] != "0") {
            $sophieu++;
            $value_pskt_81 .= "('" . $sophieu . "'," . $dem . ",'" . $denngay . "','{$itemSoCaiBoSung['tk']}','81','" . ($itemSoCaiBoSung['tienno']) . "','81'),";
            $value_chitiet_pskt_81 .= "(" . $dem . ",'" . $denngay . "','" . ($itemSoCaiBoSung['tienno']) . "','0','0001','Toàn bộ','100092','Điều chỉnh giảm tờ khai {$tenthang} ','',' ','{$itemSoCaiBoSung['tkdu']}','','" . ($itemSoCaiBoSung['tienno']) . "','4','81','" . $sophieu . "','81'),";
        }
        if ($itemSoCaiBoSung['tienco'] != "0") {
            $sophieu++;
            $value_pskt_81 .= "('" . $sophieu . "'," . $dem . ",'" . $denngay . "','1331','81','" . -($itemSoCaiBoSung['tienco']) . "','81'),";
            $value_chitiet_pskt_81 .= "(" . $dem . ",'" . $denngay . "','" . -($itemSoCaiBoSung['tienco']) . "','0','0001','Toàn bộ','100092','Điều chỉnh tăng tờ khai {$tenthang} ','',' ','{$itemSoCaiBoSung['tkdu']}','','" . -($itemSoCaiBoSung['tienco']) . "','4','81','" . $sophieu . "','81'),";
        }
        $sophieu++;
    }*/
    foreach ($dataSoCaiBoSungThangTruoc as $itemBSTruoc){
        $dataBSThangTruoc[$itemBSTruoc['sott']] = $itemBSTruoc['sott'];
    }

    foreach ($dataSoCaiCT as $itemCTThangNay){
        $dataCTThangNay[$itemCTThangNay['sott']] = $itemCTThangNay['sott'];
        //$dataCTThangNay[1000] = 1000;
    }
    $arrKhacThangTruoc= array_diff($dataCTThangNay, $dataBSThangTruoc);
    debug($arrKhacThangTruoc);
    foreach ($dataSoCaiCT as $itemarrKhacThangTruoc) {
    $dem++;
    if($itemarrKhacThangTruoc['sott'] == $arrKhacThangTruoc[$itemarrKhacThangTruoc['sott']]) {
        if ($itemarrKhacThangTruoc['tienno'] != "0") {
            $sophieu++;
            $value_pskt_81 .= "('" . $sophieu . "'," . $dem . ",'" . $denngay . "','{$itemarrKhacThangTruoc['tk']}','81','" . (-$itemarrKhacThangTruoc['tienno']) . "','81'),";
            $value_chitiet_pskt_81 .= "(" . $dem . ",'" . $denngay . "','" . (-$itemarrKhacThangTruoc['tienno']) . "','0','0001','Toàn bộ','100092','Điều chỉnh giảm tờ khai {$tenthang} ','',' ','{$itemarrKhacThangTruoc['tkdu']}','','" . (-$itemarrKhacThangTruoc['tienno']) . "','4','81','" . $sophieu . "','81'),";
        }
        if ($itemarrKhacThangTruoc['tienco'] != "0") {
            $sophieu++;
            $value_pskt_81 .= "('" . $sophieu . "'," . $dem . ",'" . $denngay . "','1331','81','" . -($itemarrKhacThangTruoc['tienco']) . "','81'),";
            $value_chitiet_pskt_81 .= "(" . $dem . ",'" . $denngay . "','" . -($itemarrKhacThangTruoc['tienco']) . "','0','0001','Toàn bộ','100092','Điều chỉnh tăng tờ khai {$tenthang} ','',' ','{$itemarrKhacThangTruoc['tkdu']}','','" . -($itemarrKhacThangTruoc['tienco']) . "','4','81','" . $sophieu . "','81'),";
        }
    }
    $sophieu++;
}

}

$sql_pskt_81 = "insert into pskt(sophieu,mapskt,ngayghiso,tkco,loaiphieu,tongcong,btps) VALUE " . substr($value_pskt_81, 0, -1);
$sql_chitiet_pskt_81 = "insert into chitiet_pskt(mapskt,ngayhoadon,gtvnd1,gtvnd2,mabp,bophan,mand1,noidung1,mand2,noidung2,tkno1,tkno2,tongtien,maloai,loaiphieu,sophieu,btps) VALUE " . substr($value_chitiet_pskt_81, 0, -1);

if ($khautruhangthang == "true") {
   database::re_query($sql_pskt_81);
    database::re_query($sql_chitiet_pskt_81);
}
//}




