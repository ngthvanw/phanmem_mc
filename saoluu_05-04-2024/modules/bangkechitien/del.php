<?php
   include("../../config.php");
   $sott = $_GET['sott'];
   $OBJ = new bangkechitien();
   $OBJ->xoachitietbangke($sott);
?>