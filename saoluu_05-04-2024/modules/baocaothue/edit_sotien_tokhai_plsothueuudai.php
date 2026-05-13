<?php
include("../../config.php");
$OBJ = new baocaothue();
$result = $OBJ->loadDanhSachToKhai_TNDN_PLmucdouudai();

$thuesuatuudai = ($result[0]['phantram']);

$thuesuatuudaiPT = round(($thuesuatuudai/100),2);
$mangsotien = $_GET['string'];
foreach ($mangsotien as $itemSoTien){
    $sotien="sotien".str_replace(".","_",$itemSoTien['machitieu']);
    $$sotien = $itemSoTien['sotien'];
    database::re_query(" update plthuetndnuudai set sotien=".$$sotien." where machitieu='".$itemSoTien['machitieu']."'");
}
if($thuesuatuudai>=0){
    $sotien3_2 = $sotien3_1*($thuesuatuudaiPT);
    $sotien3_4 = $sotien3_3-($sotien3_2);

    $sotien4_3 = $sotien4_1*round(($sotien4_2/100),2);

    $sotien4_5 = $sotien4_3*round(($sotien4_4/100),2);

    database::re_query(" update plthuetndnuudai set sotien=".$sotien3_2." where machitieu='3.2'");
    database::re_query(" update plthuetndnuudai set sotien=".$sotien3_4." where machitieu='3.4'");
    database::re_query(" update plthuetndnuudai set sotien=".$sotien4_3." where machitieu='4.3'");
    database::re_query(" update plthuetndnuudai set sotien=".$sotien4_5." where machitieu='4.5'");
}
?>