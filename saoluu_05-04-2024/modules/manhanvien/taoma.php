<?php
   include("../../config.php");
   $OBJ = new manhanvien;
   $ma = $OBJ->createSoTT();
   echo 100000+$ma;
?>