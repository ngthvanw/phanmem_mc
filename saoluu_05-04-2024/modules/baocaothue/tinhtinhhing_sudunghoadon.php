<?php
include("../../config.php");

$OBJCT = new baocaothue();
$quy = $_GET['thangtk'];
$nam = $_SESSION['NienDo'];
if ($quy == 1) {
    $tungay = $nam . "/01/1";
    $denngay = $nam . "/03/31";
}
if ($quy == 2) {
    $tungay = $nam . "/04/1";
    $denngay = $nam . "/06/30";
}
if ($quy == 3) {
    $tungay = $nam . "/07/1";
    $denngay = $nam . "/09/30";
}
if ($quy == 4) {
    $tungay = $nam . "/10/1";
    $denngay = $nam . "/12/31";
}

$xoakhiphathien = $_GET['xoakhiphathien'];
$tonghopcanam = $_GET['tonghopcanam'];


$intheothuesuat = $_GET['intheothuesuat'];
$intheochungtu = $_GET['intheochungtu'];
$sapxeptheohoadon = $_GET['sapxeptheohoadon'];
$tenphieu = $_GET['tenphieu'];
$ngaylap = $_GET['ngaylap'];
$ngayhoadon = $_GET['ngayhoadon'];
//-------------------------------------------
$data_muatrongky = $OBJCT->loadDanhSachBCHoaDon_TrongKy($quy);// Danh sách hóa đơn mua trong kỳ
if ($quy == 1) {
    $data_tondauky = $OBJCT->loadDanhSachBCHoaDon_DauKy_TuBanDauKy(0);// Danh sách hóa đơn tồn đầu ky
} else {
    $data_tondauky = $OBJCT->loadDanhSachBCHoaDon_DauKy_TuBangTK(($quy - 1));// Danh sách hóa đơn tồn đầu ky
}
//debug($data_tondauky);
// -------------------------------------------
$data = $OBJCT->loadDanhSachBCHoaDonXuat($tungay, $denngay);
$data1 = $OBJCT->loadDanhSachBCHoaDonThu($tungay, $denngay);

$data_tong1 = array_merge($data, $data1);

$arrsohdhuy = $OBJCT->loadDanhSachSoDuHoaDoan_Xoa($quy);/// Lấy danh sach - Xóa - Mất - Hủy trong kỳ không theo ký hiệu

$tongdanhsach_hoadon = array_merge($data_tondauky, $data_muatrongky);

foreach ($arrsohdhuy as $itemgop_sohoadon) {
    $data_tong = array_merge($data_tong1, $itemgop_sohoadon['sudung']);
}
$lamang = is_array($data_tong);

if (!$lamang) {
    $data_tong = $data_tong1;
}

function locgiatritrongkhoanso($tuso, $denso, $arrloc)
{
    foreach ($arrloc as $k => $item) {
        if ($item >= $tuso && $item <= $denso) {
            $arr[$item] = $item;
        }
    }
    return $arr;
}

function sulysolientuc($string)
{
    $arr = explode(";", $string);
    sort($arr);
    $arr_sx = $arr;
    $sobatdau = min($arr_sx);
    $tr = "";
    for ($i = 0; $i <= count($arr_sx); $i++) {
        $itruoc = $i - 1;
        if ($arr_sx[$i] - $arr_sx[$itruoc] == 1) {
            continue;
        }

        if ($arr_sx[$itruoc] != 0) {
            if ($sobatdau != $arr_sx[$itruoc])
                $tr .= $sobatdau . "-" . $arr_sx[$itruoc] . ";";
            else
                $tr .= $arr_sx[$itruoc] . ";";
        }
        //}
        $sobatdau = $arr_sx[$i];
    }
    return substr($tr, 0, -1);
}

