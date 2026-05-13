<?php
   include("../../config.php");
   $OBJ = new manhom();
    $data = $OBJ->CB_ListMaNhomVT();
   echo json_encode($data)
?>