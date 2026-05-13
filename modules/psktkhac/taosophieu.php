<?php
   include("../../config.php");
   $OBJ = new pskt();
   $data = $OBJ->createSoPhieu();
   echo $data;
?>