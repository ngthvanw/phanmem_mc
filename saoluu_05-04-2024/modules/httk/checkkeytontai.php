<?php
   include("../../config.php");
   $MaTK = $_GET['id'];
   $SoTT = $_GET['sott'];
   if($SoTT=="")
   	$SoTT=0;
   $OBJ = new Hethongtaikhoan;
   $OBJ->set_MaTK($MaTK);
   $OBJ->set_SoTT($SoTT);
   $tontai = $OBJ->checkKeyTonTai();
   if($tontai==TRUE){
        echo 1;
   }else{
       echo 0;
   }
?>