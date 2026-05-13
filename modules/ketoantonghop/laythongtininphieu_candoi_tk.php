<?php
include("../../config.php");
$OBJSDDK = new sodutk();
unset($_SESSION["LISTCTBCDTK"]);
$OBJSDDK->themdstk();
$OBJSDDK->re_query(" DELETE FROM sdtkdk WHERE matk not in (select matk FROM matk) ");
$OBJSDDK->re_query("UPDATE sdtkdk JOIN matk 
                            ON sdtkdk.matk = matk.matk
                            SET sdtkdk.matkcha = matk.matkcha,
                            sdtkdk.tentk = matk.tentk");
$OBJCT = new ketoantonghop();
$OBJPSVT = new ps_chitiet_mavattu();
$tungay = $_GET['tungay'];

$denngay = $_GET['denngay'];

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;

$captaikhoan = $_GET['intheothuesuat'];
$intheochungtu= $_GET['intheochungtu'];
$sapxeptheohoadon= $_GET['sapxeptheohoadon'];
$xemchitiet= $_GET['xemchitiet'];
$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];

    $str_w=" and ngayghiso >='".$tungay."' and ngayghiso<= '".$denngay."'";
    $str_w2=" and ngayghiso >='".$tungay."' and ngayghiso<='".$denngay."'";
    $OBJCT->setStrOderby($str_w);
    $OBJCT->setStrOderby2($str_w2);
//$OBJPSVT->themdanhsach_mabp_cuapskt();
$dataDanhsachTK_No_Co = $OBJCT->load_danhsach_taikhoannoco_bangcdkt($matk,"ALL","ngayghiso");

$array_no=array();
$tong1 = 0;
$tong2 = 0;
foreach ($dataDanhsachTK_No_Co as $kTK=>$itemTK){
    $tongnotheotk=0;
    $tongcotheotk=0;
    foreach ($itemTK as $ItemNo) {
        if($ItemNo['tk']!="" && $ItemNo['tkdu']!="") {
        $tongcotheotk += $ItemNo['tienco'];
        $tongnotheotk += $ItemNo['tienno'];
            $tong1+=$ItemNo['tienco'];
            $tong2+=$ItemNo['tienno'];
            $array_tk[$ItemNo['tk']] = $ItemNo['tk'];
            $array_tkdu[$ItemNo['tkdu']] = $ItemNo['tkdu'];

        }
        //echo $ItemNo['tk'] . " - " . $ItemNo['tkdu'] . "-" . $ItemNo['tienco'] . "-" . $ItemNo['tienno'] . "<br/>";
    }

    $array_no[$kTK]['sodunops']=$tongnotheotk;
    $array_no[$kTK]['soducops']=$tongcotheotk;
}
//echo $tong1." - ".$tong2;
$_SESSION["THONGTINPHIEU"]['thangtk'] = "Từ  " .dd_mm_yyy($tungay) ." đến " .dd_mm_yyy($denngay);

//$OBJCT->loadListDanhSachTKChiTiet();

$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $_GET['ngayhoadon'];
$_SESSION["THONGTINPHIEU"]['incaptk'] = $captaikhoan;

//$_SESSION["LISTCTSONHATKY"] = array_merge($dataThu,$dataChi);
$OBJCT->re_query(" update sdtkdk set soduno=0,soduco=0 WHERE SUBSTRING(matk,1,1)>4");
$dataBCDTK = $OBJCT->load_danhsach_bangcd_tk(0,6,$array_no);
//debug($dataBCDTK);
$dataBangCongNoKH = $OBJCT->load_danhsach_bangno_khachhang();
$dataBangCongNoKH_BUTRUCN = $OBJCT->load_danhsach_bangno_khachhang_cobutru();

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
    if ($itemCT["tongdunock"] != "" || $itemCT["tongdunock"] != 0) {
        $sodunock=$itemCT["tongdunock"];
    } else {
        $sodunock=$itemCT["sodunock"];
    }

    if ($itemCT["tongducock"] != "" || $itemCT["tongducock"] != 0) {
        $soducock=$itemCT["tongducock"];
    } else {
        $soducock=$itemCT["soducock"];
    }
    /*
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
    */

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
            if ($_SESSION['butrucongno']==1 && $itemCT['matk']==131) {// Nếu có bù trừ công nợ
                $_sodunock = $dataBangCongNoKH_BUTRUCN[$itemCT['matk']]['nock'];
                $_soducock = $dataBangCongNoKH_BUTRUCN[$itemCT['matk']]['cock'];
                $sodunock    = $dataBangCongNoKH_BUTRUCN[$itemCT['matk']]['nock'];
                $soducock    = $dataBangCongNoKH_BUTRUCN[$itemCT['matk']]['cock'];
            }
        }
        if ($_SESSION['butrucongno']==1 && $itemCT['matk']==131) {// Nếu có bù trừ công nợ
            $soduno = $dataBangCongNoKH_BUTRUCN[$itemCT['matk']]['nodk'];
            $soduco = $dataBangCongNoKH_BUTRUCN[$itemCT['matk']]['codk'];
        }
    }
//debug($dataBangCongNoKH_DK);
    $tongcongcock +=$soducock;
    $tongcongnock +=$sodunock;

    if($soduno==0 && $soduco==0 && $sodunops==0 && $soducops==0)
    {

    }else{
        $value1.= "('".$itemCT['matk']."','".$itemCT['tentk']."','".$soduno."','".$soduco."','".$sodunops."','".$soducops."','".$sodunock."','".$soducock."','".$itemCT['CAP']."','".$_sodunock."','".$_soducock."','".$itemCT['matkcha']."'),";
    }

}
if(($tongcongnock-$tongcongcock)!=0){
    //echo 1;
}
$OBJCT->re_query("delete from bangcdtk");
$OBJCT->re_query("ALTER TABLE bangcdtk AUTO_INCREMENT=1;");

$sql_ins1 = "insert into bangcdtk(matk,tentk,nodk,codk,nops,cops,nock,cock,cap,_nock,_cock,matkcha) VALUE ".substr($value1, 0,-1);
$OBJCT->re_query($sql_ins1);
$dataBangCDTK= $OBJCT->load_danhsach_bangcd_tk_tmp();
$_SESSION["LISTCTBCDTK"]=$dataBangCDTK;
$_SESSION["LISTCTBCDTKNO"] = $array_no;
$_SESSION["LISTCTBCDTKCO"] = $array_co;