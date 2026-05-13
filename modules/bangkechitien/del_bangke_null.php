<?php
   include("../../config.php");
   $mabangke = $_GET['mabangke'];
   $OBJ = new bangkechitien();
   $OBJ->xoabangkechitien($mabangke);
?>