<?php
   include("../../config.php");
   $MaTK = $_GET['id'];
   $SoTT = $_GET['sott'];
   if($SoTT=="")
   	$SoTT=0;
   $OBJ = new Hethongtaikhoan;
   $OBJ->set_MaTK($MaTK);
   $OBJ->set_SoTT($SoTT);
   $tontai = $OBJ->checkKeyTrung();
   if($tontai==FALSE){
    echo 1;
   }
?>