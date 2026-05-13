<?php
   include("../../config.php");
   $Ma = $_GET['id'];
   $SoTT = $_GET['sott'];
   if($SoTT=="")
   	$SoTT=0;
   $OBJ = new mataisan();
   $OBJ->set_MaTaiSan($Ma);
   $OBJ->set_SoTT($SoTT);
   $tontai = $OBJ->checkKeyMaTaiSanTrung();
   if($tontai==TRUE){
        echo 1;
   }
?>