<?php
include("../../config.php");
$makhcha = $_GET['makhcha'];
$OBJ = new makhachhang;
if($makhcha=="0"){
    $ma = $OBJ->createSoTT();
    echo ((substr($_SESSION["NienDo"],2,2)."0000")+$ma);
}else{
    $ma = $OBJ->loadListMaKHCon($makhcha);
    $matangthem1 = max(array_keys($ma))+1;
    $arr_macha = explode("-",$makhcha);
    $chieudaichuoi =  count($arr_macha);
    if($chieudaichuoi==1) {
        if (strlen($matangthem1) == 1) {
            $matangthem1 = "0" . $matangthem1;
        }
    }else{
        if (strlen($matangthem1) ==1) {
            $matangthem1 = "00" . $matangthem1;
        }
        if (strlen($matangthem1) ==2) {
            $matangthem1 = "0" . $matangthem1;
        }
    }
    echo $makhcha."-".$matangthem1;
}

?>