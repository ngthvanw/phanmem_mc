<?php
    include("../../config.php");
    $OBJ = new vonchusohuu();
    $OBJ->set_SoTT(check_data($_GET['sophieu'])); // là mapskt
    $OBJ->set_TangGiam(check_data($_GET['loaiphieu'])); // Là loại phiếu cần xóa
    //$check = $OBJ->checkXoa();
    //if($check==TRUE){
      /// echo "{\"result\": \"fail\"}";
   // }else{
        $OBJ->xoaPhieu();
        echo "{\"result\": \"success\"}";
   // }
?>