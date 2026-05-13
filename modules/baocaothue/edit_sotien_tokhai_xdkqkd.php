<?php
include("../../config.php");
$OBJ = new baocaothue();

$mangsotien = $_GET['string'];
if($_SESSION['theothongtu']=="tt200"){
		foreach ($mangsotien as $itemSoTien){
		$sotien="sotien".$itemSoTien['machitieu'];
		$$sotien = $itemSoTien['sotiendk'];
		$OBJ->re_query(" update tokhaitndn set sotiendk=".$$sotien.",matk = '".$itemSoTien['matk']."',tkno = '".$itemSoTien['tkno']."'  where machitieu='".$itemSoTien['machitieu']."' and loaitokhai='XDKQKD'");
	}

	$sotien10 = $sotien01 - $sotien02;
    $sotien20 = $sotien10 - $sotien11;
    $sotien30 = $sotien20 + $sotien21 - $sotien22 - $sotien25- $sotien26;
    $sotien40 = $sotien31 - $sotien32;
    $sotien50 = $sotien30 + $sotien40;
    $sotien60 = $sotien50 - $sotien51;


	$sott = $_GET['sott'];
	$maso = $_GET['maso'];
	$chitieu = $_GET['chitieu'];
	$machitieu = $_GET['machitieu'];
	$sotien = $_GET['sotien'];
	$machitieucha = $_GET['machitieucha'];
	$matk = $_GET['matk'];

	$OBJ->re_query(" update tokhaitndn set sotiendk=".$sotien10." where machitieu='10' and loaitokhai='XDKQKD'");
	$OBJ->re_query(" update tokhaitndn set sotiendk=".$sotien20." where machitieu='20' and loaitokhai='XDKQKD'");
	$OBJ->re_query(" update tokhaitndn set sotiendk=".$sotien30." where machitieu='30' and loaitokhai='XDKQKD'");
	$OBJ->re_query(" update tokhaitndn set sotiendk=".$sotien40." where machitieu='40' and loaitokhai='XDKQKD'");
	$OBJ->re_query(" update tokhaitndn set sotiendk=".$sotien50." where machitieu='50' and loaitokhai='XDKQKD'");
	$OBJ->re_query(" update tokhaitndn set sotiendk=".$sotien60." where machitieu='60' and loaitokhai='XDKQKD'");

}else{
	foreach ($mangsotien as $itemSoTien){
		$sotien="sotien".$itemSoTien['machitieu'];
		$$sotien = $itemSoTien['sotiendk'];
		$OBJ->re_query(" update tokhaitndn set sotiendk=".$$sotien.",matk = '".$itemSoTien['matk']."',tkno = '".$itemSoTien['tkno']."'  where machitieu='".$itemSoTien['machitieu']."' and loaitokhai='XDKQKD'");
	}

	$sotien10 = $sotien01-$sotien02;
	$sotien20 = $sotien10-$sotien11;
	$sotien30 = $sotien20+$sotien21-$sotien22-$sotien24;
	$sotien40 = $sotien31-$sotien32;
	$sotien50 = $sotien30+$sotien40;
	$sotien60 = $sotien50-$sotien51-$sotien52;


	$sott = $_GET['sott'];
	$maso = $_GET['maso'];
	$chitieu = $_GET['chitieu'];
	$machitieu = $_GET['machitieu'];
	$sotien = $_GET['sotien'];
	$machitieucha = $_GET['machitieucha'];
	$matk = $_GET['matk'];

	$OBJ->re_query(" update tokhaitndn set sotiendk=".$sotien10." where machitieu='10' and loaitokhai='XDKQKD'");
	$OBJ->re_query(" update tokhaitndn set sotiendk=".$sotien20." where machitieu='20' and loaitokhai='XDKQKD'");
	$OBJ->re_query(" update tokhaitndn set sotiendk=".$sotien30." where machitieu='30' and loaitokhai='XDKQKD'");
	$OBJ->re_query(" update tokhaitndn set sotiendk=".$sotien40." where machitieu='40' and loaitokhai='XDKQKD'");
	$OBJ->re_query(" update tokhaitndn set sotiendk=".$sotien50." where machitieu='50' and loaitokhai='XDKQKD'");
	$OBJ->re_query(" update tokhaitndn set sotiendk=".$sotien60." where machitieu='60' and loaitokhai='XDKQKD'");
}
?>