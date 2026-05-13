<?php
    include("../../config.php");
    $OBJ = new dmsanpham;
    $sott = (check_data($_GET['id']));
    $sql_del = "delete from phpmyadmin.danhsach_giaonhan_chungtu_{$noiluu_phanmem} where sott = '{$sott}'";
    $res = database::re_query($sql_del);
    echo "{\"result\": \"success\"}";

?>