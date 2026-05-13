<?php
   include("../../config.php");
   $OBJ = new mavattu;
   $ma = $OBJ->createSoTT();
   echo "HH".((substr($_SESSION["NienDo"],2,2)."0000")+$ma);
?>