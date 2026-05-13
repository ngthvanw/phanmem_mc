<?php
include("../../config.php");

if($_SESSION['theothongtu']=="tt200"){
$OBJCT = new ketoantonghop();
$OBJCT->re_query("ALTER TABLE `bangcdkt` ADD `tentsnv_en` TEXT NOT NULL AFTER `tentsnv`;");
$OBJCT->re_query("ALTER TABLE `bangcdkt` CHANGE `tentsnv` `tentsnv` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
$tungay = $_GET['tungay'];

$denngay = $_GET['denngay'];

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;

$captaikhoan = $_GET['intheothuesuat'];
$intheochungtu= $_GET['intheochungtu'];
$sapxeptheohoadon= $_GET['sapxeptheohoadon'];
$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];

    $str_w=" and ngayghiso >='".$tungay."' and ngayghiso<= '".$denngay."'";
    $str_w2=" and ngayghiso >='".$tungay."' and ngayghiso<='".$denngay."'";
    $OBJCT->setStrOderby($str_w);
    $OBJCT->setStrOderby2($str_w2);

$danhsachbangcandoitk = $OBJCT->load_danhsach_bangcdtk_tt200();// lấy số đầu kỳ trong bản cdtk

$dataBangCongNoKH = $OBJCT->load_danhsach_bangno_khachhang_tt200();
$dataBangCongNoKH_DK = $OBJCT->load_danhsach_bangno_khachhang_dk_tt200();

//debug($dataBangCongNoKH);
foreach ($dataBangCongNoKH as $kTKCK=> $itemCNCK){
    $danhsachbangcandoitk[$kTKCK][0]['nodk']=$dataBangCongNoKH_DK[$kTKCK][0]['nodk'];
    $danhsachbangcandoitk[$kTKCK][0]['codk']=$dataBangCongNoKH_DK[$kTKCK][0]['codk'];
    $danhsachbangcandoitk[$kTKCK][0]['nock']=$itemCNCK[0]['nock'];
    $danhsachbangcandoitk[$kTKCK][0]['cock']=$itemCNCK[0]['cock'];

    $danhsachbangcandoitk[$kTKCK][1]['nodk']=$dataBangCongNoKH_DK[$kTKCK][1]['nodk'];
    $danhsachbangcandoitk[$kTKCK][1]['codk']=$dataBangCongNoKH_DK[$kTKCK][1]['codk'];
    $danhsachbangcandoitk[$kTKCK][1]['nock']=$itemCNCK[1]['nock'];
    $danhsachbangcandoitk[$kTKCK][1]['cock']=$itemCNCK[1]['cock'];
}
//debug($danhsachbangcandoitk);
/*
if($dataBangCongNoKH['1388']['nock']!=0 || $dataBangCongNoKH['1388']['cock']||$dataBangCongNoKH_DK['1388']['nodk']|| $dataBangCongNoKH_DK['1388']['codk']){
    $danhsachbangcandoitk['1388']['nock']=$dataBangCongNoKH['1388']['nock'];
    $danhsachbangcandoitk['1388']['cock']=$dataBangCongNoKH['1388']['cock'];

    $danhsachbangcandoitk['1388']['nodk']=$dataBangCongNoKH_DK['1388']['nodk'];
    $danhsachbangcandoitk['1388']['codk']=$dataBangCongNoKH_DK['1388']['codk'];
}
if($dataBangCongNoKH['3388']['nock']!=0 || $dataBangCongNoKH['3388']['cock']||$dataBangCongNoKH_DK['3388']['nodk']|| $dataBangCongNoKH_DK['3388']['codk']) {
    $danhsachbangcandoitk['3388']['nock']=$dataBangCongNoKH['3388']['nock'];
    $danhsachbangcandoitk['3388']['cock']=$dataBangCongNoKH['3388']['cock'];

    $danhsachbangcandoitk['3388']['nodk']=$dataBangCongNoKH_DK['3388']['nodk'];
    $danhsachbangcandoitk['3388']['codk']=$dataBangCongNoKH_DK['3388']['codk'];
}*/

$_SESSION["THONGTINPHIEU"]['thangtk'] = "Từ  " .dd_mm_yyy($tungay) ." đến " .dd_mm_yyy($denngay);


$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $_GET['ngayhoadon'];
$_SESSION["THONGTINPHIEU"]['incaptk'] = $captaikhoan;

																			

$dataBCDTK = $OBJCT->them_danhsach_bangcd_ketoan_tt200(0,6,$danhsachbangcandoitk);

foreach ($dataBCDTK as $itemCT){
    $sodudk = "sodudk".$itemCT['maso'];
    $soduck = "soduck".$itemCT['maso'];
    $$sodudk = $itemCT['sodudk'];
    $$soduck = $itemCT['soduck'];
}

//// Tài sản ngắn hạn
$sodudk110 = $sodudk111+$sodudk112;
$sodudk120 = $sodudk121-$sodudk122+$sodudk123;
$sodudk130 = $sodudk131+$sodudk132+$sodudk133+$sodudk134+$sodudk135+$sodudk136-$sodudk137+$sodudk139;
$sodudk140 = $sodudk141-$sodudk149;
$sodudk150 = $sodudk151+$sodudk152+$sodudk153+$sodudk154+$sodudk155;
$sodudk100 = $sodudk110+$sodudk120+$sodudk130+$sodudk140+$sodudk150;

$soduck110 = $soduck111+$soduck112;
$soduck120 = $soduck121-$soduck122+$soduck123;
$soduck130 = $soduck131+$soduck132+$soduck133+$soduck134+$soduck135+$soduck136-$soduck137+$soduck139;
$soduck140 = $soduck141-$soduck149;
$soduck150 = $soduck151+$soduck152+$soduck153+$soduck154+$soduck155;
$soduck100 = $soduck110+$soduck120+$soduck130+$soduck140+$soduck150;

$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk110.",soduck=".$soduck110." where maso = '110'");
$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk120.",soduck=".$soduck120." where maso = '120'");
$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk130.",soduck=".$soduck130." where maso = '130'");
$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk140.",soduck=".$soduck140." where maso = '140'");
$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk150.",soduck=".$soduck150." where maso = '150'");
$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk100.",soduck=".$soduck100." where maso = '100'");

