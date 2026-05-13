<?php
    include("../../config.php");
    $OBJ = new makhachhang;
    $id = check_data($_GET['id']);
    {
        $sql = "delete from tokhai_hh_nhap_xuatkhau where sophieu = '".$id."'";
        $OBJ->re_query($sql);
        echo "{\"result\": \"success\"}";   
    }
?>