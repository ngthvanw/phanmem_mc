<?php
ini_set('max_execution_time', 300);
require("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$NhaCungCap = "Excel";

$xmlString = trim($_SESSION['DataPhucHoi']);

//////////////////////////////////////////////////////////////////////////////////////////////
if($NhaCungCap=='Excel'){
    $data = $_SESSION['DataExcel'];
    foreach ($data as $k=>$item)
    {
        if($k!=0 && $item[1]!=""){
            $OBJ->re_query("INSERT INTO `manhom`( `manhom`, `tennhom`) VALUES ('".$item[7]."','".$item[8]."')");
            $OBJ->re_query("insert into mavt (sott,mavt,tenvt,dvt,manhom,matk,tkdoanhthu,tenkd,rate) value('0','".$item[1]."','".$item[2]."','".$item[3]."','".$item[7]."','".$item[5]."','".$item[6]."','".khu_dau_vn($item[2])."','".$item[4]."');");
            $OBJ->re_query("delete from tk where mavt='".$item[1]."' and makho='0010'");
            $OBJ->re_query("insert into tk (mavt,tenvt,dvt,slck,gtvnck,dgxvnd,makho,tenkd,manhom,matk) value('".$item[1]."','".$item[2]."','".$item[3]."','".$item[9]."','".$item[10]."','".$item[11]."','0010','".khu_dau_vn($item[2])."','".$item[8]."','".$item[5]."');");
        }
    }
}
$OBJ->re_query("update mavt set sott=stt where sott=0");
unset($_SESSION['DataExcel']);
unset($_SESSION['DataPhucHoi']);
echo "Đã thêm dữ liệu thành công!";
?>