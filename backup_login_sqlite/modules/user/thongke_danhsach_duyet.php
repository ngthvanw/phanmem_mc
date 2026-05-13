<?php
include("../../config.php");
$OBJ = new makhachhang();
$res = $OBJ->re_query("select count(trangthai) as tong,trangthai from dulieuchung.danhsach_congty_trinhky_{$noiluu_phanmem} where niendo = '".$_SESSION['NienDo']."' group by trangthai");
$data = $OBJ->re_fetch_all($res);
$string="";
foreach ($data as $item){
    if($item['trangthai']=="CD"){
        $string.="<b style='color: orange;'>CHỜ DUYỆT[".(int)$item['tong']."]</b> - ";
    }else if($item['trangthai']=="TN"){
        $string.="<b style='color: #7f007f;'>TẠM NỘP[".(int)$item['tong']."]</b> - ";
    }else if($item['trangthai']=="TL"){
        $string.="<b style='color: red;'>TRẢ LẠI[".(int)$item['tong']."]</b> - ";
    }else if($item['trangthai']=="DD"){
        $string.="<b style='color: blue;'>ĐÃ DUYỆT[".(int)$item['tong']."]</b> - ";
    }
}

echo "<b>THỐNG KÊ: </b>".substr($string,0,-2);
?>