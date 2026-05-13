<?php
    include("../../config.php");
    $OBJ = new dmsanpham;
    $sott = (check_data($_GET['id']));
    $sql_del = "delete from dulieuchung.`doanhnghiep_bathopphap` where sott = '{$sott}'";
    $res = database::re_query($sql_del);
    echo "{\"result\": \"success\"}";

?>