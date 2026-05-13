<?php
   include("../../config.php");
   $Ma = $_GET['id'];
   $SoTT = $_GET['sott'];
   $OBJ = new ketoantonghop();
   $tontai = $OBJ->checkKeyBTPSTrung($Ma,$SoTT);
   if($tontai==TRUE){
        echo 1;
   }
?>