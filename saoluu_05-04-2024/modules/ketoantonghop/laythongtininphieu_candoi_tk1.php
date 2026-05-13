<?php
include("../../config.php");
$OBJCT = new ketoantonghop();
$tungay = $_GET['tungay'];

$denngay = $_GET['denngay'];

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;

$captaikhoan = $_GET['intheothuesuat'];

$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];

    $str_w=" and ngayghiso >='".$tungay."' and ngayghiso<= '".$denngay."'";
    $str_w2=" and ngayghiso >='".$tungay."' and ngayghiso<='".$denngay."'";
    $OBJCT->setStrOderby($str_w);
    $OBJCT->setStrOderby2($str_w2);

$dataDanhsachTK_No_Co = $OBJCT->load_danhsach_taikhoannoco_bangcdkt($matk,"ALL","ngayghiso");

//debug($dataDanhsachTK_No_Co);
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

$_SESSION["THONGTINPHIEU"]['thangtk'] = "Từ  " .dd_mm_yyy($tungay) ." đến " .dd_mm_yyy($denngay);

$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $_GET['ngayhoadon'];
$_SESSION["THONGTINPHIEU"]['incaptk'] = $captaikhoan;

$dataBCDTK = $OBJCT->load_danhsach_bangcd_tk(0,6,$array_no);
debug($dataBCDTK);
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
    if($soduno==0 && $soduco==0 && $sodunops==0 && $soducops==0)
    {

    }else{
        $value1.= "('".$itemCT['matk']."','".$itemCT['tentk']."','".$soduno."','".$soduco."','".$sodunops."','".$soducops."','".$sodunock."','".$soducock."','".$itemCT['CAP']."'),";
    }

}
database::re_query("TRUNCATE bangcdtk");
echo $sql_ins1 = "insert into bangcdtk(matk,tentk,nodk,codk,nops,cops,nock,cock,cap) VALUE ".substr($value1, 0,-1);
database::re_query("$sql_ins1");
$dataBangCDTK= $OBJCT->load_danhsach_bangcd_tk_tmp();
$_SESSION["LISTCTBCDTK"]=$dataBangCDTK;

//debug($dataBangCDTK);




