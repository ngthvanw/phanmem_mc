<?php
include("../../config.php");
$OBJ = new mavattu;
$xoatatca = $_GET['xoatatca'];
$mavt = str_replace(",","','",substr($_GET['mavt'],0,-1));
if($xoatatca=="true"){
    $mavt="";
    $result = $OBJ->loadListMaVT_DuThua();
    foreach ($result as $item){
        $mavt.=$item['mavt'].",";
    }
    $mavt = str_replace(",","','",substr($mavt,0,-1));
}
$OBJ->xoaMaVT_DuThua($mavt);
echo "{\"result\": \"success\"}";
?>