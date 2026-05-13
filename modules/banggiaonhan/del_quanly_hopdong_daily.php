<?php
    include("../../config.php");
    $OBJ = new dmsanpham;
    $sott = (check_data($_GET['id']));
    $sql_del = "delete from danhsach_hopdong_daily where sott = '{$sott}'";
    $res = $OBJ->re_query($sql_del);
    echo "{\"result\": \"success\"}";

?>