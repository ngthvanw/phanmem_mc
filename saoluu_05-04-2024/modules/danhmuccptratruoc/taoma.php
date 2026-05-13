<?php
include("../../config.php");
$OBJ = new danhmuccptratruoc();
$makhcha = $_GET['makhcha'];
$Loai = $_GET['loai'];
$Y = substr($_SESSION["NienDo"],2,2);
if ($makhcha == "0") {
    $ma = $OBJ->createMaCPTraTruoc();
	$mact = $Y."000" + $ma;
	echo $Loai.$mact;
} else {
    $ma = $OBJ->loadListMaTaiSanCon($makhcha);
    $matangthem1 = max(array_keys($ma)) + 1;
    $arr_macha = explode("-", $makhcha);
    $chieudaichuoi = count($arr_macha);
    if ($chieudaichuoi == 1) {
        if (strlen($matangthem1) == 1) {
            $matangthem1 = "0" . $matangthem1;
        }
    } else {
        if (strlen($matangthem1) == 1) {
            $matangthem1 = "00" . $matangthem1;
        }
        if (strlen($matangthem1) == 2) {
            $matangthem1 = "0" . $matangthem1;
        }
    }
    echo $makhcha . "-" . $matangthem1;
}
?>