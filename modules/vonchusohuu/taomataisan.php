<?php
   include("../../config.php");
   $OBJ = new mataisan();

   $data = $OBJ->createMaTaiSan();
   echo $data;
?>