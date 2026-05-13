<?php
   include("../../config.php");
   $SoPhieu = $_GET['sophieu'];
   $OBJ = new ps_chitiet_mavattu();
   $OBJ->setSoPhieu($SoPhieu);
   $tontai = $OBJ->checkSoPhieu();
   if($tontai==TRUE){
       echo 1;
   }else{
       echo 0;
   }
?>