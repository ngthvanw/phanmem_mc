<?php
include("../../config.php");
$OBJCT = new ketoantonghop();
$OBJBCT = new baocaothue();
unset($_SESSION["LISTCTBANGKQKD"]);

if($_SESSION['theothongtu']=="tt200"){
	database::re_query("delete from tokhaitndn WHERE sott='100'");
	
    $quy = $_GET['quy'];

    $str_w = " and ngayghiso >='" . $tungay . "' and ngayghiso<= '" . $denngay . "'";
    $str_w2 = " and ngayghiso >='" . $tungay . "' and ngayghiso<='" . $denngay . "'";
//$OBJCT->setStrOderby($str_w);
//$OBJCT->setStrOderby2($str_w2);

    $dataDanhSachXDKQKD = $OBJCT->load_danhsach_bangxdkqkd();// lấy số đầu kỳ trong bản cdtk

    $OBJCT->set_orderby(" maso='KCTNDN' ");

    $dataBANGBTPS = $OBJCT->load_danhsachbuttoan_phatsinh();

    $tongtienthuetndn = $dataBANGBTPS[0]['sotien'];

    $dataBANGCDTK = $OBJCT->load_danhsach_bangcd_tk_tmp();

    $dataBTPS = $OBJBCT->load_danhsach_buttoan_phatsinh_cokeylama();

    $NoTKDT = $dataBTPS['KCDOTT']['sotien']+$dataBTPS['KCDTTP']['sotien']+$dataBTPS['KCDTDV']['sotien']+$dataBTPS['KCDTTG']['sotien']+$dataBTPS['KCDTDS']['sotien']+$dataBTPS['KCDTKH']['sotien'];

    $tongtien10 = 0;
    $tongtien20 = 0;
    $tongtien30 = 0;
    $tongtien40 = 0;
    $tongtien60 = 0;

    foreach ($dataDanhSachXDKQKD as $itemPL) {
        $arr_tkco = explode(",", $itemPL['matk']);
        $arr_tkno = explode(",", $itemPL['tkno']);
        $tongtien = "tongtien" . $itemPL['machitieu'];

        $tongco = 0;
        $tongno = 0;
        foreach ($arr_tkco as $itemtkco) {
            if ($itemtkco == '635') {
                $tongco += $dataBTPS['KCCPTC']['sotien'];
            } else {
                $tongco += $dataBANGCDTK[$itemtkco]['tongducops'];
            }

        }
        foreach ($arr_tkno as $itemtkno) {
            if ($itemtkno == '511') {
                $tongno += ($dataBANGCDTK[$itemtkno]['tongdunops'] - $NoTKDT);
            }else if ($itemtkno == '641') {
                $tongno += ($dataBTPS['KC6411']['sotien'] + $dataBTPS['KC6412']['sotien']+ $dataBTPS['KC6413']['sotien']+ $dataBTPS['KC6414']['sotien']+ $dataBTPS['KC6415']['sotien']+ $dataBTPS['KC6416']['sotien']+ $dataBTPS['KC6417']['sotien']+ $dataBTPS['KC6418']['sotien']+ $dataBTPS['KC6419']['sotien']);
            }else if ($itemtkno == '642') {
                $tongno += ($dataBTPS['KCCPBH']['sotien'] + $dataBTPS['KCCPKD']['sotien']+ $dataBTPS['KC6423']['sotien']+ $dataBTPS['KC6424']['sotien']+ $dataBTPS['KC6425']['sotien']+ $dataBTPS['KC6426']['sotien']+ $dataBTPS['KC6427']['sotien']+ $dataBTPS['KC6428']['sotien']+ $dataBTPS['KC6429']['sotien']);
            } else if ($itemtkno == '632') {
                $tongno += $dataBTPS['KCGVHB']['sotien'];
            } else if ($itemtkno == '811') {
                $tongno += $dataBTPS['KCCPHD']['sotien'];
            }else {
                $tongno += $dataBANGCDTK[$itemtkno]['tongdunops'];
            }

        }
        if ($arr_tkco[0] != "") {
            $$tongtien = $tongco;
        }
        if ($arr_tkno[0] != "") {
            $$tongtien = $tongno;
        }

        $tongtien51 = $tongtienthuetndn; // Gán thuế thu nhập doanh nghiệp từ bảng bút toán ps

        $value1 .= "('" . $itemPL['machitieu'] . "','" . $itemPL['chitieu'] . "','" . $itemPL['thietminh'] . "','" . $$tongtien . "','" . $itemPL['sotiendk'] . "','" . $quy . "','" . $itemPL['cap'] . "'),";
    }
    database::re_query("delete from tmp_kqhdkd WHERE quy='" . $quy . "'");
    $sql_ins1 = "insert into tmp_kqhdkd(maso,chitieu,thietminh,namnay,namtruoc,quy,cap) VALUE " . substr($value1, 0, -1);
    database::re_query("$sql_ins1");

    $tongtien10 = $tongtien01 - $tongtien02;
    $tongtien20 = $tongtien10 - $tongtien11;
    $tongtien30 = $tongtien20 + $tongtien21 - $tongtien22 - $tongtien25- $tongtien26;
    $tongtien40 = $tongtien31 - $tongtien32;
    $tongtien50 = $tongtien30 + $tongtien40;
    $tongtien60 = $tongtien50 - $tongtien51;

    database::re_query(" update tmp_kqhdkd set namnay=" . $tongtien10 . " where maso='10' and quy='" . $quy . "'");
    database::re_query(" update tmp_kqhdkd set namnay=" . $tongtien20 . " where maso='20' and quy='" . $quy . "'");
    database::re_query(" update tmp_kqhdkd set namnay=" . $tongtien30 . " where maso='30' and quy='" . $quy . "'");
    database::re_query(" update tmp_kqhdkd set namnay=" . $tongtien40 . " where maso='40' and quy='" . $quy . "'");
    database::re_query(" update tmp_kqhdkd set namnay=" . $tongtien50 . " where maso='50' and quy='" . $quy . "'");
    database::re_query(" update tmp_kqhdkd set namnay=" . $tongtien60 . " where maso='60' and quy='" . $quy . "'");
}else {
$OBJCT->re_query("INSERT INTO `tokhaitndn` (`sott`, `maso`, `chitieu`, `machitieu`, `sotien`, `machitieucha`, `loaitokhai`, `matk`, `tkno`, `sotiendk`) VALUES ('100', '', '- Trong đó: Tiền lương', '25', '0', '0', 'XDKQKD', '334', '', '')");
    $quy = $_GET['quy'];

    $str_w = " and ngayghiso >='" . $tungay . "' and ngayghiso<= '" . $denngay . "'";
    $str_w2 = " and ngayghiso >='" . $tungay . "' and ngayghiso<='" . $denngay . "'";
//$OBJCT->setStrOderby($str_w);
//$OBJCT->setStrOderby2($str_w2);

    $dataDanhSachXDKQKD = $OBJCT->load_danhsach_bangxdkqkd();// lấy số đầu kỳ trong bản cdtk

    $OBJCT->set_orderby(" maso='KCTNDN' ");

    $dataBANGBTPS = $OBJCT->load_danhsachbuttoan_phatsinh();

    $tongtienthuetndn = $dataBANGBTPS[0]['sotien'];

    $dataBANGCDTK = $OBJCT->load_danhsach_bangcd_tk_tmp();

    $dataBTPS = $OBJBCT->load_danhsach_buttoan_phatsinh_cokeylama();

    $NoTKDT = $dataBTPS['KCDOTT']['sotien'] + $dataBTPS['KCDTTP']['sotien'] + $dataBTPS['KCDTDV']['sotien'];

    $tongtien10 = 0;
    $tongtien20 = 0;
    $tongtien30 = 0;
    $tongtien40 = 0;
    $tongtien60 = 0;

    foreach ($dataDanhSachXDKQKD as $itemPL) {
        $arr_tkco = explode(",", $itemPL['matk']);
        $arr_tkno = explode(",", $itemPL['tkno']);
        $tongtien = "tongtien" . $itemPL['machitieu'];

        $tongco = 0;
        $tongno = 0;
        foreach ($arr_tkco as $itemtkco) {
            if ($itemtkco == '635') {
                $tongco += $dataBTPS['KCCPTC']['sotien'];
            } else {
                $tongco += $dataBANGCDTK[$itemtkco]['tongducops'];
            }

        }
        foreach ($arr_tkno as $itemtkno) {
            if ($itemtkno == '511') {
                $tongno += ($dataBANGCDTK[$itemtkno]['tongdunops'] - $NoTKDT);
            } else if ($itemtkno == '642') {
                $tongno += ($dataBTPS['KCCPBH']['sotien'] + $dataBTPS['KCCPKD']['sotien'] + $dataBTPS['KCCPHT']['sotien']);
            } else if ($itemtkno == '632') {
                $tongno += $dataBTPS['KCGVHB']['sotien'];
            } else if ($itemtkno == '811') {
                $tongno += $dataBTPS['KCCPHD']['sotien'];
            } else {
                $tongno += $dataBANGCDTK[$itemtkno]['tongdunops'];
            }

        }
        if ($arr_tkco[0] != "") {
            $$tongtien = $tongco;
        }
        if ($arr_tkno[0] != "") {
            $$tongtien = $tongno;
        }

        $tongtien51 = $tongtienthuetndn; // Gán thuế thu nhập doanh nghiệp từ bảng bút toán ps

        $value1 .= "('" . $itemPL['machitieu'] . "','" . $itemPL['chitieu'] . "','" . $itemPL['thietminh'] . "','" . $$tongtien . "','" . $itemPL['sotiendk'] . "','" . $quy . "','" . $itemPL['cap'] . "'),";
    }
    database::re_query("delete from tmp_kqhdkd WHERE quy='" . $quy . "'");
    $sql_ins1 = "insert into tmp_kqhdkd(maso,chitieu,thietminh,namnay,namtruoc,quy,cap) VALUE " . substr($value1, 0, -1);
    database::re_query("$sql_ins1");

    $tongtien10 = $tongtien01 - $tongtien02;
    $tongtien20 = $tongtien10 - $tongtien11;
    $tongtien30 = $tongtien20 + $tongtien21 - $tongtien22 - $tongtien24;
    $tongtien40 = $tongtien31 - $tongtien32;
    $tongtien50 = $tongtien30 + $tongtien40;
    $tongtien60 = $tongtien50 - $tongtien51;

    database::re_query(" update tmp_kqhdkd set namnay=" . $tongtien10 . " where maso='10' and quy='" . $quy . "'");
    database::re_query(" update tmp_kqhdkd set namnay=" . $tongtien20 . " where maso='20' and quy='" . $quy . "'");
    database::re_query(" update tmp_kqhdkd set namnay=" . $tongtien30 . " where maso='30' and quy='" . $quy . "'");
    database::re_query(" update tmp_kqhdkd set namnay=" . $tongtien40 . " where maso='40' and quy='" . $quy . "'");
    database::re_query(" update tmp_kqhdkd set namnay=" . $tongtien50 . " where maso='50' and quy='" . $quy . "'");
    database::re_query(" update tmp_kqhdkd set namnay=" . $tongtien60 . " where maso='60' and quy='" . $quy . "'");
}




