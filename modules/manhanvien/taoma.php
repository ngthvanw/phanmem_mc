<?php
   include("../../config.php");
   $OBJ = new manhanvien;
   $OBJ->re_query("ALTER TABLE `manhanvien` CHANGE `sott` `sott` BIGINT(20) UNSIGNED NOT NULL;");
   $ma = $OBJ->createSoTT();
   echo $ma;
?>