//// Tài sản dài hạn
$sodudk210 = $sodudk211+$sodudk212+$sodudk213+$sodudk214+$sodudk215+$sodudk216-$sodudk219;
$sodudk221 = $sodudk222-$sodudk223;
$sodudk224 = $sodudk225-$sodudk226;
$sodudk227 = $sodudk228-$sodudk229;
$sodudk220 = $sodudk221+$sodudk224+$sodudk227;
$sodudk230 = $sodudk231-$sodudk232;
$sodudk240 = $sodudk241+$sodudk242;
$sodudk250 = $sodudk251+$sodudk252+$sodudk253-$sodudk254+$sodudk255;
$sodudk260 = $sodudk261+$sodudk262+$sodudk263+$sodudk268;
$sodudk200 = $sodudk210+$sodudk220+$sodudk230+$sodudk240+$sodudk250+$sodudk260;
$sodudk270 = $sodudk100+$sodudk200;

$soduck210 = $soduck211+$soduck212+$soduck213+$soduck214+$soduck215+$soduck216-$soduck219;
$soduck221 = $soduck222-$soduck223;
$soduck224 = $soduck225-$soduck226;
$soduck227 = $soduck228-$soduck229;
$soduck220 = $soduck221+$soduck224+$soduck227;
$soduck230 = $soduck231-$soduck232;
$soduck240 = $soduck241+$soduck242;
$soduck250 = $soduck251+$soduck252+$soduck253-$soduck254+$soduck255;
$soduck260 = $soduck261+$soduck262+$soduck263+$soduck268;
$soduck200 = $soduck210+$soduck220+$soduck230+$soduck240+$soduck250+$soduck260;
$soduck270 = $soduck100+$soduck200;

$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk210.",soduck=".$soduck210." where maso = '210'");
$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk221.",soduck=".$soduck221." where maso = '221'");
$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk224.",soduck=".$soduck224." where maso = '224'");
$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk227.",soduck=".$soduck227." where maso = '227'");
$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk220.",soduck=".$soduck220." where maso = '220'");
$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk230.",soduck=".$soduck230." where maso = '230'");
$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk240.",soduck=".$soduck240." where maso = '240'");
$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk250.",soduck=".$soduck250." where maso = '250'");
$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk260.",soduck=".$soduck260." where maso = '260'");
$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk200.",soduck=".$soduck200." where maso = '200'");
$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk270.",soduck=".$soduck270." where maso = '270'");

