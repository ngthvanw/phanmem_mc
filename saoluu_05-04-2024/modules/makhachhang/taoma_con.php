<?php
   include("../../config.php");
   $makhcha = $_GET['makhcha'];
    $OBJ = new makhachhang;
   if($makhcha==0){
       $ma = $OBJ->createSoTT();
       echo 100000+$ma;
   }else{
       $ma = $OBJ->loadListMaKHCon();
       echo $ma;
   }

?>