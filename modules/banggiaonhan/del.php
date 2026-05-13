<?php
    include("../../config.php");
    $OBJ = new dmsanpham;
    $sott = (check_data($_GET['id']));
    $sql_del = "delete from dulieuchung.danhsach_giaonhan_chungtu_{$noiluu_phanmem} where sott = '{$sott}'";
    $res = $OBJ->re_query($sql_del);
    echo "{\"result\": \"success\"}";

?>