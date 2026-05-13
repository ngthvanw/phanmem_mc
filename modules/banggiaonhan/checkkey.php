<?php
   include("../../config.php");
   $Ma = $_GET['id'];
   $SoTT = $_GET['sott'];
   if($SoTT=="")
   	$SoTT=0;
    $OBJ = new makhachhang;
    $sql = "select * from dulieuchung.doanhnghiep_bathopphap where masothue='" . $Ma . "' and sott!=" . $SoTT . "";
    $result = $OBJ->re_query($sql);
    if ( $OBJ->re_num_rows($result) >= 1) {// Có MST trùng
        echo 1;
    } else {
        echo 0;
    }
?>