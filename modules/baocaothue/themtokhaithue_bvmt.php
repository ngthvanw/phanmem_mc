<?php
include("../../config.php");
$OBJCT = new baocaothue();
$OBJKTTH = new ketoantonghop();

$thangtinhthue = $_GET['thangtinhthue'];
$namtinhthue = $_GET['namtinhthue'];

$loaiks = $_GET['loaiks'];
$dvt = $_GET['dvt'];
$tendvt = $_GET['tendvt'];
$maloaiks = $_GET['maloaiks'];
$tenloai = $_GET['tenloai'];
$soluong = str_replace(",", "",$_GET['soluong']);
$mucphi = str_replace(",", "",$_GET['mucphi']);
$hesotinhphi = str_replace(",", "",$_GET['hesotinhphi']);
$thanhtien = str_replace(",", "",$_GET['thanhtien']);
$loaitokhai = $_GET['loaitokhai'];

$OBJCT->setThangQuy($thangtinhthue);
$OBJPSKT = new pskt();

$sophieu = $OBJPSKT->createSoPhieu();

$tenthang = " tháng ";
switch ($thangtinhthue) {
    case 1:
        $tenthang = " Tháng 1 - " . $namtinhthue;
        $tungay = $namtinhthue . "-" . $thangtinhthue . "-1";
        $denngay = $namtinhthue . "-" . $thangtinhthue . "-31";

        $tungaytruoc = "0000-00-00";
        $denngaytruoc = "0000-00-00";

        break;
    case 2:
        $tenthang = " Tháng 2 - " . $namtinhthue;
        $tungay = $namtinhthue . "-" . $thangtinhthue . "-1";
        if($namtinhthue%4==0){
            $denngay = $namtinhthue . "-" . $thangtinhthue . "-29";
        }else{
            $denngay = $namtinhthue . "-" . $thangtinhthue . "-28";
        }

        $tungaytruoc = $namtinhthue . "-1-1";
        $denngaytruoc = $namtinhthue . "-1-31";
        break;
    case 3:
        $tenthang = " Tháng 3 - " . $namtinhthue;
        $tungay = $namtinhthue . "-" . $thangtinhthue . "-1";
        $denngay = $namtinhthue . "-" . $thangtinhthue . "-31";

        $tungaytruoc = $namtinhthue . "-2-1";
        if($namtinhthue%4==0){
            $denngaytruoc = $namtinhthue . "-2-29";
        }else{
            $denngaytruoc = $namtinhthue . "-2-28";
        }
        break;
    case 4:
        $tenthang = " Tháng 4 - " . $namtinhthue;
        $tungay = $namtinhthue . "-" . $thangtinhthue . "-1";
        $denngay = $namtinhthue . "-" . $thangtinhthue . "-30";

        $tungaytruoc = $namtinhthue . "-3-1";
        $denngaytruoc = $namtinhthue . "-3-31";
        break;
    case 5:
        $tenthang = " Tháng 5 - " . $namtinhthue;
        $tungay = $namtinhthue . "-" . $thangtinhthue . "-1";
        $denngay = $namtinhthue . "-" . $thangtinhthue . "-31";

        $tungaytruoc = $namtinhthue . "-4-1";
        $denngaytruoc = $namtinhthue . "-4-30";
        break;
    case 6:
        $tenthang = " Tháng 6 - " . $namtinhthue;
        $tungay = $namtinhthue . "-" . $thangtinhthue . "-1";
        $denngay = $namtinhthue . "-" . $thangtinhthue . "-30";

        $tungaytruoc = $namtinhthue . "-5-1";
        $denngaytruoc = $namtinhthue . "-5-31";
        break;
    case 7:
        $tenthang = " Tháng 7 - " . $namtinhthue;
        $tungay = $namtinhthue . "-" . $thangtinhthue . "-1";
        $denngay = $namtinhthue . "-" . $thangtinhthue . "-31";

        $tungaytruoc = $namtinhthue . "-6-1";
        $denngaytruoc = $namtinhthue . "-6-30";
        break;
    case 8:
        $tenthang = " Tháng 8 - " . $namtinhthue;
        $tungay = $namtinhthue . "-" . $thangtinhthue . "-1";
        $denngay = $namtinhthue . "-" . $thangtinhthue . "-31";

        $tungaytruoc = $namtinhthue . "-7-1";
        $denngaytruoc = $namtinhthue . "-7-31";

        break;
    case 9:
        $tenthang = " Tháng 9 - " . $namtinhthue;
        $tungay = $namtinhthue . "-" . $thangtinhthue . "-1";
        $denngay = $namtinhthue . "-" . $thangtinhthue . "-30";

        $tungaytruoc = $namtinhthue . "-8-1";
        $denngaytruoc = $namtinhthue . "-8-31";
        break;
    case 10:
        $tenthang = " Tháng 10 - " . $namtinhthue;
        $tungay = $namtinhthue . "-" . $thangtinhthue . "-1";
        $denngay = $namtinhthue . "-" . $thangtinhthue . "-31";

        $tungaytruoc = $namtinhthue . "-9-1";
        $denngaytruoc = $namtinhthue . "-9-31";
        break;
    case 11:
        $tenthang = " Tháng 11 - " . $namtinhthue;
        $tungay = $namtinhthue . "-" . $thangtinhthue . "-1";
        $denngay = $namtinhthue . "-" . $thangtinhthue . "-30";


        $tungaytruoc = $namtinhthue . "-10-1";
        $denngaytruoc = $namtinhthue . "-10-31";
        break;
    case 12:
        $tenthang = " Tháng 12 - " . $namtinhthue;
        $tungay = $namtinhthue . "-" . $thangtinhthue . "-1";
        $denngay = $namtinhthue . "-" . $thangtinhthue . "-31";

        $tungaytruoc = $namtinhthue . "-11-1";
        $denngaytruoc = $namtinhthue . "-11-30";
        break;

    case "I":
        $tenthang = " Quý I - " . $namtinhthue;
        $tungay = $namtinhthue . "-1-1";
        $denngay = $namtinhthue . "-3-31";

        $tungaytruoc = "0000-00-00";
        $denngaytruoc = "0000-00-00";
        break;
    case "II":
        $tenthang = " Quý II - " . $namtinhthue;
        $tungay = $namtinhthue . "-4-1";
        $denngay = $namtinhthue . "-6-30";

        $tungaytruoc = $namtinhthue . "-1-1";
        $denngaytruoc = $namtinhthue . "-3-31";
        break;
    case "III":
        $tenthang = " Quý III - " . $namtinhthue;
        $tungay = $namtinhthue . "-7-1";
        $denngay = $namtinhthue . "-9-30";

        $tungaytruoc = $namtinhthue . "-4-1";
        $denngaytruoc = $namtinhthue . "-6-30";
        break;
    case "IV":
        $tenthang = " Quý IV - " . $namtinhthue;
        $tungay = $namtinhthue . "-10-1";
        $denngay = $namtinhthue . "-12-31";

        $tungaytruoc = $namtinhthue . "-7-1";
        $denngaytruoc = $namtinhthue . "-9-30";

        break;
    case "V":
        $tungay = $namtinhthue . "-1-1";
        $denngay = $namtinhthue . "-12-31";
        break;

}

$OBJCT->ThemToKhaiThue_BVMT($loaiks,$tenloai,$maloaiks,$dvt,$soluong,$mucphi,$thanhtien,$loaitokhai,$thangtinhthue."-".$namtinhthue,$tendvt,$hesotinhphi);

