<?php
ini_set('max_execution_time', 300);
require("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$NhaCungCap = $_GET['nhacungcap'];

//////////////////////////////////////////////////////////////////////////////////////////////
    $data = $_SESSION['DataExcel_DuTru'];
    $sql_in = "INSERT INTO bangthongkethanhpham(masp,n1,thang) VALUES ";
    $val="";
    foreach ($data as $k=>$item)
    {
        if($k!=0 && $item[1]!=""){
            $val.="('".trim($item[1])."','".$item[2]."','".$item[3]."'),";
        }
    }
    $SQL_INS = $sql_in.substr($val,0,-1);
    $OBJ->re_query("delete from bangthongkethanhpham");
    $OBJ->re_query($SQL_INS);
    echo "Thêm dữ liệu thành công!";
 unset($_SESSION['DataExcel_DuTru']);
 unset($_SESSION['DataPhucHoi']);
?>