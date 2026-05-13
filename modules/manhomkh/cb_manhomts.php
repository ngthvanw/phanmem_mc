<?php
   include("../../config.php");
   $OBJ = new manhom();
    $data = $OBJ->CB_ListMaNhomTS();
    //debug($data);
   echo json_encode($data)
?>