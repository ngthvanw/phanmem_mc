<?php
   include("../../config.php");
   $Ma = $_GET['ma'];
   $LoaiPhieu = $_GET['lp'];
   $OBJ = new psmavattu();
   $OBJ->setMaPSKT($Ma);
   $OBJ->setLP($LoaiPhieu);
   $tontai = $OBJ->checkSoHD();
   if($tontai==TRUE){
        echo 1;
   }else{
        echo 0;
   }
?>