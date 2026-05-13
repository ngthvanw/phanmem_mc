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
$OBJPSKT = new pskt();
$sophieu = $OBJPSKT->createSoPhieu();
$DATA_LISTMABP = $OBJMACT->loadListMaCT_CoKeyLaMa();
$DATA_LISTMAND = $OBJMANOIDUNG->loadListMaNoiDung_CoKeyLaMa();

$tungay = $_SESSION['NienDo'] . "-01-01";

$denngay = $_GET['denngay'];
$theobophan = $_GET['theobophan'];

$loctheospct = $_GET['loctheospct'];

$theonoidung = $_GET['theonoidung'];
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
$loctheospct = "ALL";
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

$str_w = " and ngayghiso >='" . $_SESSION['kyketoan_tungay'] . "' and ngayghiso< '" . $tungay . "'  " . $sql_mabp;
$OBJCT->setStrOderby($str_w);
$str_w2 = " and ngayghiso >='" . $_SESSION['kyketoan_tungay'] . "' and ngayghiso<'" . $tungay . "'  " . $sql_mabp1;
$OBJCT->setStrOderby2($str_w2);
$dauky = $OBJCT->load_danhsach_dk_theotk_ngoaite($matk, $theonoidung, $sapxep,$tungay);
//debug($dauky);
$str_w2 = " and ngayghiso >='" . $tungay . "' and ngayghiso<='" . $denngay . "'  " . $sql_mabp1;
$OBJCT->setStrOderby2($str_w2);
$str_w = " and ngayghiso >='" . $tungay . "' and ngayghiso<= '" . $denngay . "'  " . $sql_mabp;
$OBJCT->setStrOderby($str_w);
$OBJHTTK->set_orderby(" matk in (" . $matk . ")");
$danhsachtk = $OBJHTTK->loadListHTTK_W1();

//$dauky = $OBJCT->load_danhsach_socai_dauky($matk)

$dataChi = $OBJCT->load_danhsach_socai_chi_theotk_ngoaite($matk, $theonoidung, $sapxep);// lấy tất cả thu chi
$grouptheo = "thang";
if ($sapxep == "noidung") {
    $grouptheo = "mand";
} else {
    $grouptheo = "thang";
}
$matk_arr = explode(",", $matk);
$congdontheosocai = 0;
if ($congdontheosocai == "0") {
    foreach ($matk_arr as $item_tk) {
        foreach ($dataChi[$item_tk] as $item_danhsach) {
            $tk = $item_danhsach['tk'];
            $thang = $item_danhsach[$grouptheo];
            $danhsach_data[$tk][$thang][] = $item_danhsach;
        }
    }
} else {
    foreach ($matk_arr as $item_tk) {
        foreach ($dataChi[$item_tk] as $item_danhsach) {
            $tk = $item_danhsach['tk'];
            $thang = $item_danhsach[$grouptheo];
            $item_danhsach['tienco'] = $danhsach_data[$tk][$thang]['tienco'] + $item_danhsach['tienco'];
            $item_danhsach['tienno'] = $danhsach_data[$tk][$thang]['tienno'] + $item_danhsach['tienno'];
            $danhsach_data[$tk][$thang] = $item_danhsach;
        }
    }
}

/// -------------------Cập nhật tỷ giá------------------------------------
$sql_emp_pskt = "delete from pskt where loaiphieu='87'";
$OBJCT->re_query($sql_emp_pskt);

