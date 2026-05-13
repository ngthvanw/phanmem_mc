<?php
   include("../../config.php");
   $OBJ = new manhanvien();
    $data = $OBJ->CB_ListMaNhanVien_Json();
   echo json_encode($data)
?>