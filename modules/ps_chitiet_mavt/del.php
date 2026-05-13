<?php
    include("../../config.php");
    $OBJ = new mavattu;
    $SoTT = check_data($_GET['sott']);
    $OBJ->re_query("delete from chitiet_psvt where sott='".$SoTT."'");
    echo "{\"result\": \"success\"}";
?>