<?php
    include("../../config.php");
    $OBJ = new phieukiemtra();
    $OBJ->set_SoTT(check_data($_GET['id']));
    //$check_khoangoai = $OBJ->checkXoa_khoangoai();
    $OBJ->xoaPhieu_NhatKy();
echo "{\"result\": \"success\"}";
?>