<?php
   include("../../config.php");
   $Ma = $_GET['ma'];
   $OBJ = new bangkechitien();
   $OBJ->setMabangke($Ma);
   $tontai = $OBJ->checkBangKeChiTien();
   if($tontai==TRUE){
        echo 1;
   }else{
        echo 0;
   }
?>