$data_theoms = "";
$data_theoms_daxuly = "";
foreach ($data_tong as $itemCT) {// Lấy danh sách các số hóa đơn đã nhập
    $mauso = str_replace("//", "/", strtoupper(trim($itemCT['kyhieu'])));
    $sohd = (int)$itemCT['sohoadon'];
    $data_theoms[$mauso][$sohd] = $sohd;
}
//debug($tongdanhsach_hoadon);
foreach ($tongdanhsach_hoadon as $k => $itemDSHoaDon) {
    if ($itemDSHoaDon['loaphieu'] == 1 || $itemDSHoaDon['loaphieu']==2) {
        $tuso = (int)$itemDSHoaDon['tuso'];
        $denso = (int)$itemDSHoaDon['denso'];

        $sobatdau = $tuso;
        $sokethuc = $denso;
        $arr_xoahuymat = array_merge($arrsohdhuy[$itemDSHoaDon['kyhieu']]['xoa'], $arrsohdhuy[$itemDSHoaDon['kyhieu']]['mat'], $arrsohdhuy[$itemDSHoaDon['kyhieu']]['huy']);
        $max = max(locgiatritrongkhoanso($sobatdau, $sokethuc, $data_theoms[$itemDSHoaDon['kyhieu']]));// Lấy giá trị lớn nhất của hóa đơn sử dụng trong khoản từ số - đến số
        $gtlonnhatbihuy = max(locgiatritrongkhoanso($sobatdau, $sokethuc, $arr_xoahuymat)); // Lấy giá trị lớn nhất trong khoản từ số - đến số
        if ($max < $gtlonnhatbihuy) {
            $max = $gtlonnhatbihuy;
        }// Nếu số xóa mà lơn hơn số sử dụng thì số đó là số sử dụng lơn nhất
        $min = min(locgiatritrongkhoanso($sobatdau, $sokethuc, $data_theoms[$itemDSHoaDon['kyhieu']]));
        if ($min > $sobatdau) {
            $min = $sobatdau;
        }

        $data_theoms_xoa = "";

        for ($i = $sobatdau; $i <= $max; $i++) {// duyệt mang danh sách hóa đơn sử dụng

            if (in_array($i, $arrsohdhuy[$itemDSHoaDon['kyhieu']]['huy'])) {// Nếu có trong mảng hủy thì số xóa
                $data_theoms_huy[$k][] = $i;
            }
            if (in_array($i, $arrsohdhuy[$itemDSHoaDon['kyhieu']]['mat']) && in_array($i, $data_theoms_huy[$k]) == false) {// Nếu có trong mảng hủy thì số xóa
                $data_theoms_mat[$k][] = $i;
            }
            if ($xoakhiphathien == "true") {
                if ($data_theoms[$itemDSHoaDon['kyhieu']][$i] == "" && in_array($i, $data_theoms_huy[$k]) == false && in_array($i, $data_theoms_mat[$k]) == false) {// Nếu không có trong mảng là số đó bị xóa
                    $data_theoms_xoa[$k][] = $i;
                }
            }

            if (in_array($i, $arrsohdhuy[$itemDSHoaDon['kyhieu']]['xoa']) && in_array($i, $data_theoms_huy[$k]) == false && in_array($i, $data_theoms_mat[$k]) == false) {// Nếu có trong mảng hủy thì số xóa
                $data_theoms_xoa[$k][] = $i;
            }
        }

        $data_theoms_daxuly[$k]['sudungtu'] = $min;// Sử dụng từ hóa đơn số
        $data_theoms_daxuly[$k]['sudungden'] = $max;  // Sử dụng đến hóa đơn số
        $data_theoms_daxuly[$k]['sobatdau'] = $sobatdau;
        $data_theoms_daxuly[$k]['soketthuc'] = $sokethuc;
        $data_theoms_daxuly[$k]['kyhieusudung'] = $itemDSHoaDon['kyhieu'];
        $data_theoms_daxuly[$k]['xoabotuso'] = sulysolientuc(implode(";", array_unique($data_theoms_xoa[$k])));
        $data_theoms_daxuly[$k]['huybotuso'] = sulysolientuc(implode(";", array_unique($data_theoms_huy[$k])));
        $data_theoms_daxuly[$k]['matbotuso'] = sulysolientuc(implode(";", array_unique($data_theoms_mat[$k])));
    }
    //}
}

$_SESSION["THONGTINPHIEU_BCHD"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU_BCHD"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU_BCHD"]['ngayhoadon'] = $ngayhoadon;

$_SESSION['BAOCAO_SUDUNGHD'] = $data_theoms_daxuly;

