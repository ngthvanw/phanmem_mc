<?php
   include("../../config.php");
   $Ma = $_GET['id'];
   $SoTT = $_GET['sott'];
   if($SoTT=="")
   	$SoTT=0;
   $OBJ = new makhachhang;
   $OBJ->set_MaKH($Ma);
   $tontai = $OBJ->checkKeyChaTrung();
   if($tontai==FALSE && $Ma!="0"){
        echo 1;
   }
?>