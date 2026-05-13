<?php
   include("../../config.php");
   $Ma = $_GET['id'];
   $SoTT = $_GET['sott'];
   if($SoTT=="")
   	$SoTT=0;
   $OBJ = new MaNhom;
   $OBJ->set_MaNhom($Ma);
   $OBJ->set_SoTT($SoTT);
   $tontai = $OBJ->checkKeyTrung();
   if($tontai==FALSE){
    	echo 1;
   }
?>