foreach ($tongdanhsach_hoadon as $kkyhieu => $ItemDS) {
    $danhhoadonton[$kkyhieu]['kyhieu'] = $ItemDS['kyhieu'];// Ký hiệu hóa đơn
    $danhhoadonton[$kkyhieu]['mauso'] = $ItemDS['mauso'];// Ký hiệu hóa đơn
    $danhhoadonton[$kkyhieu]['soquyen'] = $ItemDS['soquyen'];// Ký hiệu hóa đơn
    $danhhoadonton[$kkyhieu]['loaiphieu'] = 1;// Loại phiếu GTGT

    if (trim($ItemDS['loaiphieu']) == 'TK') {
        $danhhoadonton[$kkyhieu]['dktuso'] = 0;// Số đầu kỳ
        $danhhoadonton[$kkyhieu]['dkdenso'] = 0;// Đến số đầu kỳ
        $danhhoadonton[$kkyhieu]['ntuso'] = $ItemDS['tuso'];// Từ số mua trong kỳ
        $danhhoadonton[$kkyhieu]['ndenso'] = $ItemDS['denso'];// Đến số mua trong kỳ

    } else {
        $danhhoadonton[$kkyhieu]['dktuso'] = $ItemDS['tuso'];// Số đầu kỳ
        $danhhoadonton[$kkyhieu]['dkdenso'] = $ItemDS['denso'];// Đến số đầu kỳ

        $danhhoadonton[$kkyhieu]['ntuso'] = 0;// Từ số mua trong kỳ
        $danhhoadonton[$kkyhieu]['ndenso'] = 0;// Đến số mua trong kỳ
    }

    $danhhoadonton[$kkyhieu]['pstuso'] = $data_theoms_daxuly[$kkyhieu]['sudungtu'];// Sử dụng từ
    $danhhoadonton[$kkyhieu]['psdenso'] = $data_theoms_daxuly[$kkyhieu]['sudungden'];// Sử dụng đến số

    $danhhoadonton[$kkyhieu]['huyso'] = $data_theoms_daxuly[$kkyhieu]['xoabotuso'];// Xóa từ số đến số
    $danhhoadonton[$kkyhieu]['xoaso'] = $data_theoms_daxuly[$kkyhieu]['huybotuso'];// Hủy từ số đến số
    $danhhoadonton[$kkyhieu]['matso'] = $data_theoms_daxuly[$kkyhieu]['matbotuso'];// Hủy từ số đến số

    $soketthuchd_trongquy = $data_theoms_daxuly[$kkyhieu]['soketthuc'];
    $soketthuc_sudung = $data_theoms_daxuly[$kkyhieu]['sudungden'];// sửa vị trí này
    $tmp_ton = (int)$soketthuchd_trongquy - (int)$soketthuc_sudung;

    $dktuso = "";
    $dkdenso = "";
    $ntuso = "";
    $ndenso = "";

    if (trim($ItemDS['loaiphieu']) == 'TK') {
        $dktuso = 0;
        $dkdenso = 0;

        $ntuso = (int)$ItemDS['tuso'];
        $ndenso = (int)$ItemDS['denso'];
    } else {
        $dktuso = (int)$ItemDS['tuso'];
        $dkdenso = (int)$ItemDS['denso'];

        $ntuso = 0;
        $ndenso = 0;
    }

    if ((number_format($dktuso)) != 0 && (number_format($ntuso)) != 0) {// Nếu đầu kỳ có nhập thì số bắt đầu là số đầu kỳ
        $sobatdau = $dktuso;
        $sokethuc = $ndenso;
    } else if ((number_format($dktuso)) != 0 && (number_format($ntuso)) == 0) {// nếu không nhập đầu kỳ thì số bắt đầu là số nhập trong kỳ
        $sobatdau = $dktuso;
        $sokethuc = $dkdenso;
    } else if ((number_format($dktuso)) == 0 && (number_format($ntuso)) != 0) {
        $sobatdau = $ntuso;
        $sokethuc = $ndenso;
    } else if ((number_format($dktuso)) == 0 && (number_format($ntuso)) == 0) {
        $sobatdau = 0;
        $sokethuc = 0;
    }

    if (number_format($data_theoms_daxuly[$kkyhieu]['sudungtu']) == "0" && $soketthuc_sudung == 0) {
        $sotontuso = $sobatdau;
        $sotondenso = $sokethuc;
    } else {
        if ($tmp_ton > 0) {
            $sotontuso = $soketthuc_sudung + 1;
            $sotondenso = $soketthuchd_trongquy;
        } else {
            $sotontuso = 0;
            $sotondenso = 0;
        }
    }


    $danhhoadonton[$kkyhieu]['tontuso'] = $sotontuso;   // Tồn kho từ số hóa đơn
    $danhhoadonton[$kkyhieu]['tondenso'] = $sotondenso; // Tồn kho đến số hóa đơn

    if (number_format($sotontuso) == 0 && number_format($sotondenso) == 0 && number_format($dktuso) == 0 && number_format($ntuso) == 0) {

    } else {
        $values .= "('" . $ItemDS['loaphieu'] . "','" . $ItemDS['kyhieu'] . "','" . $data_tondauky[$kkyhieu]['tuso'] . "','" . $data_tondauky[$kkyhieu]['denso'] . "','" . $ntuso . "','" . $ndenso . "','" . $data_theoms_daxuly[$kkyhieu]['sudungtu'] . "','" . $data_theoms_daxuly[$kkyhieu]['sudungden'] . "','" . $data_theoms_daxuly[$kkyhieu]['huybotuso'] . "','" . $data_theoms_daxuly[$kkyhieu]['xoabotuso'] . "','" . $data_theoms_daxuly[$kkyhieu]['matbotuso'] . "','" . $sotontuso . "','" . $sotondenso . "','" . $quy . "','" . $ItemDS['mauso'] . "','" . $ItemDS['soquyen'] . "'),";
    }
}

$sql = "insert into tonkhohoadon(loaiphieu,kyhieu,dktuso,dkdenso,ntuso,ndenso,pstuso,psdenso,huyso,xoaso,mat,tontuso,tondenso,quy,mauso,soquyen) VALUES" . substr($values, 0, -1);
database::re_query("delete from tonkhohoadon where quy='" . $quy . "'");
database::re_query($sql);