//// Nợ ngắn hạn
$sodudk310 = $sodudk311+$sodudk312+$sodudk313+$sodudk314+$sodudk315+$sodudk316+$sodudk317+$sodudk318+$sodudk319+$sodudk320+$sodudk321+$sodudk322+$sodudk323+$sodudk324;
$sodudk330 = $sodudk331+$sodudk332+$sodudk333-$sodudk334+$sodudk335+$sodudk336+$sodudk337+$sodudk338+$sodudk339+$sodudk340+$sodudk341+$sodudk342+$sodudk343;
$sodudk300 = $sodudk310+$sodudk330;

$soduck310 = $soduck311+$soduck312+$soduck313+$soduck314+$soduck315+$soduck316+$soduck317+$soduck318+$soduck319+$soduck320+$soduck321+$soduck322+$soduck323+$soduck324;
$soduck330 = $soduck331+$soduck332+$soduck333-$soduck334+$soduck335+$soduck336+$soduck337+$soduck338+$soduck339+$soduck340+$soduck341+$soduck342+$soduck343;
$soduck300 = $soduck310+$soduck330;

$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk310.",soduck=".$soduck310." where maso = '310'");
$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk330.",soduck=".$soduck330." where maso = '330'");
$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk300.",soduck=".$soduck300." where maso = '300'");

//// Vốn chủ sở hữu
$sodudk411_tmp = $sodudk411a+$sodudk411b;
if($sodudk411_tmp!=0){
    $sodudk411= $sodudk411_tmp;
}
$sodudk421 = $sodudk421a+$sodudk421b;
$sodudk410 = $sodudk411+$sodudk412+$sodudk413+$sodudk414-$sodudk415+$sodudk416+$sodudk417+$sodudk418+$sodudk419+$sodudk420+$sodudk421+$sodudk422;
$sodudk430 = $sodudk431+$sodudk432;
$sodudk400 = $sodudk410+$sodudk430;
$sodudk440 = $sodudk300+$sodudk400;

$soduck411_tmp = $soduck411a+$soduck411b;
    if($soduck411_tmp!=0){
        $soduck411= $soduck411_tmp;
    }
$soduck421 = $soduck421a+$soduck421b;
$soduck410 = $soduck411+$soduck412+$soduck413+$soduck414-$soduck415+$soduck416+$soduck417+$soduck418+$soduck419+$soduck420+$soduck421+$soduck422;
$soduck430 = $soduck431+$soduck432;
$soduck400 = $soduck410+$soduck430;
$soduck440 = $soduck300+$soduck400;

$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk411.",soduck=".$soduck411." where maso = '411'");
$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk421.",soduck=".$soduck421." where maso = '421'");
$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk410.",soduck=".$soduck410." where maso = '410'");
$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk430.",soduck=".$soduck430." where maso = '430'");
$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk400.",soduck=".$soduck400." where maso = '400'");
$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk440.",soduck=".$soduck440." where maso = '440'");
}else{// Thông tư 133
$OBJCT = new ketoantonghop();

$OBJCT->re_query("ALTER TABLE `bangcdkt` ADD `tentsnv_en` TEXT NOT NULL AFTER `tentsnv`;");
$OBJCT->re_query("ALTER TABLE `bangcdkt` CHANGE `tentsnv` `tentsnv` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");

$tungay = $_GET['tungay'];

$denngay = $_GET['denngay'];

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;

$captaikhoan = $_GET['intheothuesuat'];
$intheochungtu= $_GET['intheochungtu'];
$sapxeptheohoadon= $_GET['sapxeptheohoadon'];
$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];

    $str_w=" and ngayghiso >='".$tungay."' and ngayghiso<= '".$denngay."'";
    $str_w2=" and ngayghiso >='".$tungay."' and ngayghiso<='".$denngay."'";
    $OBJCT->setStrOderby($str_w);
    $OBJCT->setStrOderby2($str_w2);

$danhsachbangcandoitk = $OBJCT->load_danhsach_bangcdtk();// lấy số đầu kỳ trong bản cdtk

$dataBangCongNoKH = $OBJCT->load_danhsach_bangno_khachhang();
$dataBangCongNoKH_DK = $OBJCT->load_danhsach_bangno_khachhang_dk();

