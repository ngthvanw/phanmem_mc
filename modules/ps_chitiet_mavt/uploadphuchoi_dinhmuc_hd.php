<?php
ini_set('max_execution_time', 300);
require("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$masp = $_GET['nhacungcap'];

//////////////////////////////////////////////////////////////////////////////////////////////
    $data = $_SESSION['DataExcel_DinhMuc'];
    $sql_in = "INSERT INTO chitiet_dinhmuc_hd(masp,mavt,dvt,dinhmuc,tylehaohoc,dinhmuckecakhauhao) VALUES ";
    $val="";
    foreach ($data as $k=>$item)
    {
        if($k!=0 && $item[1]!=""){
            $val.="('".$masp."','".trim($item[1])."','".$item[3]."','".trim($item[4])."','".$item[5]."','".$item[6]."'),";
        }
    }
    $SQL_INS = $sql_in.substr($val,0,-1);
    $OBJ->re_query("delete from chitiet_dinhmuc_hd where masp='".$masp."'");
    $OBJ->re_query($SQL_INS);
    echo "Thêm dữ liệu thành công!";
 unset($_SESSION['DataExcel_DinhMuc']);
 unset($_SESSION['DataPhucHoi']);
?>