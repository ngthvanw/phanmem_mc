<?php
   include("../../config.php");
   $Ma = $_GET['id'];
   $SoTT = $_GET['sott'];
   if($SoTT=="")
   	$SoTT=0;
   $OBJ = new MaBP;
   $OBJ->set_MaBP($Ma);
   $OBJ->set_SoTT($SoTT);
   $tontai = $OBJ->checkKeyTonTai();
   if($tontai==TRUE){
    	echo 1;
   }
?>