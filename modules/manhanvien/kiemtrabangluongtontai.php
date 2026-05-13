<?php
   include("../../config.php");
   $txttinhluongtheo = $_GET['txttinhluongtheo'];
   $OBJ = new manhanvien;
   $OBJ->setThang($txttinhluongtheo);

   $tontai = $OBJ->checkBangLuongNhanVien();

   if($tontai==TRUE){
        echo 1;
   }
?>