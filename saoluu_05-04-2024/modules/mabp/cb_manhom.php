<?php
   include("../../config.php");
   $OBJ = new mabp();
    $data = $OBJ->CB_ListMaNhom();
   echo json_encode($data)
?>