<?php
   include("../../config.php");
   $Ma = $_GET['id'];
   $SoTT = $_GET['sott'];
   if($SoTT=="")
   	$SoTT=0;
   $OBJ = new mavattu;
   $OBJ->set_MaVTCha($Ma);
   $tontai = $OBJ->checkKeyChaTrung();
   if($tontai==FALSE && $Ma!="0"){
        echo 1;
   }
?>