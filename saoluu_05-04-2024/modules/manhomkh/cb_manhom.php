<?php
   include("../../config.php");
   $OBJ = new manhomkh();
    $data = $OBJ->CB_ListMaNhom();
   echo json_encode($data)
?>