$sql_emp_chitiet_pskt = "delete from chitiet_pskt where loaiphieu='87' ";
$OBJCT->re_query($sql_emp_chitiet_pskt);
//debug($danhsach_data);
$nguyenteDK = 0;
$SoTienVNDK = 0;
$tygiadauky = 0;
foreach ($danhsach_data as $k_matk => $itemTK) {// Duyet vao tk

    $tygiadauky = $dauky[$k_matk]["tygia"];
    $nguyenteDK = $dauky[$k_matk]["sotiennt"];
    $SoTienVNDK = $dauky[$k_matk]["tienno"] - $dauky[$k_matk]["tienco"];


    $nodk = $dauky[$k_matk]["tienno"];
    $codk = $dauky[$k_matk]["tienco"];

    foreach ($itemTK as $kthang => $itemTHANG) {

        foreach ($itemTHANG as $itemCT) {
            $tygiadauky = 0;
            $nguyenteDK = ($nguyenteDK + $itemCT["tienntno"]);
            $SoTienVNDK = ($SoTienVNDK + $itemCT["tienno"]);

            if($_SESSION["NienDo"]=='2017'){
                $tygiadauky = round((($SoTienVNDK) / ($nguyenteDK)),0);
            }else{
                $tygiadauky = round((($SoTienVNDK) / ($nguyenteDK)),3);
            }


            $tienvnxuat = round($tygiadauky * $itemCT["tienntco"]);

            if ($tienvnxuat == 0 && $itemCT["tygiaco"] == 0 && $itemCT["tienntco"] == 0 && $itemCT["tygiano"] == 0 && $itemCT["tienntno"] == 0) {
                $tienvnxuat = $itemCT["tienco"];
            }
            $nguyenteDK = ($nguyenteDK - $itemCT["tienntco"]);
            $SoTienVNDK = $SoTienVNDK - $tienvnxuat;

            if ($itemCT["tygiaco"] == 0 && $itemCT["tienntco"] == 0 && $itemCT["tygiano"] == 0 && $itemCT["tienntno"] == 0) {
                $tygiadauky = 0;

                if($_SESSION["NienDo"]=='2017'){
                    $tygiadauky = round(($SoTienVNDK / ($nguyenteDK)),0);
                }else{
                    $tygiadauky = round(($SoTienVNDK / ($nguyenteDK)),3);
                }
            }

            $mangtygia[$itemCT["sott"]] = $tygiadauky;

            if ($itemCT["tienco"] != 0 || $itemCT["tienntco"] != 0) {// CÓ NGUYÊN TỆ
                $TienNo = round($itemCT["tygiaco"] * $itemCT["tienntco"]);// Giá Bán
                $TienGiaVon = round($itemCT["tienntco"] * $tygiadauky);
                //echo "round(".(($SoTienVNDK) / ($nguyenteDK)).")";
                //echo "-".$TienNo . " - " . $TienGiaVon ."-".$tygiadauky. " - " . $itemCT["phieuso"] . "<br/>";

                $sqlupdate = "";
                $sqlupdate2 = "";
                if (substr($itemCT["tkdu"], 0, 3) == '1122' || $itemCT["tkdu"] == '331' || substr($itemCT["tkdu"], 0, 3) == '341' || substr($itemCT["tkdu"], 0, 4) == '3387' || substr($itemCT["tkdu"], 0, 4) == '3388' || substr($itemCT["tkdu"], 0, 2) == '64') {
                    if ($itemCT["tygiaco"] != 0) {// Lỗ chênh lệch tỷ giá
                        $sqlupdate = "update chitiet_pskt set gtvnd1 = ($TienNo) WHERE sott='{$itemCT["sott"]}' and sotiennt!='0' and loaiphieu='{$itemCT["loaiphieu"]}'";
                        $sqlupdate2 = "update chitiet_pskt set tongtien='{$TienNo}' WHERE sott='{$itemCT["sott"]}' and loaiphieu='{$itemCT["loaiphieu"]}' ";
                    } else {
                        $sqlupdate = "update chitiet_pskt set gtvnd1 = ($TienGiaVon) WHERE sott='{$itemCT["sott"]}' and sotiennt!='0' and loaiphieu='{$itemCT["loaiphieu"]}'";
                        $sqlupdate2 = "update chitiet_pskt set tongtien='{$TienGiaVon}' WHERE sott='{$itemCT["sott"]}' and loaiphieu='{$itemCT["loaiphieu"]}' ";
                    }

                } else {
                    if ($TienNo < $TienGiaVon && $itemCT["tygiaco"] != 0 && $itemCT["tienntco"] != 0) {// Lỗ chênh lệch tỷ giá
                        $sqlupdate = "update chitiet_pskt set gtvnd1 ='{$TienNo}' WHERE sott='{$itemCT["sott"]}' and sotiennt!='0' and loaiphieu='{$itemCT["loaiphieu"]}'";
                        $ChenhLechTyGia = abs($TienNo - $TienGiaVon);
                        $sqlupdate2 = "update chitiet_pskt set mand2='100092',noidung2='Lỗ chênh lệch tỷ giá',tkno2='635',gtvnd2 = ($ChenhLechTyGia),tongtien='{$TienGiaVon}' WHERE sott='{$itemCT["sott"]}' and loaiphieu='{$itemCT["loaiphieu"]}' ";
                    } else {// Lãi chênh lệch tỷ giá
                        if ($itemCT["tienntco"] != 0) {
                            $sqlupdate = "update chitiet_pskt set gtvnd1 = ($TienGiaVon),tongtien='{$TienGiaVon}' WHERE sott='{$itemCT["sott"]}' and sotiennt!='0' and loaiphieu='{$itemCT["loaiphieu"]}' ";
                            $ChenhLechTyGia = abs($TienNo - $TienGiaVon);
                            if ($itemCT["tkdu"] != 0 && $itemCT["tkdu"] != "" && $ChenhLechTyGia != 0 && $itemCT["tygiaco"] != 0 && $itemCT["tienntco"] != 0) {
                                $value_pskt .= "('" . $sophieu . "','87','" . $itemCT["ngayghiso"] . "','{$itemCT["tkdu"]}','87','" . abs($ChenhLechTyGia) . "','{$itemCT["makh"]}','{$itemCT["tenkh"]}'),";
                                $value_chitiet_pskt .= "('87','" . $itemCT["ngayghiso"] . "','" . abs($ChenhLechTyGia) . "','0001','Toàn Bộ','100099','Lãi chênh lệch tỷ giá Ngân hàng {$itemCT["tk"]} - Phiếu : {$itemCT['sophieu']} ','5152','" . abs($ChenhLechTyGia) . "','4','87','" . $sophieu . "'),";
                                $sqlupdate2 = "update chitiet_pskt set mand2='',noidung2='',tkno2='',gtvnd2 ='',tongtien='{$TienGiaVon}' WHERE sott='{$itemCT["sott"]}' and loaiphieu='{$itemCT["loaiphieu"]}' ";
                            }
                            $sophieu++;
                        }
                    }

                }
                if (substr($k_matk, 0, 4) == '1122') {
                    //echo $sqlupdate;
                    $OBJCT->re_query($sqlupdate);
                    $OBJCT->re_query($sqlupdate2);
                }

            }

        }
    }

    $OBJCT->re_query("ALTER TABLE `bangtygianganhang` ADD `sotien` BIGINT NOT NULL AFTER `sotiennt`;");
    $OBJCT->re_query("ALTER TABLE `bangtygianganhang` CHANGE `tygia` `tygia` DOUBLE(10,3) NOT NULL;");
    $OBJCT->re_query("delete from bangtygianganhang WHERE matk='{$k_matk}'");
    $sqlinsert = "insert into bangtygianganhang(matk,tygia,sotiennt,sotien) VALUE ('{$k_matk}','{$tygiadauky}','{$nguyenteDK}','{$SoTienVNDK}')";

    $sql_pskt = "insert into pskt(sophieu,mapskt,ngayghiso,tkco,loaiphieu,tongcong,makh,tenkh) VALUE " . substr($value_pskt, 0, -1);
    $sql_chitiet_pskt = "insert into chitiet_pskt(mapskt,ngayhoadon,gtvnd1,mabp,bophan,mand1,noidung1,tkno1,tongtien,maloai,loaiphieu,sophieu) VALUE " . substr($value_chitiet_pskt, 0, -1);

    if (substr($k_matk, 0, 4) == '1122') {
        $OBJCT->re_query($sqlinsert);
        $OBJCT->re_query($sql_pskt);
        $OBJCT->re_query($sql_chitiet_pskt);
    }
}

///--------------------Kết thúc cập nhật giá vốn-------------------------
$_SESSION["LISTCTSONHATKY"] = $danhsach_data;
$_SESSION["DSHTTK"] = $danhsachtk;
$_SESSION["DSDAUKY"] = $dauky;
$_SESSION["DSMABP"] = $DATA_LISTMABP[$theobophan];
$_SESSION["DSLOAICTSP"] = $loctheospct;
$_SESSION["DSMAND"] = $DATA_LISTMAND;
$_SESSION["TYGIABINHQUAN"] = $mangtygia;

//debug($mangtygia);