if($dataBangCongNoKH['1388']['nock']!=0 || $dataBangCongNoKH['1388']['cock']||$dataBangCongNoKH_DK['1388']['nodk']|| $dataBangCongNoKH_DK['1388']['codk']){
    $danhsachbangcandoitk['1388']['nock']=$dataBangCongNoKH['1388']['nock'];
    $danhsachbangcandoitk['1388']['cock']=$dataBangCongNoKH['1388']['cock'];

    $danhsachbangcandoitk['1388']['nodk']=$dataBangCongNoKH_DK['1388']['nodk'];
    $danhsachbangcandoitk['1388']['codk']=$dataBangCongNoKH_DK['1388']['codk'];
}
if($dataBangCongNoKH['3388']['nock']!=0 || $dataBangCongNoKH['3388']['cock']||$dataBangCongNoKH_DK['3388']['nodk']|| $dataBangCongNoKH_DK['3388']['codk']) {
    $danhsachbangcandoitk['3388']['nock']=$dataBangCongNoKH['3388']['nock'];
    $danhsachbangcandoitk['3388']['cock']=$dataBangCongNoKH['3388']['cock'];

    $danhsachbangcandoitk['3388']['nodk']=$dataBangCongNoKH_DK['3388']['nodk'];
    $danhsachbangcandoitk['3388']['codk']=$dataBangCongNoKH_DK['3388']['codk'];
}

//debug($danhsachbangcandoitk);
$_SESSION["THONGTINPHIEU"]['thangtk'] = "Từ  " .dd_mm_yyy($tungay) ." đến " .dd_mm_yyy($denngay);


$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $_GET['ngayhoadon'];
$_SESSION["THONGTINPHIEU"]['incaptk'] = $captaikhoan;
	$dataBCDTK = $OBJCT->them_danhsach_bangcd_ketoan(0,6,$danhsachbangcandoitk);

	foreach ($dataBCDTK as $itemCT){
		$sodudk = "sodudk".$itemCT['maso'];
		$soduck = "soduck".$itemCT['maso'];
		$$sodudk = $itemCT['sodudk'];
		$$soduck = $itemCT['soduck'];
	}
	//debug($dataBCDTK);
	$sodudk120 = $sodudk121+$sodudk122+$sodudk123-$sodudk124;
	$sodudk130 = $sodudk131+$sodudk132+$sodudk133+$sodudk134+$sodudk135-$sodudk136;
	$sodudk140 = $sodudk141-$sodudk142;
	$sodudk150 = $sodudk151-$sodudk152;
	$sodudk160 = $sodudk161-$sodudk162;
	$sodudk180 = $sodudk181+$sodudk182;

	$soduck120 = $soduck121+$soduck122+$soduck123-$soduck124;
	$soduck130 = $soduck131+$soduck132+$soduck133+$soduck134+$soduck135-$soduck136;
	$soduck140 = $soduck141-$soduck142;
	$soduck150 = $soduck151-$soduck152;
	$soduck160 = $soduck161-$soduck162;
	$soduck180 = $soduck181+$soduck182;

	$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk120.",soduck=".$soduck120." where maso = '120'");
	$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk130.",soduck=".$soduck130." where maso = '130'");
	$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk140.",soduck=".$soduck140." where maso = '140'");
	$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk150.",soduck=".$soduck150." where maso = '150'");
	$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk160.",soduck=".$soduck160." where maso = '160'");
	$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk180.",soduck=".$soduck180." where maso = '180'");

	$sodudk300 = $sodudk311+$sodudk312+$sodudk313+$sodudk314+$sodudk315+$sodudk316+$sodudk317+$sodudk318+$sodudk319+$sodudk320;
	$sodudk400 = $sodudk411+$sodudk412+$sodudk413-$sodudk414+$sodudk415+$sodudk416+$sodudk417;

	$soduck300 = $soduck311+$soduck312+$soduck313+$soduck314+$soduck315+$soduck316+$soduck317+$soduck318+$soduck319+$soduck320;
	$soduck400 = $soduck411+$soduck412+$soduck413-$soduck414+$soduck415+$soduck416+$soduck417;

	$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk300.",soduck=".$soduck300." where maso = '300'");
	$OBJCT->re_query("update bangcdkt set sodudk=".$sodudk400.",soduck=".$soduck400." where maso = '400'");
}
