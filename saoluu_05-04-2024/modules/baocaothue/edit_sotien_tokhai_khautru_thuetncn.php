<?php
include("../../config.php");
$OBJ = new baocaothue();
debug($_GET);
$mangsotien = $_GET['string'];
foreach ($mangsotien as $itemSoTien){
    $loaitokhai = $itemSoTien['loaitokhai'];
    $kytinhthue = $itemSoTien['kytinhthue'];
    $sotien="sotien".$itemSoTien['machitieu'];
    $$sotien = $itemSoTien['sotien'];
    database::re_query(" update tokhai_05kk_tncn set sotien=".$$sotien." where sott='".$itemSoTien['sott']."'");
}

$sotien23 = $sotien24+$sotien25;
$sotien26 = $sotien27+$sotien28;
$sotien29 = $sotien30+$sotien31;
$sotien32 = $sotien33+$sotien34;

database::re_query(" update tokhai_05kk_tncn set sotien=".$sotien23." where machitieu='23' and loaitokhai='{$loaitokhai}' and kytinhthue='{$kytinhthue}'");
database::re_query(" update tokhai_05kk_tncn set sotien=".$sotien26." where machitieu='26' and loaitokhai='{$loaitokhai}' and kytinhthue='{$kytinhthue}'");
database::re_query(" update tokhai_05kk_tncn set sotien=".$sotien29." where machitieu='29' and loaitokhai='{$loaitokhai}' and kytinhthue='{$kytinhthue}'");
database::re_query(" update tokhai_05kk_tncn set sotien=".$sotien32." where machitieu='32' and loaitokhai='{$loaitokhai}' and kytinhthue='{$kytinhthue}'");

?>