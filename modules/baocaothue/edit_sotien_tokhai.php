<?php
include("../../config.php");
$OBJ = new baocaothue();

$sott = $_GET['sott'];
$maso = $_GET['maso'];
$chitieu = $_GET['chitieu'];
$machitieu = $_GET['machitieu'];
$sotien = $_GET['sotien'];
$machitieucha = $_GET['machitieucha'];
$matk = $_GET['matk'];

$mangsotien = $_GET['string'];
foreach ($mangsotien as $itemSoTien){
    $sotien="sotien".$itemSoTien['machitieu'];
    $$sotien = $itemSoTien['sotien'];
    $OBJ->re_query(" update tokhaitndn set sotien=".$$sotien.",matk='".$itemSoTien['matk']."',tkno='".$itemSoTien['tkno']."' where machitieu='".$itemSoTien['machitieu']."' and loaitokhai='PLKQKD'");
}
if($_SESSION['NienDo']>=2021){
    $sotien6 = $sotien7 + $sotien8 + $tongtien9;
    $tongtien12 = $tongtien13 + $tongtien14 + $tongtien15;
    $tongtien18 = $sotien4 - $sotien6 + $sotien10 - $tongtien12 - $tongtien16;
    $tongtien21 = $tongtien19 - $tongtien20;
    $tongtien22 = $tongtien18 + $tongtien21;

    $OBJ->re_query(" update tokhaitndn set sotien=" . $tongtien6 . " where machitieu='6' and loaitokhai='PLKQKD'");
    $OBJ->re_query(" update tokhaitndn set sotien=" . $tongtien12 . " where machitieu='12' and loaitokhai='PLKQKD'");
    $OBJ->re_query(" update tokhaitndn set sotien=" . $tongtien18 . " where machitieu='18' and loaitokhai='PLKQKD'");
    $OBJ->re_query(" update tokhaitndn set sotien=" . $tongtien21 . " where machitieu='21' and loaitokhai='PLKQKD'");
    $OBJ->re_query(" update tokhaitndn set sotien=" . $tongtien22 . " where machitieu='22' and loaitokhai='PLKQKD'");
}else{
    $sotien3 = $sotien4+$sotien5+$sotien6+$sotien7;
    $sotien9 = $sotien10+$sotien11+$sotien12;
    $sotien15 = $sotien1-$sotien3+$sotien8-$sotien9-$sotien13;
    $sotien18 = $sotien16-$sotien17;
    $sotien19 = $sotien15+$sotien18;

    $OBJ->re_query(" update tokhaitndn set sotien=".$sotien3." where machitieu='3' and loaitokhai='PLKQKD'");
    $OBJ->re_query(" update tokhaitndn set sotien=".$sotien9." where machitieu='9' and loaitokhai='PLKQKD'");
    $OBJ->re_query(" update tokhaitndn set sotien=".$sotien15." where machitieu='15' and loaitokhai='PLKQKD'");
    $OBJ->re_query(" update tokhaitndn set sotien=".$sotien18." where machitieu='18' and loaitokhai='PLKQKD'");
    $OBJ->re_query(" update tokhaitndn set sotien=".$sotien19." where machitieu='19' and loaitokhai='PLKQKD'");
}
?>