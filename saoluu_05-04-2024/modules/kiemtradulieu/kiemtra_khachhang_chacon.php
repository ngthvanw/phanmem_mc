<?php
include("../../config.php");
$OBJ = new  makhachhang();
$data = $OBJ->LayDanhSachKhongCha();
foreach ($data as $k=>$item){
    $string = explode("=>",$item);
    $item_end = array_pop($string);
    if($item_end!=0){
        echo "<b>[{$k}]=</b>".$item."<br/>";
    }
}
