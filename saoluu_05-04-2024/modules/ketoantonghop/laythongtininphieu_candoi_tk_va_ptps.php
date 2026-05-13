<?php
include("../../config.php");
$OBJCT = new ketoantonghop();
if($_SESSION['theothongtu']=="tt200"){
    $OBJPSKT = new pskt();
    $sophieu = $OBJPSKT->createSoPhieu();
    $tungay = $_GET['tungay'];

    $denngay = $_GET['denngay'];

    $_SESSION['TuNgay'] = $tungay;
    $_SESSION['DenNgay'] = $denngay;

    $captaikhoan = $_GET['intheothuesuat'];

////////////////////////////////////////////////////////
    $sql_emp_pskt = "delete from pskt where loaiphieu='66' ";
    database::re_query($sql_emp_pskt);

    $sql_emp_chitiet_pskt = "delete from chitiet_pskt where loaiphieu='66' ";
    database::re_query($sql_emp_chitiet_pskt);
/////////////////////////////////////////////////////////////////////

    $tenphieu= $_GET['tenphieu'];
    $ngaylap= $_GET['ngaylap'];

    $str_w=" and ngayghiso >='".$tungay."' and ngayghiso<= '".$denngay."'";
    $str_w2=" and ngayghiso >='".$tungay."' and ngayghiso<='".$denngay."'";
    $OBJCT->setStrOderby($str_w);
    $OBJCT->setStrOderby2($str_w2);

    $dataDanhsachTK_No_Co = $OBJCT->load_danhsach_taikhoannoco_bangcdkt($matk,"ALL","ngayghiso");// Lấy bảng cân đối tài khoản

    $dataBangCongNoKH = $OBJCT->load_danhsach_bangno_khachhang();

    $array_no=array();
    foreach ($dataDanhsachTK_No_Co as $kTK=>$itemTK){
        $tongnotheotk=0;
        $tongcotheotk=0;
        foreach ($itemTK as $ItemNo){
            $tongcotheotk+=$ItemNo['tienco'];
            $tongnotheotk+=$ItemNo['tienno'];
        }
        $array_no[$kTK]['sodunops']=$tongnotheotk;
        $array_no[$kTK]['soducops']=$tongcotheotk;
    }

    $dataBCDTK = $OBJCT->load_danhsach_bangcd_tk(0,6,$array_no);

    $dataKetChuyen="";
    foreach ($dataBCDTK as $itemCT){

        if ( $itemCT["tongduno"] != 0) {
            $soduno= $itemCT["tongduno"];
        } else {
            $soduno= $itemCT["soduno"];
        }

        if ( $itemCT["tongduco"] != 0) {
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
        $_soducktinh = ($itemCT["soduno"]+$itemCT["sodunops"]) - ($itemCT["soduco"]+$itemCT["soducops"]);
        $_soducock=0;
        $_sodunock=0;

        if($_soducktinh>=0){
            $_sodunock = abs(($itemCT["soduno"]+$itemCT["sodunops"]) - ($itemCT["soduco"]+$itemCT["soducops"]));
        }
        if($_soducktinh>=0){
        }else {
            $_soducock = abs(($itemCT["soduno"]+$itemCT["sodunops"]) - ($itemCT["soduco"]+$itemCT["soducops"]));
        }

        $soducktinh = ($soduno+$sodunops) - ($soduco+$soducops);
        $soducock=0;
        $sodunock=0;
        if($soducktinh>=0){
            $sodunock = ($soduno+$sodunops) - ($soduco+$soducops);
        }
        if($soducktinh>=0){
        }else{
            $soducock = ($soduco+$soducops) - ($soduno+$sodunops);
        }

        /// Trường hợp tài khoảng luongx tính
        if($itemCT['matk']=='131' || $itemCT['matk']=='331') {
            if($sodunock==$soducock){
                $_sodunock = 0;
                $_soducock = 0;
                $sodunock = 0;
                $soducock = 0;
            }else{
                //$_sodunock = abs(($itemCT["soduno"] + $itemCT["sodunops"]));
                //$_soducock =($itemCT["soduco"] + $itemCT["soducops"]);
                //$sodunock = ($soduno+$sodunops);
                //$soducock = ($soduco+$soducops);

                $_sodunock = $dataBangCongNoKH[$itemCT['matk']]['nock'];
                $_soducock =$dataBangCongNoKH[$itemCT['matk']]['cock'];
                $sodunock = $dataBangCongNoKH[$itemCT['matk']]['nock'];
                $soducock = $dataBangCongNoKH[$itemCT['matk']]['cock'];
            }
        }

        ///
        if($soduno==0 && $soduco==0 && $sodunops==0 && $soducops==0)
        {

        }else{
            $dataKetChuyen[$itemCT['matk']][] = ($sodunock-$soducock);
            $dataKetChuyen[$itemCT['matk']][] = ($soduco-$soduno);
        }

    }
//debug($dataKetChuyen);
    $OBJCT->load_danhsachbuttoan_phatsinh_va_thempskt_tt200($dataKetChuyen,$tungay,$denngay,$sophieu);

///// Chạy lại bảng cân đối tài khoản--------------------------------------------------------
    $dataDanhsachTK_No_Co="";
    $dataDanhsachTK_No_Co = $OBJCT->load_danhsach_taikhoannoco_bangcdkt($matk,"ALL","ngayghiso");

    $array_no=array();
    foreach ($dataDanhsachTK_No_Co as $kTK=>$itemTK){
        $tongnotheotk=0;
        $tongcotheotk=0;
        foreach ($itemTK as $ItemNo){
            $tongcotheotk+=$ItemNo['tienco'];
            $tongnotheotk+=$ItemNo['tienno'];
        }
        $array_no[$kTK]['sodunops']=$tongnotheotk;
        $array_no[$kTK]['soducops']=$tongcotheotk;
    }

    $dataBCDTK = $OBJCT->load_danhsach_bangcd_tk(0,6,$array_no);

    foreach ($dataBCDTK as $itemCT){
        if ( $itemCT["tongduno"] != 0) {
            $soduno= $itemCT["tongduno"];
        } else {
            $soduno= $itemCT["soduno"];
        }

        if ( $itemCT["tongduco"] != 0) {
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
        $_soducktinh = ($itemCT["soduno"]+$itemCT["sodunops"]) - ($itemCT["soduco"]+$itemCT["soducops"]);
        $_soducock=0;
        $_sodunock=0;

        if($_soducktinh>=0){
            $_sodunock = abs(($itemCT["soduno"]+$itemCT["sodunops"]) - ($itemCT["soduco"]+$itemCT["soducops"]));
        }
        if($_soducktinh>=0){
        }else {
            $_soducock = abs(($itemCT["soduno"]+$itemCT["sodunops"]) - ($itemCT["soduco"]+$itemCT["soducops"]));
        }

        $soducktinh = ($soduno+$sodunops) - ($soduco+$soducops);
        $soducock=0;
        $sodunock=0;
        if($soducktinh>=0){
            $sodunock = ($soduno+$sodunops) - ($soduco+$soducops);
        }
        if($soducktinh>=0){
        }else{
            $soducock = ($soduco+$soducops) - ($soduno+$sodunops);
        }

        /// Trường hợp tài khoảng luongx tính
        if($itemCT['matk']=='131' || $itemCT['matk']=='331') {
            if($sodunock==$soducock){
                $_sodunock = 0;
                $_soducock = 0;
                $sodunock = 0;
                $soducock = 0;
            }else{

                $_sodunock = $dataBangCongNoKH[$itemCT['matk']]['nock'];
                $_soducock =$dataBangCongNoKH[$itemCT['matk']]['cock'];
                $sodunock = $dataBangCongNoKH[$itemCT['matk']]['nock'];
                $soducock = $dataBangCongNoKH[$itemCT['matk']]['cock'];
            }
        }

        ///
        if($soduno==0 && $soduco==0 && $sodunops==0 && $soducops==0)
        {

        }else{
            $value1.= "('".$itemCT['matk']."','".$itemCT['tentk']."','".$soduno."','".$soduco."','".$sodunops."','".$soducops."','".$sodunock."','".$soducock."','".$itemCT['CAP']."','".$_sodunock."','".$_soducock."','".$itemCT['matkcha']."'),";
        }

    }
    database::re_query("delete from bangcdtk");
    database::re_query("ALTER TABLE bangcdtk AUTO_INCREMENT=1;");
    $sql_ins1 = "insert into bangcdtk(matk,tentk,nodk,codk,nops,cops,nock,cock,cap,_nock,_cock,matkcha) VALUE ".substr($value1, 0,-1);// Xử lý lại bảng cân đối tài khoản
    database::re_query("$sql_ins1");
    database::re_query("delete from tmp_bangcdtk");
    database::re_query("ALTER TABLE tmp_bangcdtk AUTO_INCREMENT=1;");
    database::re_query("create table tmp_bangcdtk select * from bangcdtk;");
}else {
    $OBJPSKT = new pskt();
    $sophieu = $OBJPSKT->createSoPhieu();
    $tungay = $_GET['tungay'];

    $denngay = $_GET['denngay'];

    $_SESSION['TuNgay'] = $tungay;
    $_SESSION['DenNgay'] = $denngay;

    $captaikhoan = $_GET['intheothuesuat'];

////////////////////////////////////////////////////////
    $sql_emp_pskt = "delete from pskt where loaiphieu='66' ";
    database::re_query($sql_emp_pskt);

    $sql_emp_chitiet_pskt = "delete from chitiet_pskt where loaiphieu='66' ";
    database::re_query($sql_emp_chitiet_pskt);
/////////////////////////////////////////////////////////////////////

    $tenphieu = $_GET['tenphieu'];
    $ngaylap = $_GET['ngaylap'];

    $str_w = " and ngayghiso >='" . $tungay . "' and ngayghiso<= '" . $denngay . "'";
    $str_w2 = " and ngayghiso >='" . $tungay . "' and ngayghiso<='" . $denngay . "'";
    $OBJCT->setStrOderby($str_w);
    $OBJCT->setStrOderby2($str_w2);

    $dataDanhsachTK_No_Co = $OBJCT->load_danhsach_taikhoannoco_bangcdkt($matk, "ALL", "ngayghiso");// Lấy bảng cân đối tài khoản

    $dataBangCongNoKH = $OBJCT->load_danhsach_bangno_khachhang();

    $array_no = array();
    foreach ($dataDanhsachTK_No_Co as $kTK => $itemTK) {
        $tongnotheotk = 0;
        $tongcotheotk = 0;
        foreach ($itemTK as $ItemNo) {
            $tongcotheotk += $ItemNo['tienco'];
            $tongnotheotk += $ItemNo['tienno'];
        }
        $array_no[$kTK]['sodunops'] = $tongnotheotk;
        $array_no[$kTK]['soducops'] = $tongcotheotk;
    }

    $dataBCDTK = $OBJCT->load_danhsach_bangcd_tk(0, 6, $array_no);

    $dataKetChuyen = "";
    foreach ($dataBCDTK as $itemCT) {

        if ($itemCT["tongduno"] != 0) {
            $soduno = $itemCT["tongduno"];
        } else {
            $soduno = $itemCT["soduno"];
        }

        if ($itemCT["tongduco"] != 0) {
            $soduco = $itemCT["tongduco"];
        } else {
            $soduco = $itemCT["soduco"];
        }

        if ($itemCT["tongdunops"] != "" || $itemCT["tongdunops"] != 0) {
            $sodunops = $itemCT["tongdunops"];
        } else {
            $sodunops = $itemCT["sodunops"];
        }

        if ($itemCT["tongducops"] != "" || $itemCT["tongducops"] != 0) {
            $soducops = $itemCT["tongducops"];
        } else {
            $soducops = $itemCT["soducops"];
        }
        $_soducktinh = ($itemCT["soduno"] + $itemCT["sodunops"]) - ($itemCT["soduco"] + $itemCT["soducops"]);
        $_soducock = 0;
        $_sodunock = 0;

        if ($_soducktinh >= 0) {
            $_sodunock = abs(($itemCT["soduno"] + $itemCT["sodunops"]) - ($itemCT["soduco"] + $itemCT["soducops"]));
        }
        if ($_soducktinh >= 0) {
        } else {
            $_soducock = abs(($itemCT["soduno"] + $itemCT["sodunops"]) - ($itemCT["soduco"] + $itemCT["soducops"]));
        }

        $soducktinh = ($soduno + $sodunops) - ($soduco + $soducops);
        $soducock = 0;
        $sodunock = 0;
        if ($soducktinh >= 0) {
            $sodunock = ($soduno + $sodunops) - ($soduco + $soducops);
        }
        if ($soducktinh >= 0) {
        } else {
            $soducock = ($soduco + $soducops) - ($soduno + $sodunops);
        }

        /// Trường hợp tài khoảng luongx tính
        if ($itemCT['matk'] == '131' || $itemCT['matk'] == '331') {
            if ($sodunock == $soducock) {
                $_sodunock = 0;
                $_soducock = 0;
                $sodunock = 0;
                $soducock = 0;
            } else {
                //$_sodunock = abs(($itemCT["soduno"] + $itemCT["sodunops"]));
                //$_soducock =($itemCT["soduco"] + $itemCT["soducops"]);
                //$sodunock = ($soduno+$sodunops);
                //$soducock = ($soduco+$soducops);

                $_sodunock = $dataBangCongNoKH[$itemCT['matk']]['nock'];
                $_soducock = $dataBangCongNoKH[$itemCT['matk']]['cock'];
                $sodunock = $dataBangCongNoKH[$itemCT['matk']]['nock'];
                $soducock = $dataBangCongNoKH[$itemCT['matk']]['cock'];
            }
        }

        ///
        if ($soduno == 0 && $soduco == 0 && $sodunops == 0 && $soducops == 0) {

        } else {
            $dataKetChuyen[$itemCT['matk']][] = ($sodunock - $soducock);
            $dataKetChuyen[$itemCT['matk']][] = ($soduco - $soduno);
        }

    }
//debug($dataKetChuyen);
    $OBJCT->load_danhsachbuttoan_phatsinh_va_thempskt($dataKetChuyen, $tungay, $denngay, $sophieu);

///// Chạy lại bảng cân đối tài khoản--------------------------------------------------------
    $dataDanhsachTK_No_Co = "";
    $dataDanhsachTK_No_Co = $OBJCT->load_danhsach_taikhoannoco_bangcdkt($matk, "ALL", "ngayghiso");

    $array_no = array();
    foreach ($dataDanhsachTK_No_Co as $kTK => $itemTK) {
        $tongnotheotk = 0;
        $tongcotheotk = 0;
        foreach ($itemTK as $ItemNo) {
            $tongcotheotk += $ItemNo['tienco'];
            $tongnotheotk += $ItemNo['tienno'];
        }
        $array_no[$kTK]['sodunops'] = $tongnotheotk;
        $array_no[$kTK]['soducops'] = $tongcotheotk;
    }

    $dataBCDTK = $OBJCT->load_danhsach_bangcd_tk(0, 6, $array_no);

    foreach ($dataBCDTK as $itemCT) {
        if ($itemCT["tongduno"] != 0) {
            $soduno = $itemCT["tongduno"];
        } else {
            $soduno = $itemCT["soduno"];
        }

        if ($itemCT["tongduco"] != 0) {
            $soduco = $itemCT["tongduco"];
        } else {
            $soduco = $itemCT["soduco"];
        }

        if ($itemCT["tongdunops"] != "" || $itemCT["tongdunops"] != 0) {
            $sodunops = $itemCT["tongdunops"];
        } else {
            $sodunops = $itemCT["sodunops"];
        }

        if ($itemCT["tongducops"] != "" || $itemCT["tongducops"] != 0) {
            $soducops = $itemCT["tongducops"];
        } else {
            $soducops = $itemCT["soducops"];
        }
        $_soducktinh = ($itemCT["soduno"] + $itemCT["sodunops"]) - ($itemCT["soduco"] + $itemCT["soducops"]);
        $_soducock = 0;
        $_sodunock = 0;

        if ($_soducktinh >= 0) {
            $_sodunock = abs(($itemCT["soduno"] + $itemCT["sodunops"]) - ($itemCT["soduco"] + $itemCT["soducops"]));
        }
        if ($_soducktinh >= 0) {
        } else {
            $_soducock = abs(($itemCT["soduno"] + $itemCT["sodunops"]) - ($itemCT["soduco"] + $itemCT["soducops"]));
        }

        $soducktinh = ($soduno + $sodunops) - ($soduco + $soducops);
        $soducock = 0;
        $sodunock = 0;
        if ($soducktinh >= 0) {
            $sodunock = ($soduno + $sodunops) - ($soduco + $soducops);
        }
        if ($soducktinh >= 0) {
        } else {
            $soducock = ($soduco + $soducops) - ($soduno + $sodunops);
        }

        /// Trường hợp tài khoảng luongx tính
        if ($itemCT['matk'] == '131' || $itemCT['matk'] == '331') {
            if ($sodunock == $soducock) {
                $_sodunock = 0;
                $_soducock = 0;
                $sodunock = 0;
                $soducock = 0;
            } else {

                $_sodunock = $dataBangCongNoKH[$itemCT['matk']]['nock'];
                $_soducock = $dataBangCongNoKH[$itemCT['matk']]['cock'];
                $sodunock = $dataBangCongNoKH[$itemCT['matk']]['nock'];
                $soducock = $dataBangCongNoKH[$itemCT['matk']]['cock'];
            }
        }

        ///
        if ($soduno == 0 && $soduco == 0 && $sodunops == 0 && $soducops == 0) {

        } else {
            $value1 .= "('" . $itemCT['matk'] . "','" . $itemCT['tentk'] . "','" . $soduno . "','" . $soduco . "','" . $sodunops . "','" . $soducops . "','" . $sodunock . "','" . $soducock . "','" . $itemCT['CAP'] . "','" . $_sodunock . "','" . $_soducock . "','" . $itemCT['matkcha'] . "'),";
        }

    }
    database::re_query("delete from bangcdtk");
    database::re_query("ALTER TABLE bangcdtk AUTO_INCREMENT=1;");
    $sql_ins1 = "insert into bangcdtk(matk,tentk,nodk,codk,nops,cops,nock,cock,cap,_nock,_cock,matkcha) VALUE " . substr($value1, 0, -1);// Xử lý lại bảng cân đối tài khoản
    database::re_query("$sql_ins1");
    database::re_query("delete from tmp_bangcdtk");
    database::re_query("ALTER TABLE tmp_bangcdtk AUTO_INCREMENT=1;");
    database::re_query("create table tmp_bangcdtk select * from bangcdtk;");
}





