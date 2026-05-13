<?php
include("../../config.php");
$OBJ = new dmsanpham();
$xoatatca = $_GET['xoatatca'];
$makh = substr($_GET['mavt'],0,-1);
if($xoatatca=="true"){
    $makh="";
    $result = $OBJ->loadListMaCT_DuThua();
    //debug($result);
    foreach ($result as $item){
        if($item['choxoa']=='') {
            $makh .= $item['masp'] . ",";
        }
    }
    $makh = substr($makh,0,-1);
}
$makh_arr = explode(",",$makh);
$string_makh="";
foreach ($makh_arr as $itemMaKH){
    $string_makh = $OBJ->loadMaKHALL_TraVeChuoiMaCTSP($itemMaKH);
    $string_makh = str_replace(",","','",substr($string_makh,0,-1));
    $OBJ->xoaMaCT_DuThua($string_makh);
}
echo "{\"result\": \"success\"}";
?>