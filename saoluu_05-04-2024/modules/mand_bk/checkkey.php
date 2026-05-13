<?php
   include("../../config.php");
   $MaTK = $_GET['id'];
   $SoTT = $_GET['sott'];
   if($SoTT=="")
   	$SoTT=0;
   $HTTK = new Hethongtaikhoan;
   $HTTK->set_MaTK($MaTK);
   $HTTK->set_SoTT($SoTT);
   $tontai = $HTTK->checkKeyTrung();
   if($tontai==FALSE){
    echo 1;
   }
?>