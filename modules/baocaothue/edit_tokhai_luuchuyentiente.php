<?php
include("../../config.php");
$OBJ = new baocaothue();

$mangsotien = $_GET['string'];
//debug($mangsotien);
foreach ($mangsotien as $itemSoTien){
    $sodudk="sodudk".$itemSoTien['maso'];
    $soduck="soduck".$itemSoTien['maso'];
    $$sodudk = $itemSoTien['sodudk'];
    $$soduck = $itemSoTien['soduck'];
    $OBJ->re_query(" update luuchuyentiente set sodudk=".$itemSoTien['sodudk'].",soduck=".$itemSoTien['soduck'].",tkno = '".$itemSoTien['tkno']."',tkco = '".$itemSoTien['tkco']."'  where maso='".$itemSoTien['maso']."'");
}
//echo $sodudk1;
$sodudk20 =  $sodudk1+$sodudk2+$sodudk3+$sodudk4+$sodudk5+$sodudk6+$sodudk7;
$sodudk30 =  $sodudk21+$sodudk22+$sodudk23+$sodudk24+$sodudk25;
$sodudk40 =  $sodudk31+$sodudk32+$sodudk33+$sodudk34+$sodudk35;
$sodudk50 =  $sodudk20+$sodudk30+$sodudk40;
$sodudk70 =  $sodudk50+$sodudk60+$sodudk61;

$soduck20 =  $soduck1+$soduck2+$soduck3+$soduck4+$soduck5+$soduck6+$soduck7;
$soduck30 =  $soduck21+$soduck22+$soduck23+$soduck24+$soduck25;
$soduck40 =  $soduck31+$soduck32+$soduck33+$soduck34+$soduck35;
$soduck50 =  $soduck20+$soduck30+$soduck40;
$soduck70 =  $soduck50+$soduck60+$soduck61;

$OBJ->re_query(" update luuchuyentiente set sodudk=".$sodudk20.",soduck=".$soduck20." where maso='20'");
$OBJ->re_query(" update luuchuyentiente set sodudk=".$sodudk30.",soduck=".$soduck30." where maso='30'");
$OBJ->re_query(" update luuchuyentiente set sodudk=".$sodudk40.",soduck=".$soduck40." where maso='40'");
$OBJ->re_query(" update luuchuyentiente set sodudk=".$sodudk50.",soduck=".$soduck50." where maso='50'");
$OBJ->re_query(" update luuchuyentiente set sodudk=".$sodudk70.",soduck=".$soduck70." where maso='70'");
?>