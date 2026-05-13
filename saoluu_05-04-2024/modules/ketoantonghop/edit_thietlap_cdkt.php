<?php
include("../../config.php");
$OBJ = new baocaothue();

$mangsotien = $_GET['string'];

foreach ($mangsotien as $itemSoTien){
    $sodudk="sodudk".$itemSoTien['maso'];
    $soduck="soduck".$itemSoTien['maso'];
    $$sodudk = $itemSoTien['sodudk'];
    $$soduck = $itemSoTien['soduck'];
    database::re_query(" update bangcdkt set sodudk=".$itemSoTien['sodudk'].",soduck=".$itemSoTien['soduck']."  where maso='".$itemSoTien['maso']."'");
}
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

database::re_query("update bangcdkt set sodudk=".$sodudk120.",soduck=".$soduck120." where maso = '120'");
database::re_query("update bangcdkt set sodudk=".$sodudk130.",soduck=".$soduck130." where maso = '130'");
database::re_query("update bangcdkt set sodudk=".$sodudk140.",soduck=".$soduck140." where maso = '140'");
database::re_query("update bangcdkt set sodudk=".$sodudk150.",soduck=".$soduck150." where maso = '150'");
database::re_query("update bangcdkt set sodudk=".$sodudk160.",soduck=".$soduck160." where maso = '160'");
database::re_query("update bangcdkt set sodudk=".$sodudk180.",soduck=".$soduck180." where maso = '180'");

$sodudk300 = $sodudk311+$sodudk312+$sodudk313+$sodudk314+$sodudk315+$sodudk316+$sodudk317+$sodudk318+$sodudk319+$sodudk320;
$sodudk400 = $sodudk411+$sodudk412+$sodudk413-$sodudk414+$sodudk415+$sodudk416+$sodudk417;

$soduck300 = $soduck311+$soduck312+$soduck313+$soduck314+$soduck315+$soduck316+$soduck317+$soduck318+$soduck319+$soduck320;
$soduck400 = $soduck411+$soduck412+$soduck413-$soduck414+$soduck415+$soduck416+$soduck417;

database::re_query("update bangcdkt set sodudk=".$sodudk300.",soduck=".$soduck300." where maso = '300'");
database::re_query("update bangcdkt set sodudk=".$sodudk400.",soduck=".$soduck400." where maso = '400'");
?>