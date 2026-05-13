<?php
   include("../../config.php");
   $Ma = $_GET['id'];
   $SoTT = $_GET['sott'];
   if($SoTT=="")
   	$SoTT=0;
   $OBJ = new mact;
   $OBJ->set_SoHD($Ma);
   $OBJ->set_SoTT($SoTT);
   $tontai = $OBJ->checkSoHDTrung();
   if($tontai==FALSE){
    echo 1;
   }
?>