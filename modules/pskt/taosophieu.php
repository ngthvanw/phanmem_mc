<?php
   include("../../config.php");
    $OBJ = new pskt();
    $sophieu = $OBJ->createSoPhieuTime();
   if(!isset($_SESSION['SOPHIEU'])){
       echo $sophieu;
   }else{
       echo $_SESSION['SOPHIEU'];
   }
   unset($_SESSION['SOPHIEU']);
?>